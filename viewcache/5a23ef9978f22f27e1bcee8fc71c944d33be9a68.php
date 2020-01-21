<?php
    $_link = explode('/',uri_string());
    $tipe = $_link[1];
    $_idhb = $_link[2];
    $revisilink = implode('/',[$_link[0],$tipe,'revisi',$_idhb]);
?>
<div class="modal fade" id="modal-revisi" tabindex="100" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-side modal-bottom-right" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?php echo e(base_url($revisilink)); ?>" method="post">
                    <p class="modal-title w-100 text-dark">Revisi proposal</p>
                    <input type="hidden" name="revisi_count" value="<?php echo e($revisi_count); ?>">
                    <div class="p-2">
                        <div class="md-form">
                            <textarea id="form7" required name="revisi_note" class="md-textarea form-control" placeholder="Alasan diberikan revisi" rows="3"></textarea>
                            <label for="form7">Wajib di isi</label>
                        </div>
                    </div>
                    <button data-dismiss="modal" class="btn btn-sm btn-danger">
                        Tutup
                    </button>
                    <button class="btn btn-sm btn-main1">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/operator/modalrevisi.blade.php ENDPATH**/ ?>