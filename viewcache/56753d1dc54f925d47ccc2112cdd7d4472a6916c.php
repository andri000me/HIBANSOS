<?php $__env->startSection('title','Log sistem'); ?>
<?php $__env->startSection('content'); ?>
    <section class="my-5 py-5">
        <div class="container-fluid mb-5">
            <?php $__env->startComponent('component.big-card',['title'=>"Log sistem"]); ?>
                <div class="" style="min-height: 100vh">
                    <table class="table">
                        <thead>
                        <tr>
                            <?php $__currentLoopData = ["User", "berita acara","fungsionalitas", "Waktu"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th><?php echo e($th); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $log['kegiatan']= explode(" : ",$log['kegiatan']) ?>
                            <tr>
                                <td>
                                    <?php echo e($log['pengguna']); ?>

                                </td>
                                <td>
                                    <?php echo e($log['kegiatan'][1]); ?>

                                </td>
                                <td>
                                    <?php echo e($log['kegiatan'][0]); ?>

                                </td>
                                <td>
                                    <?php echo e($log['waktu']); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(base_url('assets/js/addons/datatables.js')); ?>"></script>
    <script src="<?php echo e(base_url('assets/js/log.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/administrator/log.blade.php ENDPATH**/ ?>