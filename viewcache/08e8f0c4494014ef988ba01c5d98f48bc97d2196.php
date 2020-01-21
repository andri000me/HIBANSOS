<?php $__env->startSection('title','Periksa TAPD'); ?>
<?php $__env->startSection('customtd'); ?>
    <div class="col-md-12">
        <p class="p-1 border-bottom text-capitalize">Rekomendasi SKPD</p>
        <div>
            <?php echo e(rupiah($proposal['danaRekomendasiSKPD'])); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('form'); ?>
    <div class="row">
        <div class="col-6 mx-auto">
            <h5>Hasil pemeriksaan</h5>
            <table class="table w-100">
                <tr><th>Rekomendasi Dana</th>
                    <td> <?php echo e(rupiah((int)$proposal['danaEvaluasiTAPD'])); ?></td>
                </tr>
                <tr><th colspan="2">Keterangan</th></tr>
                <tr>
                    <td colspan="2">
                        <?php echo e($proposal['verifikasi']['keterangan']); ?>

                    </td>
                </tr>
            </table>
            <a href="<?php echo e(base_url('pemeriksaan')); ?>" class="btn mr-1 btn-sm btn-info">Kembali</a>
            <a target="_blank" href="<?php echo e(base_url('verifikasi/tapd/cetakForm/'.$proposal['idHibahBansos'])); ?>" class="btn mx-1 btn-sm btn-main-2">
                    <i class="fas fa-print"></i>
                Cetak formulir</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/pemeriksaan/tu.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('operator.form.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/operator/form/tapd-1.blade.php ENDPATH**/ ?>