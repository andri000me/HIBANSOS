<thead class="text-uppercase ">
<tr>
    <th style="vertical-align: middle" rowspan="2">Judul kegiatan</th>
    <th colspan="3">Besaran Belanja Hibah (Rp)</th>
    <th colspan="5">Status</th>
    <th style="vertical-align: middle" rowspan="2" colspan="1">Detail</th>
</tr>
<tr>
    <?php $__currentLoopData = ['Permohonan', 'Rekomendasi SKPD','Pertimbangan tapd','Pemeriksaan tu','Pemeriksaan Setda','Pemeriksaan SKPD','Verifikasi TAPD','Persetujuan bupati']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <th><?php echo e($th); ?></th>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tr>
</thead>
<?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/operator/pemeriksaan/thead.blade.php ENDPATH**/ ?>