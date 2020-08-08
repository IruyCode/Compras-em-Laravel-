 
<!--  cap3 Video 7 criando novos produtos -->
<?php $__env->startSection('title','Contato'); ?>
<?php $__env->startSection('content'); ?>
 <div  style="background-color: #fff"class="container md-5">
<h1>Contato</h1>
  	<p>Para reportar algum erro ou enviar seu feed back mande-nos uma mensagem ! </p>
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
	<form method="POST" action="<?php echo e(url('contato/enviar')); ?>">
		<?php echo csrf_field(); ?> <!--utiliza isso para criptografar o código e nao mostar valores-->
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Sites/projetoPap/resources/views/contato/contato.blade.php ENDPATH**/ ?>