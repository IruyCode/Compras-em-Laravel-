@extends('layouts.app')
@section('title','Lista de Produtos')
@section('content')

<h1 style="color: #fff">Produtos</h1>
 <!-- serve para mostrar o resuldado de sucesso para o usuario  -->
@if($message = Session::get('success'))
      <div class="alert alert-success">
        {{$message}}
      </div>
   @endif

  <div class="row">
    <div class="col-md-12">
      <!-- Botao para o metodo de buscar -->
        <form method="POST" action="{{url('produtos/busca')}}">
             @csrf 
        <div class="input-group mb-3">
           <input type="text" class="form-control  verd " name="busca" id="busca" placeholder ="Procurar produto no Site..." value="{{$buscar ?? ''}}">
             <div class="inpt-group-append">
               <button class="btn btn-success">Buscar</button>
            </div>
       </div>

        </form>
    </div>
    <div class="col-md-12">
      <!-- Botao para ordenar a pagina de acordo com o selecionados -->
  <form method="POST" action="{{url('produtos/ordem')}}">
      @csrf 
    <div class="input-group mb-3">
       <select id="ordem" name ="ordem" class="form-control badge-success">
         <option >Escolha a Ordem</option>
         <option value="1" @if($ordem ?? '' == 1) selected @endif>Titulo (A-Z)</option>
         <option value="2" @if($ordem ?? '' == 2) selected @endif>Titulo (Z-A)</option>
         <option value="3" @if($ordem ?? '' == 3) selected @endif>Valor (Maior-Menor)</option>
         <option value="4" @if($ordem ?? '' == 4) selected @endif>Valor (Menor-Maior)</option>
       </select>

        <div class="inpt-group-append">
        <button class="btn btn-success">Ordenar</button>
        </div>
    </div>
  </form>
    </div>
  </div>

<div class="row">
@foreach ($produtos as $produto)
<!-- Criar um pa -->
  <div class="col-md-3 img-thumbnail" style="padding: 10px"  >
    @if(file_exists("./img/produtos/".md5($produto->id).".jpg"))
  
    <img src="{{url('img/produtos/'.md5($produto->id).'.jpg')}}" alt="Imagem Produto" class="img-fluid " >
   
  @endif
    <h4 class="text-center"><a href="{{URL::to('produtos')}}/{{$produto->id}}" style="color: green">{{$produto->titulo}}</a>
      @if($produto->preco == $maiscaro ?? '' ?? '')
      <span class="badge badge-danger">Maior Preco</span>
    @endif
    @if($produto->preco == $maisbarato)
      <span class="badge badge-success">Menor Preco</span>
    @endif
    </h4>
    <p class="text-center">€
    {{number_format($produto->preco,2,',','.')}}</p>
    
   
  </div>
   <!--ira apontar para cada produto especifico(abertura 2 vezes da chave é igual há:echo em php-->
@endforeach
  </div>
{{$produtos->links()}}
@endsection

 