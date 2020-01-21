<?php
    $checktolak = $acc == 0;
    $checksetuju = $tahapanProposal > 3;
    $bolehperiksa = ($tahapanProposal == 3||$tahapanProposal == 4) &&( $role == 4 || $role == 1);
?>
<?php if($checktolak && !$checksetuju): ?>
    <td class="bg-danger font-weight-bold"> Di tolak </td>
<?php elseif($checksetuju): ?>
    <td class="bg-success font-weight-bold"> Di Setujui </td>
<?php elseif(!$checktolak && !$checksetuju && $is_revisi == 1): ?>
    <td class="bg-warning font-weight-bold"> Menunggu revisi </td>
<?php elseif($bolehperiksa): ?>
    <td class="bg-info font-weight-bold">
        <a class="" href="<?php echo e(base_url('periksa/skpd/'.$idHibahBansos)); ?>">Periksa</a>
    </td>
<?php else: ?>
    <td class=""> Proses </td>
<?php endif; ?><?php /**PATH /home/imandidik/Desktop/valet/hibansos/application/views/operator/pemeriksaan/skpd.blade.php ENDPATH**/ ?>