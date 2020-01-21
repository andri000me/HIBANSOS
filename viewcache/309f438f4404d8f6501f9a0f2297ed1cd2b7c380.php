<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(base_url('assets/js/home.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php $__env->startComponent('public.home.section-1'); ?><?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('public.home.section-2'); ?><?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('public.home.section-3',['list'=>count($list)>0 ? $list:'' ]); ?><?php echo $__env->renderComponent(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/public/home.blade.php ENDPATH**/ ?>