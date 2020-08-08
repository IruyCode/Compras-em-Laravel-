@extends('layouts.app')
@section('title',$produto->titulo)
@section('content')

<section >
  <div style="background-color: #fff;margin: 12px;">
<h1 style="color: green;margin: 10px;">Produtos - {{$produto->titulo}}</h1>
@if($message = Session::get('success'))
      <div class="alert alert-success">
        {{$message}}
      </div>
   @endif


  <div class="row">
     @if(file_exists("./img/produtos/".md5($produto->id).".jpg"))
    <div class="col-md-4">
     <img style="margin: 12px;" src="{{url('img/produtos/'.md5($produto->id).'.jpg')}}" alt="Imagem Produto" class="img-fluid img-thumbnail">
  </div>
  @endif
 <!-- Mostra todos os Dados do produto  img/descrições -->
  <div >
     <div class="row" style="font-size: 20px;">
       <strong style="margin-left: 30px;">COD :
        {{$produto->sku}}  </strong>
       <strong style="margin-left: 200px;">Criado em:
         {{date("d/m/Y H:i", strtotime($produto->created_at))}}</strong></div> 

         <div class="col-md-10 row" style="margin-left: 4px;margin-top: 50px;font-size: 20px;">
          <strong >Descrição :</strong>
          <p>{{$produto->descricao}}</p>
        </div>
    
    <div style="margin-top: 95px;margin-left: 320px;">
       <strong style="font-size: 30px;">Preço€
        {{number_format($produto->preco,2,',','.')}}</strong>
       @if(Auth::check())

         <form method="POST" action="{{ route('carrinho.adicionar') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <button style="width: 200px;height: 70px;" class="btn btn-success" data-position="bottom" data-delay="50" >Comprar</button>   
            </form>
            @endif
      </div>
  </div>
</div>

<div style="margin-left: 30px;">
<!--  <form method="GET" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="{{ $produto->id }}"> -->
       <div class= "row estrelas">
      <input type="radio" id="vazio" name="estrela" value="" checked>
        
         <label for="estrela_um" ><i class="fa"></i></label>
         <input type="radio" id="estrela_um" name="estrela" value="1">
        
          <label for="estrela_dois"><i class="fa"></i></label>
          <input type="radio" id="estrela_dois" name="estrela" value="2">
        
           <label for="estrela_tres"><i class="fa"></i></label>
           <input type="radio" id="estrela_tres" name="estrela" value="3">
        
          <label for="estrela_quatro"><i class="fa"></i></label>
          <input type="radio" id="estrela_quatro" name="estrela" value="4">
        
         <label for="estrela_cinco"><i class="fa"></i></label>
         <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>
        
    <!--    <button style="margin-left:50px;" type="submit" class="btn btn-outline-warning" >Classificar </button> -->
        
   
      </div>
</form>
  

  @foreach($produtoest->estrelas as $estrela)

  <p style="color: #BDBDBD;font-size: 20px;">Classifição({{$estrela->qnt_estrelas }})</p>
  
     <!-- Para dos comentarios , só ira aparecer na show se tver algum comentario para   -->
 @endforeach
     

  <div class="row col-md-6">
       @foreach($produto->mostrarComentarios as $comentario)
   <div  class="card col-md-12">
     <div style="background-color:#03FD0B;color: white" class="card-header row">
          {{$comentario->usuario}}
        <div style="margin-left: 940px;" class="card-foot">
          {{date("d/m/Y H:i", strtotime($comentario->updated_at))}}
        </div>
    </div>
    <div class="card-body">{{$comentario->comentario}}</div>
   
  </div>
  @endforeach
 </div>

<a href="javascript:history.go(-1)"><button style="height: 50px; width: 150px;margin: 30px;" class="btn btn-danger">Voltar</button></a>
  </div>
   </section>
@endsection
