<?php $__env->startSection('title','Peraturan'); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="">
        <div class="container">
            <div class="card">
                <div class="card-header display-4 bg-transparent border-0">
                    HIBAH BANSOS
                </div>
                <div id="tentang-container" class="card-body">
                    <p class="">
                        Hibahbansos mengikuti peraturan-peraturan yang telah di tetapkan oleh pemerintah negara kesatuan republik indonesia dan pemerintah daerah antara lain
                    </p>
                    <table class="table">
                        <tbody>
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peraturan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th>
                                    <a target="_blank" role="button" class="btn btn-sm btn-info w-50" href="<?php echo e(base_url('lihatPeraturan/'.$peraturan['id'])); ?>">
                                        <?php echo e($peraturan['judul']); ?>

                                    </a>
                                </th>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <small>Untuk melihat peraturan tersebut silahkan klik tombol diatas</small>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/imandidik/Desktop/valet/hibansos/application/views/public/peraturan.blade.php ENDPATH**/ ?>