<?php $__env->startSection('content'); ?>
    <section class="mt-5">
        <div class="container py-5">
            <?php $__env->startComponent('operator.modaltolak'); ?>
            <?php echo $__env->renderComponent(); ?>
            <div class="row">
                <div class="col-12">
                    <?php $__env->startComponent('.operator.form.inforproposal',$proposal); ?>
                        <?php echo $__env->yieldContent('customtd'); ?>
                    <?php echo $__env->renderComponent(); ?>
                </div>
                <div class="col-6 my-3 mx-auto">
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header mdb-color darken-3" style="color: var(--main2)">
                            <h1 class="h1-responsive text-uppercase">
                                <?php if($operator == 'tapd'): ?>
                                    Verifikasi
                                <?php else: ?>
                                    Pemeriksaan
                                <?php endif; ?>  <?php echo e($operator); ?>

                            </h1>
                        </div>
                        <div class="card-body">
                            <?php echo $__env->yieldContent('form'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/operator/form/layout.blade.php ENDPATH**/ ?>