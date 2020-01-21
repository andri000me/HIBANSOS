<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-side modal-bottom-right" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="referer" value="<?php echo e($tipe); ?>">
                    <p class="modal-title w-100 text-dark">Konfirmasi</p>
                    <div class="p-2">
                        <label for="konfirmasi" class="">Username : <span class="font-weight-bold" id="username"></span></label>
                        <input  id="konfirmasi" name="username" placeholder="konfirmasi username pengguna" class="form-control" style="border-radius: 0">
                        <input type="hidden" name="userid" id="userid">
                        <div class="mt-3 text-right" id="btn-container">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/administrator/modalkonfirmasi.blade.php ENDPATH**/ ?>