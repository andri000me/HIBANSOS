<tr>
    <td><?php echo e($nama); ?></td>
    <td><?php echo e($noKtp); ?></td>
    <td><?php echo e($email); ?></td>
    <td><?php echo e($telepon); ?></td>
    <td><?php echo e($username); ?></td>
    <td>
        <?php if($statusAktif == 0): ?>
            <a data-action="<?php echo e(base_url('verifikasiAkun')); ?>" data-userid="<?php echo e($id); ?>" data-username="<?php echo e($username); ?>" class="btn btn-success btn-sm btn-action mr-2">
                <i class="fas fa-check"></i>     Verifikasi
            </a>
        <?php endif; ?>
        <button data-action="<?php echo e(base_url('hapusPengguna')); ?>" data-userid="<?php echo e($id); ?>" data-username="<?php echo e($username); ?>" class="btn btn-danger btn-sm btn-action">
            <i class="fas fa-user-minus"></i>      Hapus
        </button>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/administrator/menagamenpengguna/pengguna.blade.php ENDPATH**/ ?>