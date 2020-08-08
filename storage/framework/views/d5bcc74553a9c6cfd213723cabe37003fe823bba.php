<!DOCTYPE html>
<html lang="pt-br">
<head> 
	<title>Nosso site -<?php echo $__env->yieldContent('title'); ?></title><!--foi criado um template  padrao este aponta o titulo -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('dist/css/bootstrap.min.css')); ?>">
	<style type="text/css">
		
	</style>
	 
</head>
<body>
<div class="container">
	<?php echo $__env->yieldContent('content'); ?><!--dizemas para ele pertencer a alguma regiao este aponta o conteudo-->
</div>
<script type="text/javascript" src="<?php echo e(URL::to('js/jquery.min.js')); ?>"></script>
<!--URL to vai pegar o caminho base da operacao cap3 Video 6(para nao dar erro em outras paginas que nao estiverem na raiz do projeto)-->
<script type="text/javascript" src="<?php echo e(URL::to('dist/css/bootstrap.min.css')); ?>"></script>
</body>
</html><?php /**PATH /home/vagrant/Sites/projetoPap/resources/views/layouts/cont.blade.php ENDPATH**/ ?>