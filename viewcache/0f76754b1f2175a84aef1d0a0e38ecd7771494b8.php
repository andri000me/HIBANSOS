<?php $__env->startSection('title','Pengaturan '.$tipe); ?>
<?php $__env->startSection('content'); ?>
    <section class="my-5 py-5">
        <div class="container mb-5">
            <?php $__env->startComponent('component.big-card',['title'=>"Pengaturan ".$tipe]); ?>
                <?php $__env->startComponent('administrator.pengaturan.'.$tipe, ['konten'=>$konten]); ?><?php echo $__env->renderComponent(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/administrator/pengaturan.blade.php ENDPATH**/ ?>