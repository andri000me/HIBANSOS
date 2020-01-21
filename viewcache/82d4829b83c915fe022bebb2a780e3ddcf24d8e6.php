<?php $i = 1 ?>
<?php $last_tolak = null; ?>
<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nama_operator => $pemeriksaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <?php 
 $class = "bg-success";
 $text = "Di setujui";
 $waktu = null;

 if( $i >= $proposal["tahapanProposal"]){
    $text = "Dalam proses";
     $class = "bg-light";
     }
 if($pemeriksaan === null && $proposal["tahapanProposal"] >= $i ){
    switch($nama_operator){
    case"tu":{
        if( ($arr["tu"] == null && $proposal["kategoriPemeriksaanTUSETDA"] == -1)){
            $text = "Dilanjutkan ke SETDA";
        }
        if($arr["setda"]!== null){
            $carbon = new \Carbon\Carbon($arr["setda"]['waktu']);
            $waktu = $carbon->formatLocalized('%A, %d  %B  %Y');     
        }
        break;
        }
        case"setda":{
            if($arr["tu"]!= null){
                $carbon = new \Carbon\Carbon($arr["tu"]['waktu']);
            $waktu = $carbon->formatLocalized('%A, %d  %B  %Y');     
            }
        }
 }
 }

if($pemeriksaan !== null){
    $carbon = new \Carbon\Carbon($pemeriksaan['waktu']);
    $waktu = $carbon->formatLocalized('%A, %d  %B  %Y');
    if($proposal["acc"] == 0){
        $last_tolak = $waktu;
    }
}

if($proposal["tahapanProposal"] <= $i && $proposal["acc"] == 0){
    $class = "bg-danger";
    $text = "Di tolak";
}
if ($proposal["is_revisi"] == "1" && $i == 3 && $pemeriksaan!== null){
     $text = "Revisi";
     $class = "bg-warning";
}

 ?>
    <tr class="<?php echo e($class); ?>">
    <td class="text-uppercase font-weight-bold"> 
    <?php echo e($nama_operator); ?>

    </td>
    <td colspan=<?php echo e(($last_tolak && $proposal["acc"] == 0 ) || $waktu ?1:2); ?>>
    <?php echo e($text); ?>

    </td>
    <?php if($last_tolak): ?>
    <td><?php echo e($last_tolak); ?></td>
    <?php endif; ?>
    <?php if($waktu && !$last_tolak): ?>
    <td><?php echo e($waktu); ?></td>
    <?php endif; ?>
    </tr>
    <?php $i++ ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/public/infopemeriksaan.blade.php ENDPATH**/ ?>