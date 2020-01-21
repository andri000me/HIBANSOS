<?php         setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');?>

<?php $__env->startSection('title','Pemeriksaan'); ?>
<?php $__env->startSection('content'); ?>
    <section class="mt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-6 mx-auto">
                    <h1 class="h1-responsive text-center text-capitalize">
                        Daftar proposal monitoring
                    </h1>
                </div>
                <div class="p-3 w-100">
                    <div class="mx-auto">
                        <table id="table-pemeriksaan" class="table w-100 table-bordered">
                            <thead>
                            <?php $__currentLoopData = ['Detail','Nama kegiatan', 'Pengaju','Tanggal','Dana di terima','Periksa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th><?php echo e($th); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hibansos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php for($i = 0; $i < 1000; $i++): ?>
                                    <tr>
                                        <td><a href="<?php echo e(base_url('detailpemeriksaan/'.$hibansos['idHibahBansos'])); ?>">detail</a></td>
                                        <?php $__env->startComponent('operator.pemeriksaan.auditor',$hibansos); ?>
                                        <?php echo $__env->renderComponent(); ?>
                                    </tr>
                                <?php endfor; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script style="<?php echo e(base_url('assets/js/pemeriksaan.js')); ?>"></script>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/addons/datatables.js')); ?>"></script>
    <script>
        $("table").dataTable();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/operator/auditor.blade.php ENDPATH**/ ?>