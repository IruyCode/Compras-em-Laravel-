@extends('layouts.app') 
<!--  cap3 Video 7 criando novos produtos -->
@section('title','Contato')
@section('content')
 <div  style="background-color: #fff"class="container md-5">
<h1>Contato</h1>
  	<p>Para reportar algum erro ou enviar seu feed back mande-nos uma mensagem ! </p>
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
	<form method="POST" action="{{url('contato/enviar')}}">
		@csrf <!--utiliza isso para criptografar o código e nao mostar valores-->
		<div class="form-group mb-3">
		    <label for="nome">Nome</label>
		    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o seu Nome..." required>
	 	</div>
	 	<div class="form-group mb-3">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu Email..." required>
	 	</div>
		<div class="form-group mb-3">
		    <label for="assunto">Assunto</label>
		    <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Digite o assunto..." required>
	 	</div>
	 	
	 	<div class="form-group mb-3">
		    <label for="msg">Mensagem</label>
		   	<textarea class="form-control" id="msg" name="msg" rows="6" placeholder="Digite sua mensagem..." required></textarea>
	 	</div>
	 <button style="margin: 15px;"type="submit" class="btn btn-success">Enviar mensagem</button>
	</form>
	
 </div>
@endsection

