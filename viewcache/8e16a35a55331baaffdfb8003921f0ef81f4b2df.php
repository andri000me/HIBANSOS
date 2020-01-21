<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(base_url('uploadrevisi/'.$idHibahBansos)); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <small class="d-block">
                                Harap upload revisi proposal anda
                            </small>
                            <small class="<?php echo e(isset($formerror['fileProposal']) ? "text-danger":"text-muted"); ?> font-smaller">
                                <?php echo e(isset($formerror['fileProposal'])?$formerror['fileProposal'] : "Wajib di isi"); ?>

                            </small>
                            <div class="custom-file">
                                <input name="fileProposal" accept="application/pdf" type="file" class="custom-file-input" id="proposal" lang="in">
                                <label class="custom-file-label " for="proposal">File proposal</label>
                            </div>
                            <span class="d-inline-block" title="pilih file terlebih dahulu" tabindex="0" data-toggle="tooltip">
            <button id="form-btn"  disabled class="mx-0 btn btn-sm btn-main-2"
                    data-toggle="tooltip" data-placement="top">
                Upload revisi
            </button>
            </span>
                        </div>
                        <div class="col-6">
                            <small class="d-block">
                                Catatan revisi yang di berikan :
                            </small>
                            <p class="mb-0">
                                <?php echo e($revisi_note); ?>

                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/useraction.js')); ?>"></script>
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/user/upload_revisi.blade.php ENDPATH**/ ?>