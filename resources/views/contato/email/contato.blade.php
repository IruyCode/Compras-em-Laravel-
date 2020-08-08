@extends('layouts.cont') 
<!--  cap3 Video 7 criando novos produtos -->
@section('content')
	
		<h4 class="mb-3">Contato pelo Site</h4>
		<table class="table table-bordered">
		  <tbody>
		    <tr>
		      <td><strong>Nome:</strong></td>
		      <td>{{$nome}}</td>
		    </tr>
		    <tr>
		      <td><strong>Email:</strong></td>
		      <td>{{$email}}</td>
		    </tr>
		    <tr>
		      <td><strong>Assunto:</strong></td>
		      <td>{{$assunto}}</td>
		    </tr>
		    <tr>
		      <td><strong>Mensagem:</strong></td>
		      <td>{{$msg}}</td>
		    </tr>
		    <tr>
		    </tr>
		  </tbody>
		</table>
	</div>
@endsection

