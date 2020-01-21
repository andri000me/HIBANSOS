<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(base_url('assets/css/addons/quill.snow.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/addons/quill.min.js')); ?>"></script>
    <script type="application/javascript">
        window.delta = <?php echo json_encode($konten, 15, 512) ?>;
    </script>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/pengaturan.tentang.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<div class="">
    <div class="text-right">
        <form action="<?php echo e(base_url(uri_string())); ?>" method="post">
            <input type="hidden" id="tentang" name="tentang">
            <button id="save" disabled class="btn btn-sm bg-main1 mt-3 mx-0">
                <i class="fas fa-save"></i> Simpan perubahan
            </button>
        </form>
    </div>
    <div class="mt-3 flex-grow-1">
        <div id="quill-container" style="min-height: 50vh"></div>
    </div>
</div><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/administrator/pengaturan/tentang.blade.php ENDPATH**/ ?>