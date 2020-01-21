<div class="">
    <div class="mt-3">
        <button id="save" data-toggle="modal" data-target="#modal" class="btn btn-sm btn-main-2 mx-0">
            <i class="fas fa-plus-circle"></i>   Tambah peraturan
        </button>
        <table class="table">
            <?php $__currentLoopData = $konten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peraturan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="vertical-align: middle">
                    <th style="vertical-align: middle"><?php echo e($peraturan['judul']); ?></th>
                    <th class="text-center">
                        <div class="d-flex">
                            <div>
                                <form class="form-inline" action="<?php echo e(base_url('hapusPeraturan')); ?>" method="post">
                                    <button class="btn btn-danger  btn-sm">
                                        <i class="fas fa-minus"></i>
                                        Hapus
                                    </button>
                                    <input type="hidden" name="id" value="<?php echo e($peraturan['id']); ?>">
                                    <a target="_blank" role="button" href="<?php echo e(base_url('lihatPeraturan/'.$peraturan['id'])); ?>" class="btn bg-main2 btn-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                </form>
                            </div>
                        </div>
                    </th>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>
<div class="modal fade" data-backdrop="false" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-side  modal-bottom-right" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Tambah peraturan</h4></div>
            <div class="modal-body mx-3">
                <form action="<?php echo e(base_url('tambahPeraturan')); ?>" method="post" enctype="multipart/form-data">
                    <div class="input-group" >
                        <div class="custom-file" >
                            <input  required name="file" type="file" accept="application/pdf" class="custom-file-input" id="customFileLang" lang="in">
                            <label class="custom-file-label" for="customFileLang">File peraturan</label>
                        </div>
                    </div>
                    <div class="md-form ">
                        <input required placeholder="Contoh : peraturan pemerintah tahun xxxx" type="text" id="judul" name="judul" class="form-control validate">
                        <label for="judul">Judul peraturan</label>
                    </div>
                    <button class="btn btn-sm m-0 bg-main2">Upload <i class="fas fa-cloud-upload-alt"></i></button>

                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/imandidik/Desktop/cibe-deploy/hibansos/application/views/administrator/pengaturan/peraturan.blade.php ENDPATH**/ ?>