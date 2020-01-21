<?php
    $points = [
    ['name'=>'poin7','title'=>'Bukti Serah Terima Barang Berupa Berita Acara Serah Terima Barang'],
    ['name'=>'poin8a','title'=>'a. Satu Tahap Pencairan/Sekaligus'],
    ['name'=>'poin8b','title'=>'b. Beberapa Tahap Pencairan, dibagi :'],
    ['name'=>'poin8b1','title'=>'Laporan Tahap I'],
    ['name'=>'poin8b2','title'=>'Laporan Tahap II'],
    ['name'=>'poin8b3','title'=>'Laporan Tahap III'],
    ['name'=>'poin8b4','title'=>'Laporan Tahap IV'],
    ['name'=>'poin9','title'=>'Dokumentasi Hasil kegiatan'],
    ['name'=>'poin10','title'=>'Sisa Hibah/Bansos']];
    $progress = [
    ['name'=>'progresPoin7'],   
    ['name'=>'progresPoin8a'],
    ['name'=>'progresPoin8b'],
    ['name'=>'progresPoin8b1'],
    ['name'=>'progresPoin8b2'],
    ['name'=>'progresPoin8b3'],
    ['name'=>'progresPoin8b4'],
    ['name'=>'progresPoin9'],
    ['name'=>'progresPoin10',],
    ];
?>

<?php $__env->startSection('title','Monitoring 1'); ?>
<?php $__env->startSection('form'); ?>
    <form action="<?php echo e(current_url()); ?>" method="post">
        <?php if(isset($formerror)): ?>
            <p class="text-danger">Terdapat kesalahan input data</p>
        <?php endif; ?>
        <?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $radio_id1 = uniqid()  ?>
            <?php $radio_id2 = uniqid()  ?>
            <?php $field_id = uniqid()  ?>
            <div class="form-group row">
                <label for="inputEmail3MD" class="col-4 col-form-label">
                    <?php if(isset($point['head'])): ?>
                        <?php echo e($point['head']); ?> : <br />
                    <?php endif; ?>
                    <?php echo e($point['title']); ?></label>
                <div class="col-8">
                    <div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input  type="radio"
                                    value="1"
                                    <?php if(isset($preval[$point['name']])): ?>
                                    <?php if($preval[$point['name']] == 1 ): ?>
                                    checked
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    required
                                    class="custom-control-input" id="<?php echo e($radio_id1); ?>" name="<?php echo e($point['name']); ?>">
                            <label class="custom-control-label" for="<?php echo e($radio_id1); ?>">Ada / Sesuai</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                    <?php if(isset($preval[$point['name']])): ?>
                                    <?php if($preval[$point['name']] == 0 ): ?>
                                    checked
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    type="radio" value="0" required class="custom-control-input" id="<?php echo e($radio_id2); ?>" name="<?php echo e($point['name']); ?>">
                            <label class="custom-control-label" for="<?php echo e($radio_id2); ?>">Tidak ada / tidak sesuai</label>
                        </div>
                    </div>
                    <div class="md-form mt-0">
                        <input type="text"
                               <?php if(isset($preval[$progress[$index]['name']])): ?>
                               value="<?php echo e($preval[$progress[$index]['name']]); ?>"
                               <?php endif; ?>
                               name="<?php echo e($progress[$index]['name']); ?>"
                               class="form-control only_number"
                               id="<?php echo e($field_id); ?>"
                               placeholder="Isi 1 - 100">
                        <?php if(isset($formerror[$point['name']])): ?>
                            <small class="text-danger"><?php echo e($formerror[$point['name']]); ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="md-form">
                <textarea id="keterangan" name="keterangan" placeholder="Keterangan" class="md-textarea form-control" rows="3"></textarea>
                <label for="keterangan">Wajib di isi</label>
                <?php if(isset($formerror['keterangan'])): ?>
                    <small class="text-danger">
                        Wajib di isi
                    </small>
                <?php endif; ?>
            </div>
        <div>
            <button class="btn btn-lg btn-main-2">Simpan</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/pemeriksaan/auditor.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('operator.form.layout-monitoring', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/operator/form/monitoring 2.blade.php ENDPATH**/ ?>