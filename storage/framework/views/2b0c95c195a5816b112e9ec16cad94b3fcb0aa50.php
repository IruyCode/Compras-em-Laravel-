 
<!--  cap3 Video 7 criando novos produtos -->
<?php $__env->startSection('content'); ?>
	
		<h4 class="mb-3">Contato pelo Site</h4>
		<table class="table table-bordered">
		  <tbody>
		    <tr>
		      <td><strong>Nome:</strong></td>
		      <td><?php echo e($nome); ?></td>
		    </tr>
		    <tr>
		      <td><strong>Email:</strong></td>
		      <td><?php echo e($email); ?></td>
		    </tr>
		    <tr>
		      <td><strong>Assunto:</strong></td>
		      <td><?php echo e($assunto); ?></td>
		    </tr>
		    <tr>
		      <td><strong>Mensagem:</strong></td>
		      <td><?php echo e($msg); ?></td>
		    </tr>
		    <tr>
		    </tr>
		  </tbody>
		</table>
	</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.cont', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Sites/projetoPap/resources/views/contato/email/contato.blade.php ENDPATH**/ ?>