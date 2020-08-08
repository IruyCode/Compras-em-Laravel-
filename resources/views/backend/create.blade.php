@extends('layouts.app') 
<!--  cap3 Video 7 criando novos produtos -->
@section('title','Adicionar um novo Produto')
@section('content')
<h1>Adicionar um Produto</h1>
  	
  	@if($message = Session::get('success'))
  		<div class="alert alert-success">
  			{{$message}}
  		</div>
  		<!-- serve para mostrar o resuldado de sucesso para o usuario  -->
  	@endif
  	@if(count($errors)>0)
  	<div class="alert alert-danger">
  		<ul>
  			@foreach($errors->all() as $error)
  			<li>{{$error}}</li>
  			@endforeach
  		</ul>
  	</div>
  	@endif
	<form method="POST" action="{{url('produtos')}}">
		@csrf <!--utiliza isso para criptografar o código e nao mostar valores-->
		<div class="form-group mb-3">
		    <label for="sku">SKU</label>
		    <input type="text" class="form-control" id="sku" name="sku" placeholder="Digite o Código do Produto..." required>
	 	</div>
	 	<div class="form-group mb-3">
		    <label for="titulo">Título</label>
		    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o Nome do Produto..." required>
	 	</div>
	 	<div class="form-group mb-3">
		    <label for="descricao">Descrição</label>
		   	<textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite uma breve descrição do Produto..." required></textarea>
	 	</div>
	 	<label for="preco">Preço</label>
	 	<div class="input-group mb-3">
		    <div class="input-group-prepend">
		    	<span class="input-group-text" id="basic-addon1">€</span>
			</div>
		    <input type="number" step=".01" class="form-control" id="preco" name="preco" placeholder="0,00" required>
	 	</div>
	 	<button type="submit" class="btn btn-primary">Cadastrar Produto</button>
	 	<br>
	</form>
	<a href="{{ route('backend') }}"> voltar</a>
@endsection
