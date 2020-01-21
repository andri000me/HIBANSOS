<?php
        $pemeriksaan = ['tu','setda','skpd','tapd','bupati']
        ?>
<table class="table table-borderless">
    <tbody>
    <?php $__currentLoopData = [
    'Di ajukan'=>\Carbon\Carbon::instance(\Carbon\Carbon::make($tglPengajuan))->formatLocalized('%d  %B  %Y'),
    'Tanggal pelaksanaan'=>\Carbon\Carbon::instance(\Carbon\Carbon::make($tglKegiatan))->formatLocalized('%d  %B  %Y'),
    'Tahapan'=>$tahapanProposal==6&&$acc==1?"Di setujui": "Pemeriksaan ".strtoupper($pemeriksaan[$tahapanProposal==1?0:$tahapanProposal-1]),
    'Dana di ajukan'=>rupiah($dana),
    'Dana di setujui'=>$danaEvaluasiTAPD == 0 ?"-":rupiah($danaEvaluasiTAPD),
    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th => $td): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr><th class="p-0"><?php echo e($th); ?></th><td class="p-0"><?php echo e($td); ?></td></tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr><th class="p-0">Kategori : </th></tr>
    <tr>
        <td colspan="2" class="p-0"><?php echo e($kategoriPemeriksaanTUSETDA == 0 ||$kategoriPemeriksaanTUSETDA ==-1 ?"Belum di periksa":kategori_hibansos($kategoriPemeriksaanTUSETDA-1)); ?></td>
    </tr>
    </tbody>
</table><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/component/informasi-umum.blade.php ENDPATH**/ ?>