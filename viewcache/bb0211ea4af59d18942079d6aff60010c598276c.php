<tr>
    <td><?php echo e($nama); ?></td>
    <td><?php echo e($noKtp); ?></td>
    <td><?php echo e($email); ?></td>
    <td><?php echo e($telepon); ?></td>
    <td><?php echo e($username); ?></td>
    <td class="text-uppercase"><?php echo e(tipe_operator((int)$role_id)); ?></td>
    <td>
        <a href="<?php echo e(base_url('editOperator/'.$id)); ?>" class="btn btn-warning mr-1 btn-sm">
           <span class="text-dark"><i class="fas fa-edit"></i>        <span class="text-dark">Edit</span></span>
        </a>
        <button  data-action="<?php echo e(base_url('hapusPengguna')); ?>"  data-userid="<?php echo e($id); ?>" data-username="<?php echo e($username); ?>" class="btn-action btn btn-danger btn-sm">
            <span class="text-dark">
                <i class="fas fa-user-minus"></i>
            Hapus
            </span>
        </button>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/administrator/menagamenpengguna/operator.blade.php ENDPATH**/ ?>