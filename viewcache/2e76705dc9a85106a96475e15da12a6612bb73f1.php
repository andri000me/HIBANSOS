<?php
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
;
?>

<?php $__env->startSection('title',$user->username); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(base_url('assets/css/usercss.css')); ?>">
    <style>
        .card-img-top{
            width: 100%!important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div class="container-fluid mt-5 py-5">
            <div class="row">
                <div class="col-3">
                    <?php $__env->startComponent('component.tabel-informasi'); ?><?php echo $__env->renderComponent(); ?>
                </div>
                <div class="col-9 mb-5" style="">
                    <?php if(count($notifikasi_proposal)>0): ?>
                        <div class="card mb-3 noth100">
                            <div class="card-body">
                                <h3 class="h3-responsive">
                                    Notifikasi
                                </h3>
                                <?php $__env->startComponent('user.notifikasi',['list'=>$notifikasi_proposal]); ?><?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="card pb-5 noth100">
                        <div class="card-body pt-5"  id="card-container" style="overflow-y: auto">
                            <div class="row">
                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-3">
                                        <?php $__env->startComponent('component.cardproposal',$proposal); ?><?php echo $__env->renderComponent(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/user/proposalsaya.blade.php ENDPATH**/ ?>