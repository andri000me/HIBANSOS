<!DOCTYPE html>
<html lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title></title>
    <link href="<?php echo e(base_url('assets/')); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(base_url('assets/')); ?>css/formulir-tapd.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <style>
        table:not(#info-umum) th{
            text-align: center!important;
        }
        #ttd td p{
            border-bottom: dotted 1px gray!important;
        }
        #ttd td:not(:first-child) p{
            color: transparent!important;
        }
        #ttd.table-bordered{
            border: black 1px solid!important;
        }
        #ttd td {
            padding: .5rem!important;
        }
        p{
            margin: 0!important;
        }
    </style>
    <style>
        .epipilips{
            text-overflow: ellipsis;
        }</style>
</head>

<body class="py-3">
<div class="container mt-2">
    <div class="col-8 mx-auto">
        <div class="mx-auto" style="width: fit-content">
            <h3 class="text-uppercase text-center">HASIL MONITORING TAHAP <?php echo e($m_tahap); ?> DAN EVALUASI</h3>
            <div class="text-justify">
                <p class="text-center">
                    Nomor : <?php echo e($nomor); ?>

                </p>
            </div>
        </div>
    </div>
    <hr>
    <div class="">
        <table id="info-umum" class="table table-borderless">
            <tbody>
            <?php $__currentLoopData = ['nama penerima'=>$namaPenerima,
            'alamat penerima'=>$alamatPenerima,
            'ketua/pimpinan'=>$ketua,
            'dana di terima'=>rupiah($danaDiterima)
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th =>$td): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th class="text-uppercase">
                        <?php echo e($th); ?>

                    </th>
                    <td>
                        : <?php echo e($td); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="vertical-align: middle" rowspan="2">No</th>
                <th style="text-align: center;vertical-align: middle" rowspan="2">Monitoring dan Evaluasi</th>
                <th style="text-align: center" rowspan="1" colspan="2">Hasil</th>
                <th style="vertical-align: middle" rowspan="2">Progress</th>
            </tr>
            <tr>
                <th class="text-center">
                    Ada/Sesuai
                </th>
                <th class="text-center">
                    Tidak ada/Tidak sesuai
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>1</th>
                <td>Proposal/Usulan Penerima Hibah/Bantuan Sosial</td>
                <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin1,'point'=>$poin1]); ?><?php echo $__env->renderComponent(); ?>
            </tr>
            <tr>
                <th>2</th>
                <td>Rekomendasi SKPD</td>
                <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin2,'point'=>$poin2]); ?><?php echo $__env->renderComponent(); ?>
            </tr>
            <tr>
                <th>3</th>
                <td>Keputusan Bupati Tentang Penetapan Daftar Penerima</td>
                <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin3,'point'=>$poin3]); ?><?php echo $__env->renderComponent(); ?>
            </tr>
            <tr>
                <th rowspan="3" style="vertical-align: top">4</th>
                <td colspan="4">Kesesuain NPHD</td>
            </tr>
            <tr>
                <td>a. Program Kegiatan</td>
                <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin4a,'point'=>$poin4a]); ?><?php echo $__env->renderComponent(); ?>
            </tr>
            <tr>
                <td>b. Besaran	</td>
                <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin4b,'point'=>$poin4b]); ?><?php echo $__env->renderComponent(); ?>
            </tr>
            <tr>
                <th>
                    5
                </th>
                <td>
                    Pakta Integritas
                </td>
                <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin5,'point'=>$poin5]); ?><?php echo $__env->renderComponent(); ?>
            </tr>
            <tr>
                <th>
                    6
                </th>
                <td>
                    Bukti Transfer Uang Pada Hibah/Bansos Berupa Uang
                </td>
                <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin6,'point'=>$poin6]); ?><?php echo $__env->renderComponent(); ?>
            </tr>
            <?php echo $__env->yieldContent('monitoring2'); ?>
            </tbody>
        </table>
        <div class="d-flex my-5 justify-content-end">
            <div class="w-20">
                <p>
                    ........................., ................................................................
                </p>
                <p class="text-center mb-5">
                    Kepala SKPD/Unit Kerja pada Sekertariat Kerja Daerah
                </p>
                <p class="mt-5 pt-5">
                    (........................................................................................)
                </p>
            </div>
        </div>
    </div>
</div>
<script>
    document.title = "MONITORING Nomor : <?php echo e($nomor); ?>-<?php echo e($m_tahap); ?>";
    window.print();
</script>
</body>
</html>
<?php  ?>
<?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/public/monitoring 1.blade.php ENDPATH**/ ?>