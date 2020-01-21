<?php $__env->startSection('title','Periksa TAPD'); ?>
<?php $__env->startSection('customtd'); ?>
    <div class="col-md-6">
        <p class="p-1 border-bottom text-capitalize">Rekomendasi SKPD</p>
        <div>
            <?php echo e(rupiah($proposal['danaRekomendasiSKPD'])); ?>

        </div>
    </div>
    <div class="col-md-6">
        <p class="p-1 border-bottom text-capitalize">Evaluasi TAPD</p>
        <div>
            <p class="p-1"><?php echo e(rupiah($proposal['danaEvaluasiTAPD'])); ?></p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('form'); ?>
    <form action="<?php echo e(base_url(uri_string())); ?>" method="post" novalidate>
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="md-form">
                    <textarea id="form7" class="md-textarea form-control" name="keterangan" placeholder="Keterangan" rows="3"></textarea>
                    <label for="form7" class=" <?php if(isset($formerror['keterangan'])): ?> text-danger <?php endif; ?>">Wajib di isi</label>
                </div>
                <a href="<?php echo e(base_url('pemeriksaan')); ?>" class="btn mr-1 btn-sm btn-info">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
                <button type="button" data-toggle="modal" data-target="#modal-tolak" class="btn mx-1 btn-sm btn-danger">
                    <i class="fas fa-trash-alt"></i>            Tolak
                </button>
                <button type="submit" class="btn mx-1 btn-sm btn-main-2">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/pemeriksaan/tu.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('operator.form.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/operator/form/bupati.blade.php ENDPATH**/ ?>