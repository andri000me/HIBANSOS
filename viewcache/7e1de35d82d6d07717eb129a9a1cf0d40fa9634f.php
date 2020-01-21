<?php         setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
?>

<?php $__env->startSection('title'); ?>
    Detail pemeriksaan
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="mt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <?php ?>
                    <a href="<?php echo e((int)$user->role_id === 8 ?base_url('daftarMonitoring') : base_url('pemeriksaan')); ?>" class="btn mx-0 mr-1 btn-sm btn-info">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
                <div class="col-12">
                    <?php $__env->startComponent('.operator.form.inforproposal',$proposal); ?>
                        <div class="col-md-6">
                            <p class="p-1 border-bottom text-capitalize">Rekomendasi SKPD</p>
                            <div>
                                <?php if($proposal['tahapanProposal']<3): ?>
                                    -
                                <?php else: ?>
                                    <?php if($skpd['pemberianRekomendasiDana'] == 1): ?>
                                        <?php echo e(rupiah($proposal['danaRekomendasiSKPD'])); ?>

                                    <?php else: ?>
                                        Tidak memberikan rekomendasi
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="p-1 border-bottom text-capitalize">Evaluasi TAPD</p>
                            <div>
                                <p class="p-1"><?php echo e(rupiah($proposal['danaEvaluasiTAPD'])); ?></p>
                            </div>
                        </div>
                    <?php echo $__env->renderComponent(); ?>
                </div>
                <div class="col-6 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="h4-responsive">
                                Pra kegiatan
                            </h4>
                            <a role="button" href="<?php echo e(base_url('proposal/detail/'.$proposal['idHibahBansos'])); ?>" class="btn btn-sm btn-info">
                                Lihat proposal
                            </a>
                            <table class="table">
                                <thead class="text-uppercase">
                                <tr>
                                    <th>Operator</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;
                                $arr = ["tu"=>[
                                "pemeriksaan"=>$tu,
                                "tahapan"=>1,
                                ], "setda"=>[
                                "pemeriksaan"=>$setda,
                                "tahapan"=>2,
                                ], "skpd"=>
                                [
                                "pemeriksaan"=>$skpd,
                                "tahapan"=>3
                                ],
                                "tapd"=>["tahapan"=>4,"pemeriksaan"=>$tapd],
                                "bupati"=>["tahapan"=>5,"pemeriksaan"=>$bupati]];
                                $touse = null;
                                ?>
                                <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nama_operator=>$pemeriksaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-uppercase"><?php echo e($nama_operator); ?></td>
                                        <?php $__env->startComponent("operator.detailpemeriksaan.".$nama_operator,
                                        [
                                        "datapemeriksaan"=>$arr,
                                        "proposal"=>$proposal,
                                        "user"=>$user
                                        ]); ?>
                                        <?php echo $__env->renderComponent(); ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php if((int)$proposal['acc']==0): ?>
                                <div class="md-form">
                                    <textarea id="form7" readonly class="md-textarea  form-control" rows="3"><?php echo e($proposal['alasanPenolakan']); ?></textarea>
                                    <label class="text-dark" for="form7">Alasan penolakan</label>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-6 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="h4-responsive">
                                Pasca kegiatan
                            </h4>
                            <?php
                                if(isset($lpj)){
                                $proposal['hasil_lpj'] = $lpj;
                                }
                            ?>
                            <?php $__env->startComponent('operator.pemeriksaan.pascaproposal',$proposal); ?><?php echo $__env->renderComponent(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/operator/detailPemeriksaan.blade.php ENDPATH**/ ?>