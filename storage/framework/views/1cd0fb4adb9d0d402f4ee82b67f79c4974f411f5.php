 
<!--  cap3 Video 7 criando novos produtos -->
<?php $__env->startSection('title','Editar um Produto - '.$produto->titulo); ?>
<?php $__env->startSection('content'); ?>

  	<h1 class="mb-3">Editor um Produto - <?php echo e($produto->titulo); ?></h1>
  	<?php if($message = Session::get('success')): ?>
  		<div class="alert alert-success">
  			<?php echo e($message); ?>

  		</div>
  		<!-- serve para mostrar o resuldado de sucesso para o usuario  -->
  	<?php endif; ?>
  	<?php if(count($errors)>0): ?>
  	<div class="alert alert-danger">
  		<ul>
  			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  			<li><?php echo e($error); ?></li>
  			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  		</ul>
  	</div>
  	<?php endif; ?>
	<form method="POST" enctype="multipart/form-data" action="<?php echo e(action('ProdutosController@update',$id)); ?>">
		<?php echo csrf_field(); ?> <!--utiliza isso para criptografar o código e nao mostar valores-->
		<input type="hidden" name="_method" value="PATCH">
		<div class="form-group mb-3">
		    <label for="sku">SKU</label>
		    <input type="text" class="form-control" id="sku" name="sku" value="<?php echo e($produto->sku); ?>" placeholder="Digite o Código do Produto..." required>
	 	</div>
	 	<div class="form-group mb-3">
		    <label for="titulo">Título</label>
		    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo e($produto->titulo); ?>" placeholder="Digite o Nome do Produto..." required>
	 	</div>
	 	<div class="form-group mb-3">
		    <label for="descricao">Descrição</label>
		   	<textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite uma breve descrição do Produto..." required><?php echo e($produto->descricao); ?></textarea>
	 	</div>
	 	<label for="preco">Preço</label>
	 	<div class="input-group mb-3">
		    <div class="input-group-prepend">
		    	<span class="input-group-text" id="basic-addon1">€</span>
			</div>
		    <input type="number" step=".01" class="form-control" id="preco" name="preco" value="<?php echo e($produto->preco); ?>" placeholder="0,00" required>
	 	</div>
	 	<div class="input-group mb-3">
	 		<label for="imgproduto">Imagem</label>
	 		<input type="file" class="form-control-file" id="imgproduto" name="imgproduto">
	 	</div>
	 	<button type="submit" class="btn btn-primary">Atualizar Produto</button>
	</form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Sites/projetoPap/resources/views/produtos/edit.blade.php ENDPATH**/ ?>