<?php
    $checktolak = $acc == 0;
    $checksetuju = $tahapanProposal > 1;
    $bolehperiksa = $tahapanProposal == 1 && ( $role == 2 || $role == 1)
?>


<?php if($checktolak && !$checksetuju): ?>
    <td class="bg-danger font-weight-bold"> Di tolak </td>
<?php elseif($checksetuju): ?>
    <td class="bg-success font-weight-bold"> Di Setujui </td>
<?php elseif($bolehperiksa): ?>
    <td class="bg-info font-weight-bold">
        <a class="" href="<?php echo e(base_url('periksa/tu/'.$idHibahBansos)); ?>">Periksa</a>
    </td>
<?php else: ?>
    <td class=""> Proses </td>
<?php endif; ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/operator/pemeriksaan/tu.blade.php ENDPATH**/ ?>