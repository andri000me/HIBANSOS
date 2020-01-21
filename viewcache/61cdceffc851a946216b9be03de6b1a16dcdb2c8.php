<?php $__env->startSection('css'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/addons/datatables.js')); ?>"></script>
    <script type="application/javascript">
        $("table").dataTable({sort:false});
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','Pemeriksaan'); ?>
<?php $__env->startSection('content'); ?>
    <section class="mt-5">
        <div class="container-fluid py-5">
            <div class="card">
                <div class="card-header display-4 bg-transparent border-0">
                    Pemeriksaan
                </div>
                <div class="card-body">
                    <table id="table-pemeriksaan" class="table w-100 table-bordered">
                        <?php $__env->startComponent('operator.pemeriksaan.thead'); ?>
                        <?php echo $__env->renderComponent(); ?>
                        <tbody>
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hibansos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php $__env->startComponent('operator.pemeriksaan.infoproposal',$hibansos); ?>
                                    <?php echo $__env->renderComponent(); ?>
                                    <?php $__currentLoopData = ['tu','setda','skpd','tapd','bupati']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $td): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__env->startComponent('operator.pemeriksaan.'.$td,array_merge(['role'=>$user->role_id],$hibansos) ); ?><?php echo $__env->renderComponent(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td><a href="<?php echo e(base_url('detailpemeriksaan/'.$hibansos['idHibahBansos'])); ?>">detail</a></td>
                                </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/operator/periksa.blade.php ENDPATH**/ ?>