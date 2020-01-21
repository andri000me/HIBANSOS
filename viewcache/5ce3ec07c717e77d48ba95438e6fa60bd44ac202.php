<?php $__env->startComponent('component.nav.public'); ?><?php echo $__env->renderComponent(); ?>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle <?php echo e(uri_string() == "proposalsaya" || uri_string() == 'tambahHibahBansos'?'active':''); ?> " id="navbarDropdownMenuLink" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">Proposal</a>
    <div class="dropdown-menu pr-3 dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="<?php echo e(base_url('proposalsaya')); ?>"><i class="fas fa-list-ul mr-1"></i>Proposal saya</a>
        <a class="dropdown-item" href="<?php echo e(base_url('tambahHibahBansos')); ?>"><i class="fas fa-plus mr-1"></i>Tambah proposal</a>
    </div>
</li>
<?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/component/nav/user.blade.php ENDPATH**/ ?>