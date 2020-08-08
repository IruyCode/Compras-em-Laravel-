
<?php $__env->startSection('title','Lista de Produtos'); ?>
<?php $__env->startSection('content'); ?>

<h1 style="color: #fff">Produtos</h1>
 <!-- serve para mostrar o resuldado de sucesso para o usuario  -->
<?php if($message = Session::get('success')): ?>
      <div class="alert alert-success">
        <?php echo e($message); ?>

      </div>
   <?php endif; ?>

  <div class="row">
    <div class="col-md-12">
      <!-- Botao para o metodo de buscar -->
        <form method="POST" action="<?php echo e(url('produtos/busca')); ?>">
             <?php echo csrf_field(); ?> 
        <div class="input-group mb-3">
           <input type="text" class="form-control  verd " name="busca" id="busca" placeholder ="Procurar produto no Site..." value="<?php echo e($buscar ?? ''); ?>">
             <div class="inpt-group-append">
               <button class="btn btn-success">Buscar</button>
            </div>
       </div>

        </form>
    </div>
    <div class="col-md-12">
      <!-- Botao para ordenar a pagina de acordo com o selecionados -->
  <form method="POST" action="<?php echo e(url('produtos/ordem')); ?>">
      <?php echo csrf_field(); ?> 
    <div class="input-group mb-3">
       <select id="ordem" name ="ordem" class="form-control badge-success">
         <option >Escolha a Ordem</option>
         <option value="1" <?php if($ordem ?? '' == 1): ?> selected <?php endif; ?>>Titulo (A-Z)</option>
         <option value="2" <?php if($ordem ?? '' == 2): ?> selected <?php endif; ?>>Titulo (Z-A)</option>
         <option value="3" <?php if($ordem ?? '' == 3): ?> selected <?php endif; ?>>Valor (Maior-Menor)</option>
         <option value="4" <?php if($ordem ?? '' == 4): ?> selected <?php endif; ?>>Valor (Menor-Maior)</option>
       </select>

        <div class="inpt-group-append">
        <button class="btn btn-success">Ordenar</button>
        </div>
    </div>
  </form>
    </div>
  </div>

<div class="row">
<?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Criar um pa -->
  <div class="col-md-3 img-thumbnail" style="padding: 10px"  >
    <?php if(file_exists("./img/produtos/".md5($produto->id).".jpg")): ?>
  
    <img src="<?php echo e(url('img/produtos/'.md5($produto->id).'.jpg')); ?>" alt="Imagem Produto" class="img-fluid " >
   
  <?php endif; ?>
    <h4 class="text-center"><a href="<?php echo e(URL::to('produtos')); ?>/<?php echo e($produto->id); ?>" style="color: green"><?php echo e($produto->titulo); ?></a>
      <?php if($produto->preco == $maiscaro ?? '' ?? ''): ?>
      <span class="badge badge-danger">Maior Preco</span>
    <?php endif; ?>
    <?php if($produto->preco == $maisbarato): ?>
      <span class="badge badge-success">Menor Preco</span>
    <?php endif; ?>
    </h4>
    <p class="text-center">€
    <?php echo e(number_format($produto->preco,2,',','.')); ?></p>
    
   
  </div>
   <!--ira apontar para cada produto especifico(abertura 2 vezes da chave é igual há:echo em php-->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php echo e($produtos->links()); ?>

<?php $__env->stopSection(); ?>

 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Sites/projetoPap/resources/views/produtos/index.blade.php ENDPATH**/ ?>