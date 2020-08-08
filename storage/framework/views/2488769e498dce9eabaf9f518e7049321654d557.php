<?php $__env->startSection('title','Lista de Produtos'); ?>
<?php $__env->startSection('content'); ?>
<div style="background-color: #82FA58"> 
    <h1 style="margin-bottom: 60px;" >Home</h1>
    
<center>
   <section class="galeria " style="margin-bottom: 20px;margin-right: 50px;">

    <h4 style="margin-bottom: 20px;" >Novidades!!</h4>
     <img src="<?php echo e(url('img/produtos/1f0e3dad99908345f7439f8ffabdffc4.jpg')); ?>" class=" foto " >
      <img src="<?php echo e(url('img/produtos/1679091c5a880faf6fb5e6087eb1b2dc.jpg')); ?>" class=" foto " >
        <img src="<?php echo e(url('img/produtos/aab3238922bcc25a6f606eb525ffdc56  .jpg')); ?>" class="foto " >
          <img src="<?php echo e(url('img/produtos/45c48cce2e2d7fbdea1afc51c7c6ad26.jpg')); ?>" class=" foto " >
    </section>
 
 <h3>Confira os produtos com descontos</h3>
</center>
<section class="grid1">
 
    <div class="zoom">
       <img src="<?php echo e(url('img/produtos/9bf31c7ff062936a96d3c8bd1f8f2ff3.jpg')); ?>" alt="Imagem Produto" class="img-fluid " >
        <p>Farofa Yoki</p>
    </div>
    
    <div class="zoom">
       <img src="<?php echo e(url('img/produtos/c20ad4d76fe97759aa27a0c99bff6710.jpg')); ?>" alt="Imagem Produto" class="img-fluid " >
       <p>Café Pilão</p>
   </div>

   <div class="zoom">
        <img src="<?php echo e(url('img/produtos/70efdf2ec9b086079795c442636b55fb.jpg')); ?>" alt="Imagem Produto" class="img-fluid " >
         <p>Cachaça 51</p>
      </div>

      <div class="zoom ">
         <img src="<?php echo e(url('img/produtos/b6d767d2f8ed5d21a44b0e5886680cb9.jpg')); ?>" alt="Imagem Produto" class="img-fluid " >
         <p> limpeza</p>
     </div>

     <div class="zoom ">
      <img src="<?php echo e(url('img/produtos/6512bd43d9caa6e02c990b0a82652dca.jpg')); ?>" alt="Imagem Produto" class="img-fluid " >
       <p>Alimentos</p>
   </div>
   
     <div class="zoom ">
      <img src="<?php echo e(url('img/produtos/45c48cce2e2d7fbdea1afc51c7c6ad26.jpg')); ?>" alt="Imagem Produto" class="img-fluid " >
      <p>Bebidas</p>
  </div>


    <div class="anuncio">

      <img  style="width: 500px;height: 200px;" src="<?php echo e(url('img/logo/localiza.jpg')); ?>" class="img-fluid " >
       <p>Localizacao</p>
    </div>
    
</section>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Sites/projetoPap/resources/views/welcome.blade.php ENDPATH**/ ?>