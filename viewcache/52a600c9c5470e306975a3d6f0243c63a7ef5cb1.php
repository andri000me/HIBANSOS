<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(base_url('assets/css/addons/quill.snow.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/addons/quill.min.js')); ?>"></script>
    <script type="application/javascript">
        window.delta = <?php echo json_encode($konten[0]['konten'], 15, 512) ?>;
    </script>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/tentang.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','Tentang'); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="mt-5">
        <div class="container">
            <div class="card">
                <div class="card-header display-4 bg-transparent border-0">
                    Hibansos
                </div>
                <div id="tentang-container" class="card-body">
                    <div id="quill-container">

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/public/tentang.blade.php ENDPATH**/ ?>