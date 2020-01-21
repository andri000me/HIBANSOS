<?php $common_field =
['field'=>[
['name'=> 'judulKegiatan','label'=>'Nama kegiatan',],
['name'=> 'nama','label'=>'Nama pengaju (Individu / Organisasi)',],
['name'=> 'deskripsiDana','label'=>'Deskripsi penggunaan dana'],
['name'=> 'dana','type'=>'number','label'=>'Dana di ajukan (Rp.)', 'parsley'=>'min=0'],
['name'=> 'alamat','label'=>'Alamat',],
],
'textarea'=>
[
['name'=>'latarBelakang', 'label'=>'Latar belakang'],
['name'=>'maksudTujuan', 'label'=>'Maksud & Tujuan'],
]
];
?>

<?php $__env->startSection('title','Tambah proposal'); ?>
<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/addons/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(base_url('assets/js/addons/id.js')); ?>"></script>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/tambahproposal.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e((base_url('assets/css/addons/datepicker.css'))); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="mt-5">
        <div class="container py-5">
            <div class="card">
                <h1 class="card-header h1-responsive bg-transparent border-0">
                    Tambah proposal
                </h1>
                <div class="card-body">
                    <form novalidate class="mt-3" action="<?php echo e(current_url()); ?>" method="post" enctype="multipart/form-data">
                        <h5 class="h5-responsive mb-0">
                            Informasi umum
                        </h5>
                        <div class="row">
                            <?php $__currentLoopData = $common_field['field']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-6">
                                    <?php $__env->startComponent('component.field', array_merge($field, [
                                    'error'=>$formerror[$field['name']] ?? null,
                                    'preval'=>$preval[$field['name']] ?? null
                                    ])); ?>
                                    <?php echo $__env->renderComponent(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <hr>
                        <h5 class="h5-responsive mt-3 mb-0">
                            Informasi proposal
                        </h5>
                        <div class="row">
                            <?php $__currentLoopData = $common_field['textarea']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $_txid = uniqid() ?>
                                <div class="col-6">
                                    <div class="md-form shadow-textarea position-relative mt-5">
                                        <label for="<?php echo e($_txid); ?>" class="<?php echo e(isset($formerror[$field['name']])?'text-danger':'text-muted'); ?>text-muted"><?php echo e(isset($formerror[$field['name']])?$formerror[$field['name']] :"Wajib di isi"); ?></label>
                                        <textarea
                                                name="<?php echo e($field['name']); ?>"
                                                class="form-control md-textarea <?php if(!isset($formerror[$field['name']])&&!$preval[$field['name']]): ?> initial <?php elseif(isset($preval[$field['name']]) && !isset($formerror[$field['name']])): ?> is-valid <?php else: ?> is-invalid <?php endif; ?>"
                                                style="border-radius: 0" id="<?php echo e($_txid); ?>" rows="3" placeholder="<?php echo e($field['label']); ?>"><?php echo e($preval[$field['name']] ?? ''); ?></textarea>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="md-form">
                                    <label for="datepicker"
                                           class="<?php echo e(isset($formerror['tglKegiatan']) ? "text-danger":"text-muted"); ?> font-smaller">
                                        <?php echo e($formerror['tglKegiatan'] ?? "Wajib di isi"); ?>

                                    </label>
                                    <input id="datepicker"
                                           name="tglKegiatan"
                                           type="text"
                                           <?php if(isset($preval['tglKegiatan'])): ?>
                                           value="<?php echo e($preval['tglKegiatan']); ?>"
                                           <?php endif; ?>
                                           class="form-control <?php if(!isset($formerror['tglKegiatan'])&&!$preval['tglKegiatan']): ?> initial <?php elseif(isset($preval['tglKegiatan']) && !isset($formerror['tglKegiatan'])): ?> is-valid <?php else: ?> is-invalid <?php endif; ?>"
                                           placeholder="Tanggal kegiatan">
                                </div>
                            </div>
                        </div>
                        <h5 class="h5-responsive mt-3 mb-0">
                            Dokumen
                        </h5>
                        <div class="row">
                            <div class="col-6 mt-5">
                                <small class="<?php echo e(isset($formerror['fileProposal']) ? "text-danger":"text-muted"); ?> font-smaller">
                                    <?php echo e(isset($formerror['fileProposal']) ? $formerror['fileProposal'] : "Wajib di isi"); ?>

                                </small>
                                <div class="custom-file">
                                    <input name="fileProposal" accept="application/pdf" type="file" class="custom-file-input" id="proposal" lang="in">
                                    <label class="custom-file-label " for="proposal">File proposal</label>
                                </div>
                            </div>
                            <div class="col-6 mt-5">
                                <small class="<?php echo e(isset($formerror['foto']) ? "text-danger":"text-muted"); ?> font-smaller">
                                    <?php echo e(isset($formerror['foto'])?$formerror['foto'] : "Wajib di isi"); ?>

                                </small>
                                <div class="custom-file">
                                    <input name="foto" type="file" class="custom-file-input" id="foto" lang="in">
                                    <label class="custom-file-label " for="foto">Foto proposal </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-5 mx-auto">
                                <button id="form-btn" disabled class="btn bg-primary w-100">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/user/tambahHibahBansos.blade.php ENDPATH**/ ?>