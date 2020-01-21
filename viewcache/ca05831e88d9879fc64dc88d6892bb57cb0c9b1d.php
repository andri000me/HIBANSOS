<?php
    $administrasi = ['Akta Notaris Pendirian Lembaga','Surat Pernyataan Tanggung Jawab','Nomor Pokok Wajib Pajak','Surat Keterangan Domisili Lembaga dari Desa / Kelurahan Setempat
    ',' Izin Operasional Tanda Daftar Lembaga dari Instansi yang Berwenang','Bukti Kontrak Sesuai Gedung/Bangunan Bagi Lembaga yang Kantornya Menyewa','Salinan Fotocopy KTP Atas Nama Ketua dan Sekretaris','Salinan Rekening Bank yang Masih Aktif Atas Nama Lembaga dan/atau Pengurus Belanja Hibah'.''];
$dokumen = ['Proposal Hibah Bansos', 'Surat Keterangan Tanggung Jawab', 'Surat Keterangan Kesediaan Menyediakan Dana Pendamping','Gambar Rencana dan Konstruksi Bangunan']

?>

<?php $__env->startSection('title','Periksa TU'); ?>
<?php $__env->startSection('form'); ?>
    <?php $__env->startComponent('operator.modalrevisi',$proposal); ?><?php echo $__env->renderComponent(); ?>
    <form action="<?php echo e(base_url(uri_string())); ?>" method="post">
        <a href="<?php echo e(base_url('pemeriksaan')); ?>" class="btn mr-1 btn-sm btn-info">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
        <button type="button" data-toggle="modal" data-target="#modal-tolak" class="btn mx-1 btn-sm btn-danger">
            <i class="fas fa-trash-alt"></i>            Tolak
        </button>
        <button id="submit" type="submit" class="btn mx-1 btn-sm btn-main-2">
            <i class="fas fa-save"></i>
            Kirim ke tim TAPD
        </button>
        <?php if( $proposal['revisi_count']<2): ?>
            <button type="button" class="btn btn-main1 btn-sm mx-1" data-toggle="modal" data-target="#modal-revisi" > Revisi</button>
        <?php endif; ?>
        <div class="row mt-3">
            <div class="col-6 mt-2">
                <h3 class="h3-responsive">Persyaratan administrasi</h3>
                <hr>
                <?php if(isset($formerror['persyaratanAdministrasi[]'])): ?>
                    <p class="text-danger"><?php echo e($formerror['persyaratanAdministrasi[]']); ?></p>
                <?php endif; ?>
                <?php $__currentLoopData = $administrasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value =>$text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $cid = uniqid() ?>
                    <div class="custom-control custom-checkbox">
                        <input value="<?php echo e($value+1); ?>"
                               <?php if(in_array($value+1,$preval['persyaratanAdministrasi']??[])): ?>
                               checked
                               <?php endif; ?>
                               name="persyaratanAdministrasi[]" type="checkbox" class="custom-control-input
                               <?php if(isset($preval['persyaratanAdministrasi']) && isset($formerror['persyaratanAdministrasi[]'])): ?>
                        <?php if(! in_array($value+1,$preval['persyaratanAdministrasi'])): ?>
                                is-invalid
                                <?php endif; ?>
                        <?php endif; ?>
                                " id="<?php echo e($cid); ?>">
                        <label class="custom-control-label" for="<?php echo e($cid); ?>"><?php echo e($text); ?></label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($proposal['is_revisi']): ?>
                    <table class="table mt-3 w-100 table-borderless">
                        <tr><th class="p-0">Catatan revisi</th>
                        </tr>
                        <tr>
                            <td> <?php echo e($proposal['revisi_note']); ?></td>
                        </tr>
                    </table>
                <?php endif; ?>
            </div>
            <div class="col-6 mt-2">
                <h3 class="h3-responsive">Pengecekan dokumen</h3>
                <hr>
                <?php if(isset($formerror['pengecekanDokumen[]'])): ?>
                    <p class="text-danger"><?php echo e($formerror['pengecekanDokumen[]']); ?></p>
                <?php endif; ?>
                <?php $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value=>$option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $cid = uniqid() ?>
                    <div class="custom-control custom-checkbox">
                        <input
                                <?php if(in_array($value+1,$preval['pengecekanDokumen']??[])): ?> checked <?php endif; ?>
                        value="<?php echo e($value+1); ?>"
                                name="pengecekanDokumen[]" type="checkbox"
                                class="custom-control-input
                               <?php if(isset($preval['pengecekanDokumen']) && isset($formerror['pengecekanDokumen[]'])): ?> <?php if(! in_array($value+1,$preval['pengecekanDokumen'])): ?>
                                        is-invalid <?php endif; ?> <?php endif; ?>"
                                id="<?php echo e($cid); ?>">
                        <label class="custom-control-label" for="<?php echo e($cid); ?>"><?php echo e($option); ?></label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <span>Kategori : </span>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio"
                           <?php if(isset($preval['kategoriPemeriksaanSKPD'])): ?>
                           <?php if($preval['kategoriPemeriksaanSKPD'] == 1): ?>
                           checked
                           <?php endif; ?>
                           <?php endif; ?>
                           class="custom-control-input"
                           value="1" id="defaultInline1"
                           name="kategoriPemeriksaanSKPD">
                    <label class="custom-control-label" for="defaultInline1">Hibah</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                            <?php if(isset($preval['kategoriPemeriksaanSKPD'])): ?>
                            <?php if($preval['kategoriPemeriksaanSKPD'] == 2): ?>
                            checked
                            <?php endif; ?>
                            <?php endif; ?>
                            type="radio" class="custom-control-input" value="2" id="defaultInline2" name="kategoriPemeriksaanSKPD">
                    <label class="custom-control-label" for="defaultInline2">Bantuan sosial</label>
                </div>
                <small class="d-block <?php echo e(isset($formerror['kategoriPemeriksaanSKPD'])? "text-danger":''); ?>">Pilih salah satu</small>
                <h3 class="h3-responsive mt-2">Rekomendasi dana</h3>
                <hr>
                <div class="md-form input-group mb-3">
                    <input type="hidden" value="<?php echo e($proposal['dana']); ?>" name="dana-awal" id="dana-awal">
                    <div class="input-group-prepend">
                        <span class="input-group-text md-addon">Rp</span>
                    </div>
                    <input type="text" name="danaRekomendasiSKPD" id="rekomendasi-dana" max="<?php echo e($proposal['dana']); ?>" placeholder="<?php echo e(str_replace("Rp", "",rupiah($proposal['dana']))); ?> (dana diajukan)" class="form-control" aria-label="Biarkan kosong bila tidak memberikan rekomendasi dana">
                </div>
                <small id="rekomendasi-info-1" class="d-block">* Biarkan kosong bila tidak memberikan rekomendasi dana</small>
                <small id="rekomendasi-info-2" class="d-block <?php echo e(isset($formerror['danaRekomendasiSKPD'])? "text-danger":''); ?>">* Rekomendasi dana tidak boleh lebih besar dari yang diajukan</small>
            </div>
            <div class="col-12 mt-2">
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="<?php echo e(base_url('assets/js/pemeriksaan/skpd.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('operator.form.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/operator/form/skpd.blade.php ENDPATH**/ ?>