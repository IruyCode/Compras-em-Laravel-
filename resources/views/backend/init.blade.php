@extends('layouts.app')
@section('title','Lista de Produtos')
@section('content')
<h1>Produtos</h1>
@if($message = Session::get('success'))
      <div class="alert alert-success">
        {{$message}}
      </div>
      <!-- serve para mostrar o resuldado de sucesso para o usuario  -->
    @endif
 
<a href="{{URL::to('produtos/create')}}" class="btn btn-outline-success">Criar Produtos</a>
<div class="row">
@foreach ($produtos as $produto)
  <div class="col-md-3">
    @if(file_exists("./img/produtos/".md5($produto->id).".jpg"))
  
    <img src="{{url('img/produtos/'.md5($produto->id).'.jpg')}}" alt="Imagem Produto" class="img-fluid img-thumbnail">
  @endif
    <h4 class="text-center"><a href="{{URL::to('produtos')}}/{{$produto->id}}">{{$produto->titulo}}</a>
    
  
    </h4>
    <p class="text-center">€
    {{number_format($produto->preco,2,',','.')}}</p>
    
    @if(Auth::check())
    <div class="mb-3">
      
      <form method="POST" action="{{action('ProdutosController@destroy',$produto->id)}}">
    @csrf <!--utiliza isso para criptografar o código e nao mostar valores-->
    <input type="hidden" name="_method" value="DELETE">
    <a href="{{URL::to('produtos/'.$produto->id.'/edit')}}" class="btn btn-primary">Editar</a>
    <button class="btn btn-danger ">Excluir</button>
  </form>
    </div>
    @endif
  </div>
   <!--ira apontar para cada produto especifico(abertura 2 vezes da chave é igual há:echo em php-->
@endforeach
  </div> 

@endsection

 
