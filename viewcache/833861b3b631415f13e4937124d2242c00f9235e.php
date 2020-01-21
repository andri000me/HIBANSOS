<?php
    $commons = [
    ['name'=>'nomor','title'=>'Nomor surat'],
    ['name'=>'namaPenerima','title'=>'Nama penerima'],
    ['name'=>'alamatPenerima','title'=>'Alamat penerima'],
    ['name'=>'ketua','title'=>'Ketua/Pimpinan'],
    ['name'=>'danaDiterima','title'=>'Dana di terima','value'=>'1000']
    ];
    $points = [
    ['name'=>'poin1','title'=>'Proposal/Usulan Penerima Hibah/Bantuan Sosial'],
    ['name'=>'poin2','title'=>'Rekomendasi SKPD'],
    ['name'=>'poin3','title'=>'Keputusan Bupati Tentang Penetapan Daftar Penerima'],
    ['name'=>'poin4a','title'=>'a. Program Kegiatan','head'=>'Kesesuain NPHD'],
    ['name'=>'poin4b','title'=>'b. Besaran','head'=>'Kesesuain NPHD'],
    ['name'=>'poin5','title'=>'Pakta Integritas'],
    ['name'=>'poin6','title'=>'Bukti Transfer Uang Pada Hibah/Bansos Berupa Uang']];
    $progress = [
    ['name'=>'progresPoin1'],
    ['name'=>'progresPoin2'],
    ['name'=>'progresPoin3'],
    ['name'=>'progresPoin4a'],
    ['name'=>'progresPoin4b'],
    ['name'=>'progresPoin5'],
    ['name'=>'progresPoin6'],
    ];
?>

<?php $__env->startSection('title','Monitoring 1'); ?>
<?php $__env->startSection('form'); ?>
    <form action="<?php echo e(current_url()); ?>" novalidate method="post">
        <?php if(isset($formerror)): ?>
            <p class="text-danger">Terdapat kesalahan input data</p>
        <?php endif; ?>
        <?php $__currentLoopData = $commons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $_id = uniqid()  ?>
            <div class="form-group row">
                <div class="col-4">
                    <label for="<?php echo e($_id); ?>"><?php echo e($field['title']); ?></label>
                </div>
                <div class="col-8">
                    <div class="md-form mt-0">
                        <input type="text"
                               <?php if(isset($preval[$field['name']])): ?>
                               value="<?php echo e($preval[$field['name']]); ?>"
                               <?php endif; ?>
                               name="<?php echo e($field['name']); ?>"
                               class="form-control
                                      <?php if(isset($formerror[$field['name']])): ?>
                                       is-invalid
<?php endif; ?>"
                               id="<?php echo e($_id); ?>" placeholder="Harap di isi">
                        <?php if(isset($formerror[$field['name']])): ?>
                            <small class="text-danger"><?php echo e($formerror[$field['name']]); ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <div>
            <button type="submit" class="btn btn-lg btn-main-2">Simpan</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/pemeriksaan/auditor.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('operator.form.layout-monitoring', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/operator/form/monitoring 1.blade.php ENDPATH**/ ?>