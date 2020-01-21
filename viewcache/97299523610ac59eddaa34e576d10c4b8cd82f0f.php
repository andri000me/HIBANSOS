<?php
$checkTolak = $proposal["acc"] == 0 ;
$checkRevisi = in_array($proposal["is_revisi"] , ["1","2", ]);
$checkSetuju = $proposal["tahapanProposal"] >= 4 && !$checkRevisi;
$_datapemeriksaan =array_values (array_filter($datapemeriksaan, function ($val) use ($proposal){
    return $val["tahapan"] <= 4 && $val["pemeriksaan"] != null;
}));
$checkRevisi = $proposal["is_revisi"] == 1;
?>
<?php if(!$checkTolak && !$checkSetuju && !$checkRevisi): ?>
    <td colspan="3" class="text-center">-</td>
<?php else: ?>
    <?php if($checkSetuju): ?>
        <?php
        $carbon = new \Carbon\Carbon($_datapemeriksaan[count($_datapemeriksaan) -1 ]["pemeriksaan"]['waktu']);
        $waktu = $carbon->formatLocalized('%A, %d  %B  %Y');
        ?>
        <td><?php echo e($carbon->formatLocalized('%A, %d  %B  %Y')); ?></td>
        <td class="bg-success">
            Di setujui
        </td>
    <?php elseif($checkTolak): ?>
        <?php
        $carbon = new \Carbon\Carbon($_datapemeriksaan[ 0 ] ["pemeriksaan"]['waktu']);
        $waktu = $carbon->formatLocalized('%A, %d  %B  %Y');
        $class= "bg-danger white-text";
        ?>
        <td class=""><?php echo e($carbon->formatLocalized('%A, %d  %B  %Y')); ?></td>
        <td class="<?php echo e($class); ?>">
            Di tolak
        </td>
    <?php elseif($proposal["is_revisi"] == 1): ?>
        <?php
        $carbon = new \Carbon\Carbon($_datapemeriksaan[count($_datapemeriksaan) -1] ["pemeriksaan"]['waktu']);
        $waktu = $carbon->formatLocalized('%A, %d  %B  %Y');
        ?>
        <td><?php echo e($carbon->formatLocalized('%A, %d  %B  %Y')); ?></td>
        <td class="bg-warning">
            Revisi
        </td>
    <?php endif; ?>
    <?php if(
        $datapemeriksaan["skpd"]["pemeriksaan"] != null
        &&
        $datapemeriksaan["tapd"]["pemeriksaan"] == null
        ): ?>
        <?php if($proposal["is_revisi"] !== 2): ?>
            <td>
                <a class="btn btn-sm btn-info" href="<?php echo e(base_url('periksa/skpd/'.$proposal['idHibahBansos'])); ?>">Periksa lagi</a>
            </td>
        <?php endif; ?>
    <?php else: ?>
        <td>
            -
        </td>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/operator/detailpemeriksaan/skpd.blade.php ENDPATH**/ ?>