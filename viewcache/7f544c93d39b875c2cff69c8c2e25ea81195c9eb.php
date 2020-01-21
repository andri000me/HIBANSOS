<?php if($acc == 0): ?>
    <td class="bg-danger font-weight-bold"> Di tolak </td>
<?php elseif($tahapanProposal == 5 && ($role == 6|| $role == 1)): ?>
    <td class="bg-info font-weight-bold">
        <a class="" href="<?php echo e(base_url('periksa/bupati/'.$idHibahBansos)); ?>">Periksa</a>
    </td>
<?php elseif($acc == 1): ?>
    <td class="bg-success font-weight-bold"> Di Setujui </td>
<?php else: ?>
    <td class=""> Proses </td>
<?php endif; ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/operator/pemeriksaan/bupati.blade.php ENDPATH**/ ?>