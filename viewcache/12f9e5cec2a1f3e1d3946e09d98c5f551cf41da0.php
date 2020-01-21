<?php
$checkTolak = $proposal["acc"] == 0 ;
$checkSetuju = $proposal["tahapanProposal"] >= 3;
$_datapemeriksaan =array_values (array_filter($datapemeriksaan, function ($val) use ($proposal){
    return $val["tahapan"] <= $proposal["tahapanProposal"] && $val["pemeriksaan"] != null;
}));
$checkUser = ($user->role_id == 1 || $user->role_id == 3);

?>
<?php if(!$checkTolak && !$checkSetuju ): ?>
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
    <?php endif; ?>

    <?php if(
    $checkUser
    &&
    $datapemeriksaan["setda" ]["pemeriksaan"] != null
    &&
    $datapemeriksaan["skpd" ]["pemeriksaan"] == null
    ): ?>
        <td>
            <a class="btn btn-sm btn-info" href="<?php echo e(base_url('periksa/setda/'.$proposal['idHibahBansos'])); ?>">Periksa lagi</a>
        </td>
    <?php else: ?>
        <td>
            -
        </td>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/operator/detailpemeriksaan/setda.blade.php ENDPATH**/ ?>