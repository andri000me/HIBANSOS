<div id="" data-autohide="true" role="alert" data-animation="true" aria-live="assertive" aria-atomic="true" class="show toast <?php echo e($kode == 200 ?"bg-info text-black":'bg-danger '); ?>">
        <div class="toast-body">
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            <span class="text-capitalize"><?php echo e($pesan); ?></span>
    </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        setTimeout(function(){ $('.toast').removeClass('show') }, 5000);
    });
</script><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/component/notifikasi.blade.php ENDPATH**/ ?>