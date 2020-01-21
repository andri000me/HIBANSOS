<?php
    $fields = [
     [
     'name'=>'username',
     'label'=>'Username',
     'preval'=>$preval['username'] ?? null,
     'error'=>$formerror['username'] ?? null
     ],
     [
     'name'=>'password',
     'label'=>'Password',
     'type'=>'password',
     'error'=>$formerror['password']?? null,
     'preval'=>null
     ],
     ];
?>

<?php $__env->startSection('title','login'); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(base_url('assets/js/global.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div class="container">
            <div class="col-md-6 mx-auto">
                <form action="<?php echo e(base_url('login')); ?>" method="post" novalidate>
                    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__env->startComponent('component.field', $field); ?><?php echo $__env->renderComponent(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <p class="form-text text-right <?php if(isset($_400)|| isset($_404) || isset($formerror)): ?> text-danger <?php else: ?> text-muted <?php endif; ?>">
                        <?php echo e($_400 ?? $_404?? "* harap isi semua bidang"); ?>

                    </p>
                    <div class="d-flex my-0">
                        <button class="btn bg-main2 mx-1 my-0 btn-block my-4 btn-main-2" type="submit">
                            <i class="fas fa-sign-in-alt"></i>
                            Login
                        </button>
                        <a href="<?php echo e(base_url('daftar')); ?>" role="button" class="btn mx-1 my-0 btn-outline-dark btn-block my-4">
                            <i class="fas fa-user-plus"></i>
                            Daftar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/public/login.blade.php ENDPATH**/ ?>