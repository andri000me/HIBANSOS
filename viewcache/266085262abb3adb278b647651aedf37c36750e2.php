<!DOCTYPE html>
<html lang="en"><head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title></title>
  <link href="<?php echo e(base_url('assets/')); ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo e(base_url('assets/')); ?>css/formulir-tapd.css" rel="stylesheet">
  <style>
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
  <header class="d-flex justify-content-end position-relative">
    <div id="tipe-kegiatan" class="border p-1">
      <?php if($proposal['kategoriPemeriksaanSKPD'] == 1): ?>
        Hibah
      <?php elseif($proposal['kategoriPemeriksaanSKPD'] == 2): ?>
        Bansos
      <?php else: ?>
        Belum di periksa
      <?php endif; ?>
    </div>
  </header>
  <div class="col-8 mx-auto">
    <div class="mx-auto" style="width: fit-content">
      <h1 class="text-uppercase text-center">rekomendasi</h1>
      <div class="text-justify">
        <p>
          PEMBERIAN BELANJA HIBAH DAN BELANJA BANTUAN SOSIAL YANG
        </p>
        <p>
          BERSUMBER DARI ANGGARAN PENDAPATAN DAN BELANJA DAERAH
        </p>
      </div>
    </div>
  </div>
  <hr>
  <p>
    Yang bertanda tangan di bawah ini, kami telah melakukan evaluasi Proposal yang disusulkan oleh Permohonan Belanja Hibah dan memberikan Rekomendasi sebagai berikut:
  </p>
  <table class="table table-borderless" style="width: fit-content">
    <tbody>
    <tr>
      <th>1</th><td>Nama kegiatan</td> <td>: <?php echo e($proposal['judulKegiatan']); ?></td>
    </tr>
    <tr>
      <th>2</th><td>NAMA ORGANISASI / KEPANITIAAN</td> <td>: <?php echo e($proposal['nama']); ?></td>
    </tr>
    <tr>
      <th>3</th><td>ALAMAT ORGANISASI / KEPANITIAAN</td><td>: <?php echo e($proposal['alamat']); ?></td>
    </tr>
    <tr>
      <th>4</th><td>TANGGAL PELAKSANAAN KEGIATAN</td><?php
        setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
                          $carbon = new \Carbon\Carbon($proposal['tglKegiatan']);
      ?>
      <td>: <?php echo e($carbon->formatLocalized('%A, %d  %B  %Y')); ?></td>
    </tr>
    <tr>
      <th>5</th><td>BESARNYA USULAN</td><td>: <?php echo e(rupiah((int)$proposal['dana'])); ?></td>
    </tr>
    <tr>
      <th>6</th><td>BESARNYA REKOMENDASI</td><td>: <?php echo e(rupiah((int)$proposal['danaEvaluasiTAPD'])); ?></td>
    </tr>
    <tr>
      <th>7</th><td>CATATAN</td> <td>: <?php echo e($tapd['keterangan']); ?></td>
    </tr>
    </tbody>
  </table>
  <p class="my-2 text-right">
    <?php
      $carbon = new \Carbon\Carbon();
            ?>
    Bogor, <?php echo e($carbon->formatLocalized('%A, %d  %B  %Y')); ?>

  </p>
  <table id="ttd" class="table table-bordered">
    <thead>
    <tr>
      <th>Jabatan</th>
      <th>NIP</th>
      <th>Tanda tangan :</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td><p>Kepala SKPD :</p></td> <td><p>_</p></td> <td><p>_</p></td>
    </tr>
    <tr>
      <td><p>Camat :</p></td> <td><p>_</p></td> <td><p>_</p></td>
    </tr>
    <tr>
      <td><p>Lurah :</p></td> <td><p>_</p></td> <td><p>_</p></td>
    </tr>
    </tbody>
  </table>
  <div class="col-4" style="white-space: nowrap;overflow: hidden;">
    <p>Telah dilakukan pembahasan</p>
    <p class="epipilips">Pada tanggal <?php for($i = 0; $i < 100; $i++): ?> <?php echo e("."); ?>

    <?php endfor; ?> </p>
  </div>
  <div class="col-4 mt-3">
    <p>Ketua Tim Pertimbangan Pemberian
      Belanja Hibah dan Belanja Bantuan Sosial</p>
  </div>
  <div class="col-4 mt-5" style="white-space: nowrap;overflow: hidden;">
    <p class="epipilips"><?php for($i = 0; $i < 100; $i++): ?> <?php echo e("."); ?>

      <?php endfor; ?> </p>
  </div>
</div>
<script>
  document.title = "Formulir-TAPD Nomor :<?php echo e($proposal['idHibahBansos']); ?>-0<?php echo e($proposal['kategoriPemeriksaanSKPD']); ?> <?php echo e($carbon->formatLocalized('%d/%m/%y')); ?>";
  window.print();
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ProgramFinal\application\views/operator/formulirtapd.blade.php ENDPATH**/ ?>