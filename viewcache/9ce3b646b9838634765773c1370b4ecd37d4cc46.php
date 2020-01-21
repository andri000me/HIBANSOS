<?php $__env->startSection('title','Pendaftaran'); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(base_url('assets/js/validator.js')); ?>"></script>
    <script src="<?php echo e(base_url('assets/js/global.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="mt-5">
        <div class="container">
            <?php $__env->startComponent('component.big-card', ['title'=>'Pendaftaran']); ?>
                <div class="col-md-10 mx-auto">
                    <?php $__env->startComponent('component.addedituser',['action'=>uri_string(),'errors'=>$formerror,'preval'=>$preval]); ?>
                        <?php $__env->slot('formbutton'); ?>
                            <div class="col-md-8 text-center mx-auto">
                                <p class="my-0">
                                    <small>
                                        Setelah mengklik daftar anda harus menunggu verifikasi akun agar dapat login
                                    </small>
                                </p>
                                <div class="">
                                    <button class="btn btn-lg mx-0 w-50 btn-main-2">
                                        <i class="fas fa-user-plus"></i>
                                        Daftar
                                    </button>
                                </div>
                            </div>
                        <?php $__env->endSlot(); ?>
                    <?php echo $__env->renderComponent(); ?>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/public/daftar.blade.php ENDPATH**/ ?>