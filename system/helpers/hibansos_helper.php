<?php
if (!function_exists('kategori_hibansos')){

  function kategori_hibansos($index = null){
    $kategori_list =[
        'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah',
        'Dinas Lingkungan Hidup',
        'Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana',
        'Kantor Kesatuan Bangsa dan Politik','Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',
        'Dinas Pendidikan','Dinas Kesehatan','Dinas Pekerjaan Umum dan Penataan Ruang','Dinas Perhubungan',
        'Dinas Kependudukan dan Catatan Sipil','Dinas Sosial','Dinas Ketenagakerjaan','Dinas Koperasi dan Usaha Kecil Menengah',
        'Dinas Pemuda dan Olahraga','Dinas Kebudayaan dan Pariwisata','Dinas Komunikasi dan Informatika','Dinas Pertanian',
        'Otonomi Daerah dan Pemerintahan Umum','Perusahaan Daerah dan Perekonomian','Dinas Arsip dan Perpustakaan Daerah',
        'Dinas Pemadam Kebakaran','Badan Kepegawaian, Pendidikan dan Pelatihan',
        'Dinas Pengelola Keuangan dan Aset Daerah','Dinas Pemberdayaan Masyarakat Desa','Dinas Ketahanan Pangan','Badan Penanggulangan Bencana Daerah',
        'Satuan Polisi Pamong Praja','Badan Pengelolaan Pendapatan Daerah','Dinas Perikanan dan Peternakan','Dinas Perdagangan dan Perindustrian',
        'Dinas Tanaman Pangan, Hortikultura, dan Perkebunan',
        'Administrasi','Perekonomian dan Pembangunan', 'Pemerintahan dan Kesejahteraan Rakyat'
    ];
    return $index === null ? $kategori_list: $kategori_list[$index];
  }
}
if (!function_exists('tipe_operator')){

  function tipe_operator($index = null){
    $kategori_list =[
        '1'=>'administrator',
        '2'=>'tu',
        '3'=>'setda',
        '4'=>'skpd',
        '5'=>'tapd',
        '6'=>'bupati',
        '8'=>'auditor'
    ];
    return $index == null ? $kategori_list: $kategori_list[$index];
  }
}