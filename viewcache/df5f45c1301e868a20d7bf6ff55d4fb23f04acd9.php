<?php
    $common_field =
    [[
    ['name'=> 'nama','label'=>'Nama individu/organisasi','placeholder'=>'Nama lengkap sesuai KTP',],
    ['name'=> 'noKtp','label'=>'Nomor KTP','placeholder'=>'Nomor KTP dari nama / Ketua organisasi','parsley'=>'data-parsley-type=digits minlength=16 maxlength=16'],
    ['name'=> 'telepon','label'=>'Nomor Telepon','placeholder'=>'Nomor telepon yang masih aktif','parsley'=>'data-parsley-type=digits minlength=9 maxlength=12'],
    ['name'=> 'email','type'=>'email','label'=>'Email', 'placeholder'=>'contoh@domain.com']
    ],
    [
    ['name'=> 'alamat','label'=>'alamat','placeholder'=>'Alamat sesuai KTP / Organisasi'],
    ['name'=> 'username','label'=>'Username','placeholder'=>'Username untuk login','parsley'=>'minlength=6'],
    ['name'=> 'password','type'=>'password','placeholder'=>'password untuk login','label'=>'Password','parsley'=>'minlength=6'],
    ['name'=> 'k-password','type'=>'password','placeholder'=>'Konfirmasi password anda','label'=>'Konfirmasi password','parsley'=>'minlength=6']]
    ];
?>
<form action="<?php echo e(base_url($action)); ?>" method="post" novalidate	>
    <div class="row p-0">
        <?php $__currentLoopData = $fields ?? $common_field; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6">
                <?php $__currentLoopData = $field_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__env->startComponent('component.field', array_merge(
                    $field, ['error'=>$errors[$field['name']] ?? null,'preval'=>$preval[$field['name']] ?? null])); ?>
                    <?php echo $__env->renderComponent(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($radios ?? ''); ?>

        <?php echo e($formbutton); ?>

    </div>
</form><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/component/addedituser.blade.php ENDPATH**/ ?>