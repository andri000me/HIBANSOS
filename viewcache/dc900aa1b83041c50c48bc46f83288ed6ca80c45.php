<?php
    use Carbon\Carbon;
    $waktu = new Carbon($tglKegiatan) ?>
<td><?php echo e($judulKegiatan); ?></td>
<td><?php echo e($nama); ?></td>
<td><?php echo e($waktu->formatLocalized('%A, %d  %B  %Y')); ?></td>
<td><?php echo e(rupiah($danaEvaluasiTAPD)); ?></td>
<td>
    <?php if($progres = 1 && $monitoring == 0): ?>
        <a role="button" class="btn btn-sm w-100 btn-link btn-info" href="<?php echo e(base_url('monitoring1/'.$idHibahBansos)); ?>">Monitoring 1</a>
    <?php endif; ?>
        <?php if($monitoring = 1 && $lpj== 1 && $monitoring2 == 0): ?>
            <a role="button" class="btn btn-sm w-100 btn-link btn-info" href="<?php echo e(base_url('monitoring2/'.$idHibahBansos)); ?>">Monitoring 2</a>
        <?php endif; ?>
</td><?php /**PATH /home/imandidik/Desktop/valet/hibansos/application/views/operator/pemeriksaan/auditor.blade.php ENDPATH**/ ?>