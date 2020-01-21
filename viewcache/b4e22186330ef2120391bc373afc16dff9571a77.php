<script>
    window.carinamalink= '<?php echo e(base_url('pencarian/nama/')); ?>';
</script>
<section>
    <div class="w-100 my-5">
        <div class="display-4 text-center">
            Pengajuan proposal hibah bansos
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3" style="">
                    <h3 class="card-header bg-white h3-responsive">
                        Cari proposal
                    </h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form input-group mt-3">
                                    <input id="cari-nama-text" type="text" class="form-control" placeholder="Nama proposal" aria-label="Recipient's username"
                                           aria-describedby="MaterialButton-addon2">
                                    <div class="input-group-append">
                                        <a  class="btn btn-md btn-info m-0 px-3" id="cari-nama-link"><i class="fas fa-search"></i> Cari</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mt-3">
                                    <select class="browser-default custom-select" id="kategori-select" aria-label="Example select with button addon">
                                        <option selected disabled value="">Kategori proposal</option>
                                        <?php $__currentLoopData = kategori_hibansos(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val=>$kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(base_url('pencarian/kategori/'.($val+1))); ?>" ><?php echo e($kategori); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="input-group-append">
                                        <button  role="button" class="btn btn-md btn-info m-0 px-3" id="cari-kategori-link"><i class="fas fa-search"></i> Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="mt-5 text-justify">
                                Hibansos tercipta dengan tujuan transparansi terkait pendanaan kegiatan hibah dan bantuan sosial dari pihak pemerintah kepada masyarakat Kabupaten Bogor.
                                Anda dapat melakukan pencarian berdasarkan nama dan kategori OPD (Organisasi perangkat Daerah) ataupun asisten vertikal dan akan menampilkan informasi lengkap tentang proposal, pemeriksaan, kegiatan, jumlah dana yang di cairkan dan monitoring.
                            </p>
                            <p class="text-justify">
                                Anda dapat melakukan pencarian berdasarkan nama dan kategori OPD (Organisasi perangkat Daerah) ataupun asisten vertikal dan akan menampilkan informasi lengkap tentang proposal, pemeriksaan, kegiatan, jumlah dana yang di cairkan dan monitoring.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="">
                    <h3 class="card-header bg-white h3-responsive">
                        Proposal terakhir di ajukan
                    </h3>
                    <div class="card-body">
                        <div class="row mb-3 justify-content-center">
                            <?php if(is_array($list)): ?>
                                <?php for($i = 0; $i < 3; $i++): ?>
                                    <div class="col-3">
                                        <?php $__env->startComponent('component.cardproposal',$list[$i]??$list[0]); ?><?php echo $__env->renderComponent(); ?>
                                    </div>
                                <?php endfor; ?>
                                <?php else: ?>
                                <small>Saat ini belum ada proposal masuk</small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/public/home/section-3.blade.php ENDPATH**/ ?>