<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <p class="text-center font-weight-bol">
                        Dokumentasi video
                    </p>
                    <p class="text-center">
                        <a target="_blank" href="<?php echo e($linkYoutube); ?>">
                            <i class="fab fa-10x fa-youtube text-danger"></i>
                        </a>
                    </p>
                </div>
                <div class="col-6">
                    <p class="text-center font-weight-bold">
                        LPJ
                    </p>
                    <p class="text-center">
                        <a target="_blank" href="<?php echo e(base_url('lihatlpj/'.$idHibahBansos)); ?>"><i class="fas fa-10x text-info fa-file-invoice"></i></a>
                    </p>
                </div>
                <div class="col-12">
                    <div class="w-50">
                        <p>
                            Keterangan :
                        </p>
                        <p>
                            <?php echo e($keterangan); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/public/lpj-card.blade.php ENDPATH**/ ?>