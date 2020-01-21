<?php $__env->startComponent('component.nav.public'); ?><?php echo $__env->renderComponent(); ?>
<li class="nav-item dropdown">
    <a class="nav-link <?php echo e(activenav('menagemenpengguna')); ?> dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">Menagemen pengguna</a>
    <div class="dropdown-menu pr-3  dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="<?php echo e(base_url('menagemenpengguna/pengguna')); ?>">pengguna</a>
        <a class="dropdown-item" href="<?php echo e(base_url('menagemenpengguna/operator')); ?>">operator</a>
    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link <?php echo e(activenav('pengaturanperaturan')); ?> <?php echo e(activenav('pengaturantentang')); ?> dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">Pengaturan</a>
    <div class="dropdown-menu pr-3 dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="<?php echo e(base_url('pengaturanperaturan')); ?>">Peraturan</a>
        <a class="dropdown-item" href="<?php echo e(base_url('pengaturantentang')); ?>">Tentang</a>
    </div>
</li><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/component/nav/administrator.blade.php ENDPATH**/ ?>