<?php         setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');?>

<?php $__env->startSection('title','Detail proposal'); ?>
<?php $__env->startSection('content'); ?>
    <section class="mt-5">
        <div class="container py-5">
            <?php if(isset($user->id)): ?>
                <?php if($user->id == $proposal['idYangMengajukan']): ?>
                    <?php if($proposal['is_revisi']==1 && $proposal['revisi_count']<3 && $user!=null): ?>
                        <?php $__env->startComponent('user.upload_revisi',$proposal); ?><?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>
                    <?php if($proposal['acc'] == 1 && $proposal['progres'] == 0): ?>
                        <?php $__env->startComponent('user.upload_progress',$proposal); ?><?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>
                    <?php if($proposal['monitoring'] == 1 && $proposal['lpj'] == 0): ?>
                        <?php $__env->startComponent('user.upload_lpj',$proposal); ?><?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img id="display-proposal" src="<?php echo e(base_url($proposal['foto'])); ?>" alt="thumbnail" class="img-thumbnail"
                            >
                        </div>
                        <div class="col-6">
                            <h3><?php echo e($proposal['judulKegiatan']); ?></h3>
                            <hr>
                            <p class="subtitle">
                                oleh : <?php echo e($proposal['nama']); ?>

                            </p>
                            <?php $__env->startComponent('component.informasi-umum',$proposal); ?>
                            <?php echo $__env->renderComponent(); ?>
                            <?php if(isset($user->id)): ?>
                                <?php if((int)$proposal['tahapanProposal']===1 && $user->id === $proposal['idYangMengajukan']): ?>
                                    <a href="<?php echo e(base_url('editHibahBansos/'.$proposal['idHibahBansos'])); ?>" class="btn ml-0 btn-sm btn-info">
                                        Edit proposal
                                    </a>
                                    <a href="<?php echo e(base_url('hapusHibahBansos/'.$proposal['idHibahBansos'])); ?>" class="btn ml-0 btn-sm btn-danger">
                                        Hapus proposal
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div>
                                <p>Unduh dokumentasi proposal</p>
                                <a href="<?php echo e(base_url('lihatProposal/'.$proposal['idHibahBansos'])); ?>" class="badge p-2 badge-default">Proposal</a>
                                <?php if($proposal['progres']==1&& $proposal['acc']==1): ?>
                                    <a target="_blank" href="<?php echo e(base_url('proposal/progres/'.$proposal['idHibahBansos'])); ?>" class="badge p-2 badge-primary">Progress</a>
                                <?php endif; ?>
                                <?php if($proposal['monitoring']==1&& $proposal['acc']==1): ?>
                                    <a target="_blank" href="<?php echo e(base_url('lihatMonitoring1/'.$proposal['idHibahBansos'])); ?>" class="badge p-2 badge-secondary">Monitoring 1</a>
                                <?php endif; ?>
                                <?php if($proposal['lpj']==1&& $proposal['acc']==1): ?>
                                    <a target="_blank" href="<?php echo e(base_url('lihatlpj/'.$proposal['idHibahBansos'])); ?>" class="badge p-2 badge-success">LPJ</a>
                                <?php endif; ?>
                                <?php if($proposal['monitoring2']==1&& $proposal['acc']==1): ?>
                                    <a target="_blank" href="<?php echo e(base_url('lihatMonitoring2/'.$proposal['idHibahBansos'])); ?>"  class="badge p-2 badge-danger">Monitoring 2</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <?php if(isset($lpj)): ?>
                    <?php $__env->startComponent('public.lpj-card',$lpj); ?>
                    <?php echo $__env->renderComponent(); ?>
                <?php endif; ?>
                <div class="col-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="h5-responsive">
                                <i class="fab fa-wpforms"></i>
                                Status pemeriksaan
                            </h5>
                            <table class="table">
                                <thead class="text-uppercase">
                                <tr>
                                    <th>Operator</th>
                                    <th>Status</th>
                                    <th>Waktu</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0;
                                $arr = ["tu"=>$tu, "setda"=>$setda, "skpd"=>$skpd, "tapd"=>$tapd, "bupati"=>$bupati];
                                ?>
                                <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nama_operator=>$pemeriksaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-uppercase"><?php echo e($nama_operator); ?></td>
                                        <?php if($pemeriksaan != null): ?>
                                            <?php $carbon = new \Carbon\Carbon($pemeriksaan['waktu']); ?>
                                            <?php $check = $pemeriksaan['acc'] == 2 ?>
                                            <?php $class = $check ? "bg-danger":"bg-success";   ?>
                                            <?php $text = $check ? "Di tolak":"Di setujui";   ?>
                                            <?php if($nama_operator === 'tu'||$nama_operator === 'setda'): ?>
                                                <?php if((int)$pemeriksaan['kategori'] === -1): ?>
                                                    <td colspan="2" class="bg-light">Dalam proposes</td>
                                                <?php else: ?>
                                                    <td class="<?php echo e($class); ?>"><?php echo e($text); ?></td>
                                                    <td class="<?php echo e($class); ?>"> <?php echo e($carbon->formatLocalized('%A, %d  %B  %Y')); ?> </td>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if($proposal["is_revisi"]==1): ?>
                                                    <?php $class = $proposal["is_revisi"]==1 ? "bg-warning":$class;   ?>
                                                    <?php $text = $proposal["is_revisi"]==1 ? "Revisi":$text;   ?>
                                                <?php endif; ?>
                                                <td class="<?php echo e($class); ?>"><?php echo e($text); ?></td>
                                                <td class="<?php echo e($class); ?>"> <?php echo e($carbon->formatLocalized('%A, %d  %B  %Y')); ?> </td>
                                            <?php endif; ?>
                                        <?php elseif($nama_operator == "setda"): ?>
                                            <?php $carbon = new \Carbon\Carbon($arr["tu"]['waktu']); ?>
                                            <td class="bg-success">Di setujui</td>
                                            <td class="<?php echo e($class); ?>"> <?php echo e($carbon->formatLocalized('%A, %d  %B  %Y')); ?> </td>
                                        <?php elseif($proposal["acc"] == 0): ?>
                                            <td colspan="2" class="bg-danger">Di tolak</td>
                                        <?php else: ?>
                                            <td colspan="2" class="bg-light">Dalam proses</td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6 mt-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="h5-responsive">
                                <i class="fas fa-money-check-alt"></i>  Pendanaan
                            </h5>
                            <table class="table">
                                <thead class="">
                                <tr>
                                    <th>Dana yang di ajukan</th>
                                    <th><?php echo e(rupiah($proposal['dana'])); ?></th>
                                </tr>
                                <tr>
                                    <th>Rekomendasi SKPD</th>
                                    <th><?php echo e($proposal['tahapanProposal']>3?rupiah($proposal['danaRekomendasiSKPD']):'-'); ?></th>
                                </tr>
                                <tr>
                                    <th>Evaluasi TAPD</th>
                                    <th><?php echo e($proposal['tahapanProposal']>5?rupiah($proposal['danaEvaluasiTAPD']):'-'); ?></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <blockquote class="blockquote bg-white">
                                <p class="bq-title">Latar belakang</p>
                                <p>
                                    <?php echo e($proposal['latarBelakang']); ?>

                                </p>
                            </blockquote>
                            <blockquote class="blockquote bg-white">
                                <p class="bq-title">Maksud dan tujuan</p>
                                <p>
                                    <?php echo e($proposal['maksudTujuan']); ?>

                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/public/detailproposal.blade.php ENDPATH**/ ?>