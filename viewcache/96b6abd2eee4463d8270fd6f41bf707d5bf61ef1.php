<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="<?php echo e(base_url('assets/')); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(base_url('assets/')); ?>css/mdb.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo e(base_url('assets/')); ?>js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo e(base_url('assets/')); ?>js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo e(base_url('assets/')); ?>js/bootstrap.min.js"></script>
    <?php echo $__env->yieldContent('css'); ?>
    <link href="<?php echo e(base_url('assets/')); ?>css/style.css" rel="stylesheet">
    <title>HB| <?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
<header>
    <?php $__env->startComponent('component.navbar',$nav); ?><?php echo $__env->renderComponent(); ?>
    <?php if($notifikasi): ?> <?php $__env->startComponent('component.notifikasi',$notifikasi); ?><?php echo $__env->renderComponent(); ?> <?php endif; ?>
</header>
<main id="app" class="">
    <?php echo $__env->yieldContent('content'); ?>
</main>
<?php $__env->startComponent('component.footer'); ?><?php echo $__env->renderComponent(); ?>
<script type="text/javascript" src="<?php echo e(base_url('assets/')); ?>js/mdb.min.js"></script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html><?php /**PATH /home/imandidik/Desktop/valet/hibansos/application/views/layout.blade.php ENDPATH**/ ?>