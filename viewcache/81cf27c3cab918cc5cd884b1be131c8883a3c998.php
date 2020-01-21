<?php
    $checktolak = $acc == 0;
    $checksetuju = $tahapanProposal > 2;
    $bolehperiksa = $tahapanProposal == 2 && ($role == 3 || $role == 1)
?>
<?php if($checktolak && !$checksetuju): ?>
    <td class="bg-danger font-weight-bold"> Di tolak </td>
<?php elseif($checksetuju): ?>
    <td class="bg-success font-weight-bold"> Di Setujui </td>
<?php elseif($bolehperiksa): ?>
    <td class="bg-info font-weight-bold">
        <a class="" href="<?php echo e(base_url('periksa/setda/'.$idHibahBansos)); ?>">Periksa</a>
    </td>
<?php else: ?>
    <td class=""> Proses </td>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/operator/pemeriksaan/setda.blade.php ENDPATH**/ ?>