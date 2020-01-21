<?php $__env->startSection('monitoring2'); ?>
    <tr>
        <th>
            7
        </th>
        <td>
            Bukti Serah Terima Barang Berupa Berita Acara Serah Terima Barang
        </td>
        <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin7,'point'=>$poin7]); ?><?php echo $__env->renderComponent(); ?>
    </tr>
    <tr>
        <th rowspan="7">
            8
        </th>
        <td colspan="4">
            Laporan Penggunaan Hibah
        </td>
    </tr>
    <tr>
        <td>
            a. Satu Tahap Pencairan/Sekaligus
        </td>
        <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin8a,'point'=>$poin8a]); ?><?php echo $__env->renderComponent(); ?>
    </tr>
    <tr>
        <td>
            b. Beberapa Tahap Pencairan, dibagi :
        </td>
        <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin8b,'point'=>$poin8b]); ?><?php echo $__env->renderComponent(); ?>
    </tr>
    <tr>
        <td>
            Laporan Tahap I
        </td>
        <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin8b1,'point'=>$poin8b1]); ?><?php echo $__env->renderComponent(); ?>
    </tr>
    <tr>
        <td>
            Laporan Tahap II
        </td>
        <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin8b2,'point'=>$poin8b2]); ?><?php echo $__env->renderComponent(); ?>
    </tr>
    <tr>
        <td>
            Laporan Tahap III
        </td>
        <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin8b3,'point'=>$poin8b3]); ?><?php echo $__env->renderComponent(); ?>
    </tr>
    <tr>
        <td>
            Laporan Tahap IV
        </td>
        <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin8b4,'point'=>$poin8b4]); ?><?php echo $__env->renderComponent(); ?>
    </tr>
    <tr>
        <th>
            9
        </th>
        <td>
            Dokumentasi Hasil kegiatan
        </td>
        <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin9,'point'=>$poin9]); ?><?php echo $__env->renderComponent(); ?>
    </tr>
    <tr>
        <th>
            10
        </th>
        <td>
            Sisa Hibah/Bansos
        </td>
        <?php $__env->startComponent('public.monitoring.info',['progres'=>$progresPoin10,'point'=>$poin10]); ?><?php echo $__env->renderComponent(); ?>
    </tr>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.monitoring 1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/public/monitoring 2.blade.php ENDPATH**/ ?>