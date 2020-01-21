<div class="mb-4">
    <div class="view overlay">
        <img class="card-img-top" src="<?php echo e(base_url($foto)); ?>" alt="Card image cap">
        <a href="#!">
            <div class="mask rgba-white-slight"></div>
        </a>
    </div>
    <div class="">
        <div class="d-flex">
            <a href="<?php echo e(base_url('proposal/detail/'.$idHibahBansos)); ?>" role="button" class="btn btn-sm btn-info w-100 mx-0">
                <i class="fas fa-info-circle"></i>
                Detail proposal
            </a>
        </div>
        <div class="w-100 d-flex">
            <?php for($i = 1; $i <= 5; $i++): ?>
                <div style="width: 20%;margin: 0 .1rem 0 .1rem"
                     class="text-center
                            <?php if($i == 3 && $is_revisi!=0 && $acc !== 0): ?> bg-warning
                            <?php elseif($tahapanProposal>$i): ?> bg-success
                            <?php elseif($acc == 0): ?> bg-danger
                            <?php else: ?> bg-light <?php endif; ?>"
                ><?php echo e($i); ?></div>
            <?php endfor; ?>
        </div>
        <h6 class="mb-1 pt-3"><?php echo e($judulKegiatan); ?></h6>
        <small class="text-muted">oleh : <?php echo e($nama); ?></small>
        <table class="table table-borderless">
            <tbody>
            <?php $__currentLoopData = [
            'Di ajukan'=>\Carbon\Carbon::instance(\Carbon\Carbon::make($tglPengajuan))->formatLocalized('%d  %B  %Y'),
            'Dana di ajukan'=>rupiah($dana),
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th => $td): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr><th class="p-0"><?php echo e($th); ?></th><td class="p-0"><?php echo e($td); ?></td></tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr><th class="p-0">Kategori : </th></tr>
            <tr>
                <td colspan="2" class="p-0"><?php echo e($kategoriPemeriksaanTUSETDA == 0||$kategoriPemeriksaanTUSETDA == -1 ?"Belum di periksa":
                kategori_hibansos($kategoriPemeriksaanTUSETDA-1)); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php

        ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/component/cardproposal.blade.php ENDPATH**/ ?>