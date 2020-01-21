<?php $__env->startSection('title','Periksa TU'); ?>
<?php $__env->startSection('form'); ?>
    <?php
        $list_kategori = array_chunk(array_slice(kategori_hibansos(),0,31,false), 16);
    ?>
    <form action="<?php echo e(base_url(uri_string())); ?>" method="post">
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
        <button class="btn btn-main1 btn-sm mx-1 form-check-input" id="lanjut-asisten" type="submit"><i class="fas fa-arrow-right"></i> Lanjut ke asisten</button>
        <p >Pilih salah satu kategori : <?php if(isset($formerror['kategoriPemeriksaanTUSETDA'])): ?>
           <span class="text-danger ml-3">
               <?php echo e($formerror['kategoriPemeriksaanTUSETDA']); ?>

           </span>
        <?php endif; ?> </p>
        <div class="row">
            <?php $value_kategori = 1; ?>
            <?php $__currentLoopData = $list_kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $side): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6">
                    <?php $__currentLoopData = $side; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $rid = uniqid() ?>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" value="<?php echo e($value_kategori); ?>" id="<?php echo e($rid); ?>" name="kategoriPemeriksaanTUSETDA">
                            <label class="custom-control-label" for="<?php echo e($rid); ?>"><?php echo e($option); ?></label>
                        </div>
                        <?php $value_kategori++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/pemeriksaan/tu.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('operator.form.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/operator/form/tu.blade.php ENDPATH**/ ?>