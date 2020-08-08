
<?php $__env->startSection('title','Lista de Produtos'); ?>
<?php $__env->startSection('content'); ?>
<h1>Produtos</h1>
<?php if($message = Session::get('success')): ?>
      <div class="alert alert-success">
        <?php echo e($message); ?>

      </div>
      <!-- serve para mostrar o resuldado de sucesso para o usuario  -->
    <?php endif; ?>
 
<a href="<?php echo e(URL::to('produtos/create')); ?>" class="btn btn-outline-success">Criar Produtos</a>
<div class="row">
<?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="col-md-3">
    <?php if(file_exists("./img/produtos/".md5($produto->id).".jpg")): ?>
  
    <img src="<?php echo e(url('img/produtos/'.md5($produto->id).'.jpg')); ?>" alt="Imagem Produto" class="img-fluid img-thumbnail">
  <?php endif; ?>
    <h4 class="text-center"><a href="<?php echo e(URL::to('produtos')); ?>/<?php echo e($produto->id); ?>"><?php echo e($produto->titulo); ?></a>
    
  
    </h4>
    <p class="text-center">€
    <?php echo e(number_format($produto->preco,2,',','.')); ?></p>
    
    <?php if(Auth::check()): ?>
    <div class="mb-3">
      
      <form method="POST" action="<?php echo e(action('ProdutosController@destroy',$produto->id)); ?>">
    <?php echo csrf_field(); ?> <!--utiliza isso para criptografar o código e nao mostar valores-->
    <input type="hidden" name="_method" value="DELETE">
    <a href="<?php echo e(URL::to('produtos/'.$produto->id.'/edit')); ?>" class="btn btn-primary">Editar</a>
    <button class="btn btn-danger ">Excluir</button>
  </form>
    </div>
    <?php endif; ?>
  </div>
   <!--ira apontar para cada produto especifico(abertura 2 vezes da chave é igual há:echo em php-->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div> 

<?php $__env->stopSection(); ?>

 

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Sites/projetoPap/resources/views/backend/init.blade.php ENDPATH**/ ?>