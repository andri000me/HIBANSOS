<?php
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
?>

<?php $__env->startSection('title','Pencarian'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(base_url('assets/css/usercss.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="section mt-5">
        <div class="container-fluid py-5">
            <div class="row my-5">
                <div class="col-3">
                    <?php $__env->startComponent('component.tabel-informasi'); ?><?php echo $__env->renderComponent(); ?>
                </div>
                <div class="col-9 mb-5">
                    <div class="card pb-5">
                        <div class="card-body pt-0" id="card-container" style="max-height: 100vh;overflow-y: auto">
                            <nav style="top: 0;z-index: 98" class="navbar mx-0 sticky-top navbar-expand-lg bg-white">
                                <div class="collapse navbar-collapse" id="basicExampleNav">
                                    <div class="md-form input-group mt-3">
                                        <input id="cari-nama-text" type="text" class="form-control" placeholder="Nama proposal" aria-label="Recipient's username"
                                               aria-describedby="MaterialButton-addon2">
                                        <div class="input-group-append">
                                            <a  class="btn btn-md btn-info m-0 px-3" id="cari-nama-link"><i class="fas fa-search"></i> Cari</a>
                                        </div>
                                    </div>
                                    <div class="md-form input-group mt-3">
                                        <select class="browser-default custom-select" id="kategori-select" aria-label="Example select with button addon">
                                            <option selected disabled>Kategori proposal</option>
                                            <?php $__currentLoopData = kategori_hibansos(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val=>$kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(base_url('pencarian/kategori/'.($val+1))); ?>" ><?php echo e($kategori); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="input-group-append">
                                            <a  role="button" href="<?php echo e(base_url()); ?>" class="btn btn-md btn-info m-0 px-3" id="cari-kategori-link"><i class="fas fa-search"></i> Cari</a>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                            <div class="row">
                                <?php if(count($list)>0): ?>
                                    <div class="col-12">
                                        <?php if($list!= null): ?>
                                            <?php if(is_string($key )): ?>
                                                <p>Menampilkan <?php echo e(count($list)); ?> proposal</p>
                                            <?php else: ?>
                                                <p>Menampilkan <?php echo e(count($list)); ?> proposal dengan kata kunci "<?php echo e(kategori_hibansos($key-1)); ?>"</p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-3">
                                            <?php $__env->startComponent('component.cardproposal',$proposal); ?><?php echo $__env->renderComponent(); ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="col-12">
                                        <h1 class="display-4 text-center">
                                            Tidak dapat menemukan proposal
                                        </h1>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        window.carinamalink= '<?php echo e(base_url('pencarian/nama/')); ?>';
    </script>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/home.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/public/pencarian.blade.php ENDPATH**/ ?>