<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\produtos ;
use App\Estrelas ;
class ProdutosController extends Controller
{
     public function index(){
      $produtos = Produtos::paginate(8);
        //se colocar produtos::all ira mostrar todos os produtos (~porem com pagina ira mostrar o numero deprodutos colo)
      $maiscaro = Produtos::all()->max('preco');
      $maisbarato = Produtos::all()->min('preco');
      //$media =Produtos::all()->avg('preco');
      $registros = Produtos::where(['ativo'=> 'S'])-> get(); //busca no banco de dados os produtos que o usuario pode vizualizar.

             
      return view('produtos.index',compact('registros'),array('produtos'=> $produtos,'buscar' => null,'ordem' => null,
       'maiscaro' => $maiscaro,'maisbarato' => $maisbarato));
      //echo "<pre>";print_r($produtos); //listar os produtos echo "<\pre>";
    } // criar o ativo onde mostra-ra os que tem ativo S
    
    public function show(Request $Request,$id) {
       
      
           if(!empty($id)) {
             $produto = Produtos::where([
               'id'    => $id,
               'ativo' =>  'S'
                 ])->first();
       }

     // para redirecionar uma rota sem nome
      $produto = Produtos::with('mostrarComentarios')->find($id); 

      $produtoest = Produtos::with('estrelas')->find($id); //funcao criada dentro do model produtos

     // $med = Produtos::with('estrelas')->find($med);

     

          return view('produtos.show',array('produto'=> $produto,'id','produtoest' => $produtoest ));//compact('registro')
                 
          }

  public function classificar($id) {

   $produto =Produtos::find($id);
      // $idproduto =$Request->get('id');
      // $idusuario = Auth::id(); //sera o id do usuario 
      // $qnt_estrelas = $Request->get('estrela'); //o numero da estrela escolhida

      //  Estrelas::create([
      //  'id_user' => $idusuario,
      //  'id_produto'=>  $id,
      //  'qnt_estrelas' => $qnt_estrelas
      //   ]);

      //    $estrela = new Estrelas();
      //    $estrela->id_produto =$Request->input('id');
      //    $estrela->qnt_estrelas =$Request->input('estrela');
      //    $estrela->id_user =$idusuario;

      // if($estrela->save()){
      //    return redirect('produtos/'.$id.)->with('success','Produto Atualizado com Sucesso!!!');
      //  } 
  return view('produtos.show',compact('produtos','id'));
}
                                                         
    public function create(){
        if(Auth::check()){// condicao para entrar, apenas se for logado , metodo auth 
            return view('backend.create');
        } else {
            return redirect('login');
        }
        
    }
    // esta é a condicao para preencher os campos
    public function store (Request $Request){ //para rescebe dados
        $this->validate($Request,[
        'sku' => 'required|unique:produtos|min:3',
        'titulo' => 'required|min:3',
        'descricao' => 'required|min:10',
        'preco' => 'required|numeric',]);
         //vai na table produtos e ver se é unico na tabela produtos para niguem burlar o sistema e nao criar algo um produto igual

        $produto = new Produtos();
        $produto->sku =$Request->input('sku');
        $produto->titulo =$Request->input('titulo');
        $produto->descricao =$Request->input('descricao');
        $produto->preco =$Request->input('preco');

        if($produto->save()){
         return redirect('produtos/create')->with('success','Produto Cadastrado com Sucesso');
        }// redireciona para o back end e cria um produto
    }
      public function edit($id){// resgatar o id 
        $produto = Produtos::find($id);//find procura por um id especifico 
        return view('backend.edit',compact('produto','id'));
    }

    public function update (Request $Request,$id){
        
        $produto = Produtos::find($id);//ja apontado para um dado alterado 

        $this->validate($Request,[
        'sku' => 'required|min:3',
        'titulo' => 'required|min:3',
        'descricao' => 'required|min:10',
        'preco' => 'required|numeric',]);
        
            if($Request->hasfile('imgproduto')){ // verifica se existe imagem
                $imagem = $Request->file('imgproduto');//salva a imagem na variavel 
                $nomearquivo =md5($id).".".$imagem->getClientOriginalExtension();
                $Request->file('imgproduto')->move(public_path('./img/produtos/'), $nomearquivo);//fazer o movimentacao da imagem 
            }
       
        $produto->sku =$Request->get('sku');
        $produto->titulo =$Request->get('titulo');
        $produto->descricao =$Request->get('descricao');
        $produto->preco =$Request->get('preco');

        if($produto->save()){
         return redirect('produtos/'.$id.'/edit')->with('success','Produto Atualizado com Sucesso!!!');
        }
    }
    public function destroy($id){

        $produto = Produtos::find($id);

        if(file_exists("./img/produtos/".md5($id).".jpg")){
           unlink("./img/produtos/".md5($id).".jpg");
              }

        $produto->delete();//deletar produtos 
        return redirect()->back()->with('success','Produto Deletado com Sucesso!!!');
    }


    public function busca(Request $request){
        $buscaInput = $request->input('busca');
       $produtos = Produtos::where('titulo','LIKE','%'.$buscaInput.'%')
       ->orwhere('descricao','LIKE','%'.$buscaInput.'%')
       ->paginate(8); //procurar os produtos onde o titulo sera semelhante ao digitado no campo de busca
       return view ('produtos.index',array('produtos' =>$produtos,'buscar' => $buscaInput,'ordem' => null,'maisbarato'=>null,'maiscaro'=>null));
    }

     public function ordem(Request $request)  {
        $ordemInput = $request->input('ordem');
        if ($ordemInput == 1) {
            $campo ='titulo';
            $tipo ='asc';
        }else if ($ordemInput == 2) {
            $campo = 'titulo';
             $tipo ='desc';
        } else if ($ordemInput == 3) {
            $campo = 'preco';
             $tipo ='desc';
        } elseif ($ordemInput == 4) {
            $campo = 'preco';
             $tipo ='asc';
        }
       $produtos = Produtos::orderBy($campo,$tipo)
       ->paginate(8); //procurar os produtos onde o titulo sera semelhante ao digitado no campo de busca
       return view ('produtos.index',array('produtos' =>$produtos,'buscar' => null,'ordem' => $ordemInput,'maisbarato'=>null,'maiscaro'=>null));
     }



}