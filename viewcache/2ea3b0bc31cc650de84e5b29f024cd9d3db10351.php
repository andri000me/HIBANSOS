<?php
    $checktolak = $acc == 0;
    $checksetuju = $tahapanProposal > 4;
    $bolehperiksa = $tahapanProposal == 4 && ($role == 5 || $role == 1) && !$checktolak;
?>
<?php if($checksetuju): ?>
    <td class="rgba-teal-strong font-weight-bold"> <a class="" href="<?php echo e(base_url('verifikasi/tapd/'.$idHibahBansos)); ?>">Lihat form</a></td>
<?php elseif($checktolak): ?>
    <td class="bg-danger font-weight-bold"> Di tolak </td>
<?php elseif($bolehperiksa): ?>
    <td class="bg-info font-weight-bold">
        <a class="" href="<?php echo e(base_url('verifikasi/tapd/'.$idHibahBansos)); ?>">Periksa</a>
    </td>
<?php else: ?>
    <td class=""> Proses </td>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/operator/pemeriksaan/tapd.blade.php ENDPATH**/ ?>