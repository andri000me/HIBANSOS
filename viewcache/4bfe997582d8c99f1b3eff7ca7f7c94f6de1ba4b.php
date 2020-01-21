<?php $__env->startSection('title','Tambah operator'); ?>
<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/global.js')); ?>"></script>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/validator.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="my-5 py-5">
        <div class="container mb-5">
            <?php $__env->startComponent('component.big-card', ['title'=>'Tambah operator']); ?>
                <div class="col-md-10 mx-auto">
                    <?php $__env->startComponent('component.addedituser',['action'=>uri_string(),'errors'=>$formerror,'preval'=>$preval]); ?>
                        <?php $__env->slot('formbutton'); ?>
                            <div class="col-md-6">
                                <?php if(isset($preval['id'])): ?>
                                    <input type="hidden" id="id" name="id" value="<?php echo e($preval['id']); ?>">
                                <?php endif; ?>
                                <button class="btn btn-lg mx-0 w-100 btn-main-2">
                                    <?php echo e(uri_string() === 'tambahOperator'?'Tambah operator':'Simpan'); ?>

                                </button>
                            </div>
                        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('radios'); ?>
                            <div class="col-md-12 mb-3">
                                <p class="form-text">Pilih operator
                                    <?php if(isset($formerror['role_id'])): ?>
                                        <small class="text-danger"> *Harus di pilih salah satu</small>
                                    <?php endif; ?>
                                </p>
                                <?php $__currentLoopData = tipe_operator(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operator=>$text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($operator!= 1): ?>
                                        <?php $_rid = uniqid() ?>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input
                                                    required
                                                    value="<?php echo e($operator); ?>"
                                                    <?php if(isset($preval['role_id'])): ?>
                                                    <?php if($preval['role_id'] == $operator): ?>
                                                    checked
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    type="radio" class="custom-control-input" id="<?php echo e($_rid); ?>" name="role_id">
                                            <label class="custom-control-label text-uppercase" for="<?php echo e($_rid); ?>"><?php echo e($text); ?></label>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php $__env->endSlot(); ?>
                    <?php echo $__env->renderComponent(); ?>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/administrator/edit_tambahoperator.blade.php ENDPATH**/ ?>