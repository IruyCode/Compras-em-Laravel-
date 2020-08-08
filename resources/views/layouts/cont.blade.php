<!DOCTYPE html>
<html lang="pt-br">
<head> 
	<title>Nosso site -@yield('title')</title><!--foi criado um template  padrao este aponta o titulo -->
	<link rel="stylesheet" type="text/css" href="{{URL::to('dist/css/bootstrap.min.css')}}">
	<style type="text/css">
		
	</style>
	 
</head>
<body>
<div class="container">
	@yield('content')<!--dizemas para ele pertencer a alguma regiao este aponta o conteudo-->
</div>
<script type="text/javascript" src="{{URL::to('js/jquery.min.js')}}"></script>
<!--URL to vai pegar o caminho base da operacao cap3 Video 6(para nao dar erro em outras paginas que nao estiverem na raiz do projeto)-->
<script type="text/javascript" src="{{URL::to('dist/css/bootstrap.min.css')}}"></script>
</body>
</html>