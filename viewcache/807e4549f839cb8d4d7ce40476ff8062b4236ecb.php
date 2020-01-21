<?php
    $common = ['Nama','KTP', 'Email', 'Nomor telepon', 'Username'];$isoperator = $tipe == "operator"; $isoperator ? array_push($common, 'Operator') : null;
?>

<?php $__env->startSection('title','Menagemen '.$tipe); ?>
<section class="my-5 py-5">
    <div class="container-fluid mb-5">
        <?php $__env->startComponent('component.big-card',['title'=>"Menagemen ".$tipe]); ?>
            <?php if($isoperator): ?>
                <a href="<?php echo e(base_url('tambahOperator')); ?>" class="btn my-3 btn-block btn-main-2 w-25">
                    <i class="fas fa-user-plus"></i>
                    Tambah operator
                </a>
            <?php endif; ?>
            <div class="" style="min-height: 100vh">
                <table class="table">
                    <thead>
                    <tr>
                        <?php $__currentLoopData = $common; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th><?php echo e($th); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $userlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $component = $isoperator? 'operator' : 'pengguna' ?>
                        <?php $__env->startComponent('administrator.menagamenpengguna.'.$component, $_user); ?> <?php echo $__env->renderComponent(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php echo $__env->renderComponent(); ?>
    </div>
</section>
<?php $__env->startSection('script'); ?>
    <?php $__env->startComponent('administrator.modalkonfirmasi',['tipe'=>$tipe]); ?><?php echo $__env->renderComponent(); ?>
    <script src="<?php echo e(base_url('assets/js/addons/datatables.js')); ?>"></script>
    <script src="<?php echo e(base_url('assets/js/menagemenpengguna.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/administrator/menagemenpengguna.blade.php ENDPATH**/ ?>