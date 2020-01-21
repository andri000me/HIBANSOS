<table class="table">
    <thead>
    <tr>
        <th>
            Monitoring
        </th>
        <th>Hasil pemeriksaan</th>
        <th>LPJ/Progress</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Monitoring 1</td>
        <?php if($monitoring == 1 && $progres == 1): ?>
            <td>
                <a target="_blank" href="<?php echo e(base_url('lihatMonitoring1/'.$idHibahBansos)); ?>" class="badge p-2 w-100 badge-secondary">Lihat</a>
            </td>
            <td>
                <a target="_blank" href="<?php echo e(base_url('proposal/progres/'.$idHibahBansos)); ?>" class="badge p-2 w-100 badge-primary">Progress</a>
            </td>
        <?php elseif($monitoring == 0 && $progres == 1): ?>
            <td>-</td>
            <td>
                <a target="_blank" href="<?php echo e(base_url('proposal/progres/'.$idHibahBansos)); ?>" class="badge p-2 badge-primary">Progress</a>
            </td>
        <?php else: ?>
            <td class="text-center">-</td>
            <td class="text-center">-</td>
        <?php endif; ?>
    </tr>
    <tr>
        <td>Monitoring 2</td>
        <?php if($monitoring2 == 1 && $lpj == 1): ?>
            <td>
                <a target="_blank" href="<?php echo e(base_url('lihatMonitoring2/'.$idHibahBansos)); ?>"  class="badge w-100 p-2 badge-danger">Lihat</a>
            </td>
            <td>
                <a target="_blank" href="<?php echo e(base_url('lihatlpj/'.$idHibahBansos)); ?>" class="badge w-100 p-2 badge-success">LPJ</a>
            </td>
        <?php elseif($monitoring2 == 0 && $lpj ==1): ?>
            <td>-</td>
            <td>
                <a target="_blank" href="<?php echo e(base_url('lihatlpj/'.$idHibahBansos)); ?>" class="badge w-100 p-2 badge-success">LPJ</a>
            </td>
        <?php else: ?>
            <td class="text-center">-</td>
            <td class="text-center">-</td>
        <?php endif; ?>
    </tr>
    </tbody>
</table>
<?php if(isset($hasil_lpj)): ?>
    <blockquote  class="blockquote ">
        <p class="bq-title">
            Keterangan hasil monitoring
        </p>
        <p class="font-small">
            <?php echo e($hasil_lpj['keterangan']); ?>

        </p>
    </blockquote>
<?php endif; ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/operator/pemeriksaan/pascaproposal.blade.php ENDPATH**/ ?>