-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2019 at 12:16 PM
-- Server version: 10.4.7-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hibansos_bansos`
--

-- --------------------------------------------------------

--
-- Table structure for table `hibahbansos`
--

CREATE TABLE `hibahbansos` (
  `idHibahBansos` int(11) NOT NULL,
  `idYangMengajukan` int(11) NOT NULL,
  `tglPengajuan` timestamp NOT NULL DEFAULT current_timestamp(),
  `tglKegiatan` date NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judulKegiatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latarBelakang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maksudTujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileProposal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dana` bigint(20) NOT NULL,
  `deskripsiDana` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danaRekomendasiSKPD` bigint(20) DEFAULT 0,
  `danaEvaluasiTAPD` bigint(20) DEFAULT 0,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahapanProposal` int(11) NOT NULL DEFAULT 1 COMMENT '1.TU 2. SETDA 3.SKPD 4.TAPD 5.BUPATI',
  `kategoriPemeriksaanTUSETDA` int(11) NOT NULL DEFAULT 0,
  `kategoriPemeriksaanSKPD` int(11) NOT NULL DEFAULT 0 COMMENT '1.Hibah 2.Bansos 0.belum',
  `acc` int(11) NOT NULL DEFAULT 2 COMMENT '1 ya 2 proses 0 tolak',
  `alasanPenolakan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progres` int(11) NOT NULL DEFAULT 0 COMMENT '1 sudah 0 belum',
  `lpj` int(11) NOT NULL DEFAULT 0 COMMENT '1 sudah 0 belum',
  `monitoring` int(11) NOT NULL DEFAULT 0 COMMENT '1  sudah 0 belum ',
  `monitoring2` int(11) NOT NULL DEFAULT 0 COMMENT '1  sudah 0 belum ',
  `is_revisi` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 tidak 1 menunggu revisi 2 periksa revisi',
  `revisi_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisi_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hibahbansos`
--

INSERT INTO `hibahbansos` (`idHibahBansos`, `idYangMengajukan`, `tglPengajuan`, `tglKegiatan`, `nama`, `alamat`, `judulKegiatan`, `latarBelakang`, `maksudTujuan`, `fileProposal`, `dana`, `deskripsiDana`, `danaRekomendasiSKPD`, `danaEvaluasiTAPD`, `foto`, `tahapanProposal`, `kategoriPemeriksaanTUSETDA`, `kategoriPemeriksaanSKPD`, `acc`, `alasanPenolakan`, `progres`, `lpj`, `monitoring`, `monitoring2`, `is_revisi`, `revisi_note`, `revisi_count`) VALUES
(4, 57, '2019-10-08 15:57:28', '2019-10-09', 'Dinas Pendidikan', 'Bogor', 'Bantuan Pemohonan Sekolah Swasta', 'Dalam rangka permohonan hibah kepada Pemerintah Kabupaten Lebak, dengan ini saya\r\nmenyatakan bahwa di dalam kepengurusan organisasi kami tidak terjadi konflik internal.\r\nDemikian surat pernyataan ini dibuat dengan sebenarnya tanpa adanya tekanan dari pihak\r\nmanapun, serta apabila dikemudian hari terbukti pernyataan saya tidak benar maka saya dituntut\r\ndimuka pengadilan dan dikenakan sanksi sesuai dengan peraturan perundang-undangan.', 'Dalam rangka permohonan hibah kepada Pemerintah Kabupaten Lebak, dengan ini saya\r\nmenyatakan bahwa di dalam kepengurusan organisasi kami tidak terjadi konflik internal.\r\nDemikian surat pernyataan ini dibuat dengan sebenarnya tanpa adanya tekanan dari pihak\r\nmanapun, serta apabila dikemudian hari terbukti pernyataan saya tidak benar maka saya dituntut\r\ndimuka pengadilan dan dikenakan sanksi sesuai dengan peraturan perundang-undangan.', 'assets/proposal/pdf/proposal_kegiatan_1.pdf', 10000000, 'Dana Bangunan', 8000000, 7000000, 'assets/proposal/foto/33.jpg', 6, 17, 2, 1, '', 1, 1, 1, 1, 0, '', 0),
(5, 57, '2019-10-08 17:03:16', '2019-10-31', 'Dinas Kesehatan', 'Bogor', 'Prorgam Bantuan Seminar Kesehatan', 'Sejak 1989, kementerian yang membidangi riset di perguruan tinggi dan\r\nlembaga penelitian lainnya telah menghibahkan dana penelitian melalui\r\nberbagai program yang bersifat kompetitif. Program hibah Bantuan\r\nSeminar Luar Negeri telah mengalami beberapa kali reformulasi sebagai\r\ntanggapan atas keinginan pemangku kepentingan (stakeholders) serta\r\nsekaligus tanggapan atas kemajuan ilmu pengetahuan, teknologi, seni,\r\ndan budaya.\r\nSalah satu kewajiban pegiat Iptek ialah mendiseminasikan hasil\r\nkaryanya melalui berkala ilmiah dan temu ilmiah. Jati diri pegiat iptek\r\nakan meningkat apabila hasil karyana disampaikan pada forum ilmiah\r\ninternasional yang bergengsi, yaitu melalui seminar dan publikasi\r\nilmiah pada jurnal ilmiah yang terindeks di pangkalan data\r\ninternasional bereputasi.', 'Sejak 1989, kementerian yang membidangi riset di perguruan tinggi dan\r\nlembaga penelitian lainnya telah menghibahkan dana penelitian melalui\r\nberbagai program yang bersifat kompetitif. Program hibah Bantuan\r\nSeminar Luar Negeri telah mengalami beberapa kali reformulasi sebagai\r\ntanggapan atas keinginan pemangku kepentingan (stakeholders) serta\r\nsekaligus tanggapan atas kemajuan ilmu pengetahuan, teknologi, seni,\r\ndan budaya.\r\nSalah satu kewajiban pegiat Iptek ialah mendiseminasikan hasil\r\nkaryanya melalui berkala ilmiah dan temu ilmiah. Jati diri pegiat iptek\r\nakan meningkat apabila hasil karyana disampaikan pada forum ilmiah\r\ninternasional yang bergengsi, yaitu melalui seminar dan publikasi\r\nilmiah pada jurnal ilmiah yang terindeks di pangkalan data\r\ninternasional bereputasi.', 'assets/proposal/pdf/proposal_kegiatan_2.pdf', 15000000, 'Dana Pengadaan Acara', 900000, 800000, 'assets/proposal/foto/images3.png', 6, 12, 1, 1, '', 1, 1, 1, 1, 0, '', 0),
(6, 57, '2019-10-08 17:48:05', '2019-10-22', 'Kelurahan Cibinong', 'Bogor', 'Bantuan Sosial untuk Rehabilitasi Sosial Rumah Tidak Layak Huni', 'Rumah memiliki fungsi yang sangat besar bagi individu dan keluarga\r\ntidak saja mencakup aspek fisik, tetapi juga mental dan sosial. Untuk\r\nmenunjang fungsi rumah sebagai tempat tinggal yang baik maka\r\nharus dipenuhi syarat fisik yaitu aman sebagai tempat berlindung,\r\nsecara mental memenuhi rasa kenyamanan dan secara sosial dapat\r\nmenjaga privasi setiap anggota keluarga, menjadi media bagi\r\npelaksanaan bimbingan serta pendidikan keluarga. Dengan\r\nterpenuhinya salah satu kebutuhan dasar berupa rumah yang layak\r\nhuni, diharapkan tercapai ketahanan keluarga.', 'Rumah memiliki fungsi yang sangat besar bagi individu dan keluarga\r\ntidak saja mencakup aspek fisik, tetapi juga mental dan sosial. Untuk\r\nmenunjang fungsi rumah sebagai tempat tinggal yang baik maka\r\nharus dipenuhi syarat fisik yaitu aman sebagai tempat berlindung,\r\nsecara mental memenuhi rasa kenyamanan dan secara sosial dapat\r\nmenjaga privasi setiap anggota keluarga, menjadi media bagi\r\npelaksanaan bimbingan serta pendidikan keluarga. Dengan\r\nterpenuhinya salah satu kebutuhan dasar berupa rumah yang layak\r\nhuni, diharapkan tercapai ketahanan keluarga.', 'assets/proposal/pdf/proposal_kegiatan_3.pdf', 20000000, 'Dana Pembangunan', 14000000, 0, 'assets/proposal/foto/inspektorat_kab_bogor-apip23.png', 4, 12, 1, 0, 'Dana tidak realistis.', 0, 0, 0, 0, 0, '', 0),
(13, 57, '2019-10-08 18:33:20', '2019-12-06', 'Satuan Polisi Pamong Praja', 'Bogor', 'Hibah Konstruksi Kantor SATPOL PP', 'Rumah memiliki fungsi yang sangat besar bagi individu dan keluarga\r\ntidak saja mencakup aspek fisik, tetapi juga mental dan sosial. Untuk\r\nmenunjang fungsi rumah sebagai tempat tinggal yang baik maka\r\nharus dipenuhi syarat fisik yaitu aman sebagai tempat berlindung,\r\nsecara mental memenuhi rasa kenyamanan dan secara sosial dapat\r\nmenjaga privasi setiap anggota keluarga, menjadi media bagi\r\npelaksanaan bimbingan serta pendidikan keluarga. Dengan\r\nterpenuhinya salah satu kebutuhan dasar berupa rumah yang layak\r\nhuni, diharapkan tercapai ketahanan keluarga.', 'Rumah memiliki fungsi yang sangat besar bagi individu dan keluarga\r\ntidak saja mencakup aspek fisik, tetapi juga mental dan sosial. Untuk\r\nmenunjang fungsi rumah sebagai tempat tinggal yang baik maka\r\nharus dipenuhi syarat fisik yaitu aman sebagai tempat berlindung,\r\nsecara mental memenuhi rasa kenyamanan dan secara sosial dapat\r\nmenjaga privasi setiap anggota keluarga, menjadi media bagi\r\npelaksanaan bimbingan serta pendidikan keluarga. Dengan\r\nterpenuhinya salah satu kebutuhan dasar berupa rumah yang layak\r\nhuni, diharapkan tercapai ketahanan keluarga.', 'assets/proposal/pdf/proposal_kegiatan_21.pdf', 16000000, 'Dana Konstruksi', 15000000, 0, 'assets/proposal/foto/images.jpg', 4, 18, 1, 0, 'Dana tidak realistis.', 0, 0, 0, 0, 0, '', 0),
(14, 57, '2019-10-08 18:34:51', '2019-11-01', 'Rio Sugandi', 'Bogor', 'Hibah Hama dan Pupuk Tanaman', 'Rumah memiliki fungsi yang sangat besar bagi individu dan keluarga\r\ntidak saja mencakup aspek fisik, tetapi juga mental dan sosial. Untuk\r\nmenunjang fungsi rumah sebagai tempat tinggal yang baik maka\r\nharus dipenuhi syarat fisik yaitu aman sebagai tempat berlindung,\r\nsecara mental memenuhi rasa kenyamanan dan secara sosial dapat\r\nmenjaga privasi setiap anggota keluarga, menjadi media bagi\r\npelaksanaan bimbingan serta pendidikan keluarga. Dengan\r\nterpenuhinya salah satu kebutuhan dasar berupa rumah yang layak\r\nhuni, diharapkan tercapai ketahanan keluarga.', 'Rumah memiliki fungsi yang sangat besar bagi individu dan keluarga\r\ntidak saja mencakup aspek fisik, tetapi juga mental dan sosial. Untuk\r\nmenunjang fungsi rumah sebagai tempat tinggal yang baik maka\r\nharus dipenuhi syarat fisik yaitu aman sebagai tempat berlindung,\r\nsecara mental memenuhi rasa kenyamanan dan secara sosial dapat\r\nmenjaga privasi setiap anggota keluarga, menjadi media bagi\r\npelaksanaan bimbingan serta pendidikan keluarga. Dengan\r\nterpenuhinya salah satu kebutuhan dasar berupa rumah yang layak\r\nhuni, diharapkan tercapai ketahanan keluarga.', 'assets/proposal/pdf/proposal_kegiatan_31.pdf', 5000000, 'Dana Produksi', 4000000, 4000000, 'assets/proposal/foto/IMG-20190812-WA0083-1.jpg', 6, 24, 1, 1, '', 1, 1, 1, 1, 0, '', 0),
(15, 57, '2019-10-08 15:57:28', '2019-10-09', 'Dinas Pendidikan', 'Bogor', 'Bantuan Pemohonan Sekolah Swasta', 'Dalam rangka permohonan hibah kepada Pemerintah Kabupaten Lebak, dengan ini saya\r\nmenyatakan bahwa di dalam kepengurusan organisasi kami tidak terjadi konflik internal.\r\nDemikian surat pernyataan ini dibuat dengan sebenarnya tanpa adanya tekanan dari pihak\r\nmanapun, serta apabila dikemudian hari terbukti pernyataan saya tidak benar maka saya dituntut\r\ndimuka pengadilan dan dikenakan sanksi sesuai dengan peraturan perundang-undangan.', 'Dalam rangka permohonan hibah kepada Pemerintah Kabupaten Lebak, dengan ini saya\r\nmenyatakan bahwa di dalam kepengurusan organisasi kami tidak terjadi konflik internal.\r\nDemikian surat pernyataan ini dibuat dengan sebenarnya tanpa adanya tekanan dari pihak\r\nmanapun, serta apabila dikemudian hari terbukti pernyataan saya tidak benar maka saya dituntut\r\ndimuka pengadilan dan dikenakan sanksi sesuai dengan peraturan perundang-undangan.', 'assets/proposal/pdf/proposal_kegiatan_1.pdf', 10000000, 'Dana Bangunan', 9000000, 6000000, 'assets/proposal/foto/33.jpg', 6, 6, 1, 1, '', 1, 1, 1, 1, 0, '', 0),
(16, 57, '2019-10-08 17:03:16', '2019-10-31', 'Dinas Kesehatan', 'Bogor', 'Prorgam Bantuan Seminar Kesehatan', 'Sejak 1989, kementerian yang membidangi riset di perguruan tinggi dan\r\nlembaga penelitian lainnya telah menghibahkan dana penelitian melalui\r\nberbagai program yang bersifat kompetitif. Program hibah Bantuan\r\nSeminar Luar Negeri telah mengalami beberapa kali reformulasi sebagai\r\ntanggapan atas keinginan pemangku kepentingan (stakeholders) serta\r\nsekaligus tanggapan atas kemajuan ilmu pengetahuan, teknologi, seni,\r\ndan budaya.\r\nSalah satu kewajiban pegiat Iptek ialah mendiseminasikan hasil\r\nkaryanya melalui berkala ilmiah dan temu ilmiah. Jati diri pegiat iptek\r\nakan meningkat apabila hasil karyana disampaikan pada forum ilmiah\r\ninternasional yang bergengsi, yaitu melalui seminar dan publikasi\r\nilmiah pada jurnal ilmiah yang terindeks di pangkalan data\r\ninternasional bereputasi.', 'Sejak 1989, kementerian yang membidangi riset di perguruan tinggi dan\r\nlembaga penelitian lainnya telah menghibahkan dana penelitian melalui\r\nberbagai program yang bersifat kompetitif. Program hibah Bantuan\r\nSeminar Luar Negeri telah mengalami beberapa kali reformulasi sebagai\r\ntanggapan atas keinginan pemangku kepentingan (stakeholders) serta\r\nsekaligus tanggapan atas kemajuan ilmu pengetahuan, teknologi, seni,\r\ndan budaya.\r\nSalah satu kewajiban pegiat Iptek ialah mendiseminasikan hasil\r\nkaryanya melalui berkala ilmiah dan temu ilmiah. Jati diri pegiat iptek\r\nakan meningkat apabila hasil karyana disampaikan pada forum ilmiah\r\ninternasional yang bergengsi, yaitu melalui seminar dan publikasi\r\nilmiah pada jurnal ilmiah yang terindeks di pangkalan data\r\ninternasional bereputasi.', 'assets/proposal/pdf/proposal_kegiatan_2.pdf', 15000000, 'Dana Pengadaan Acara', 15000000, 13000000, 'assets/proposal/foto/images3.png', 6, 7, 2, 1, '', 1, 1, 1, 1, 0, '', 0),
(17, 57, '2019-10-08 17:48:05', '2019-10-22', 'Kelurahan Cibinong', 'Bogor', 'Bantuan Sosial untuk Rehabilitasi Sosial Rumah Tidak Layak Huni', 'Rumah memiliki fungsi yang sangat besar bagi individu dan keluarga\r\ntidak saja mencakup aspek fisik, tetapi juga mental dan sosial. Untuk\r\nmenunjang fungsi rumah sebagai tempat tinggal yang baik maka\r\nharus dipenuhi syarat fisik yaitu aman sebagai tempat berlindung,\r\nsecara mental memenuhi rasa kenyamanan dan secara sosial dapat\r\nmenjaga privasi setiap anggota keluarga, menjadi media bagi\r\npelaksanaan bimbingan serta pendidikan keluarga. Dengan\r\nterpenuhinya salah satu kebutuhan dasar berupa rumah yang layak\r\nhuni, diharapkan tercapai ketahanan keluarga.', 'Rumah memiliki fungsi yang sangat besar bagi individu dan keluarga\r\ntidak saja mencakup aspek fisik, tetapi juga mental dan sosial. Untuk\r\nmenunjang fungsi rumah sebagai tempat tinggal yang baik maka\r\nharus dipenuhi syarat fisik yaitu aman sebagai tempat berlindung,\r\nsecara mental memenuhi rasa kenyamanan dan secara sosial dapat\r\nmenjaga privasi setiap anggota keluarga, menjadi media bagi\r\npelaksanaan bimbingan serta pendidikan keluarga. Dengan\r\nterpenuhinya salah satu kebutuhan dasar berupa rumah yang layak\r\nhuni, diharapkan tercapai ketahanan keluarga.', 'assets/proposal/pdf/proposal_kegiatan_3.pdf', 20000000, 'Dana Pembangunan', 16000000, 10000000, 'assets/proposal/foto/inspektorat_kab_bogor-apip23.png', 6, 8, 2, 1, '', 1, 1, 1, 1, 0, '', 0),
(18, 57, '2019-10-08 18:33:20', '2019-12-06', 'Satuan Polisi Pamong Praja', 'Bogor', 'Hibah Konstruksi Kantor SATPOL PP', 'Rumah memiliki fungsi yang sangat besar bagi individu dan keluarga\r\ntidak saja mencakup aspek fisik, tetapi juga mental dan sosial. Untuk\r\nmenunjang fungsi rumah sebagai tempat tinggal yang baik maka\r\nharus dipenuhi syarat fisik yaitu aman sebagai tempat berlindung,\r\nsecara mental memenuhi rasa kenyamanan dan secara sosial dapat\r\nmenjaga privasi setiap anggota keluarga, menjadi media bagi\r\npelaksanaan bimbingan serta pendidikan keluarga. Dengan\r\nterpenuhinya salah satu kebutuhan dasar berupa rumah yang layak\r\nhuni, diharapkan tercapai ketahanan keluarga.', 'Rumah memiliki fungsi yang sangat besar bagi individu dan keluarga\r\ntidak saja mencakup aspek fisik, tetapi juga mental dan sosial. Untuk\r\nmenunjang fungsi rumah sebagai tempat tinggal yang baik maka\r\nharus dipenuhi syarat fisik yaitu aman sebagai tempat berlindung,\r\nsecara mental memenuhi rasa kenyamanan dan secara sosial dapat\r\nmenjaga privasi setiap anggota keluarga, menjadi media bagi\r\npelaksanaan bimbingan serta pendidikan keluarga. Dengan\r\nterpenuhinya salah satu kebutuhan dasar berupa rumah yang layak\r\nhuni, diharapkan tercapai ketahanan keluarga.', 'assets/proposal/pdf/proposal_kegiatan_21.pdf', 16000000, 'Dana Konstruksi', 15000000, 12000000, 'assets/proposal/foto/images.jpg', 6, 34, 1, 1, '', 1, 1, 1, 1, 0, '', 0),
(19, 57, '2019-10-08 18:34:51', '2019-11-01', 'Rio Sugandi', 'Bogor', 'Hibah Hama dan Pupuk Tanaman', 'Rumah memiliki fungsi yang sangat besar bagi individu dan keluarga\r\ntidak saja mencakup aspek fisik, tetapi juga mental dan sosial. Untuk\r\nmenunjang fungsi rumah sebagai tempat tinggal yang baik maka\r\nharus dipenuhi syarat fisik yaitu aman sebagai tempat berlindung,\r\nsecara mental memenuhi rasa kenyamanan dan secara sosial dapat\r\nmenjaga privasi setiap anggota keluarga, menjadi media bagi\r\npelaksanaan bimbingan serta pendidikan keluarga. Dengan\r\nterpenuhinya salah satu kebutuhan dasar berupa rumah yang layak\r\nhuni, diharapkan tercapai ketahanan keluarga.', 'Rumah memiliki fungsi yang sangat besar bagi individu dan keluarga\r\ntidak saja mencakup aspek fisik, tetapi juga mental dan sosial. Untuk\r\nmenunjang fungsi rumah sebagai tempat tinggal yang baik maka\r\nharus dipenuhi syarat fisik yaitu aman sebagai tempat berlindung,\r\nsecara mental memenuhi rasa kenyamanan dan secara sosial dapat\r\nmenjaga privasi setiap anggota keluarga, menjadi media bagi\r\npelaksanaan bimbingan serta pendidikan keluarga. Dengan\r\nterpenuhinya salah satu kebutuhan dasar berupa rumah yang layak\r\nhuni, diharapkan tercapai ketahanan keluarga.', 'assets/proposal/pdf/proposal_kegiatan_31.pdf', 5000000, 'Dana Produksi', 4000000, 2000000, 'assets/proposal/foto/IMG-20190812-WA0083-1.jpg', 6, 31, 1, 1, '', 1, 1, 1, 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id` int(11) NOT NULL,
  `halaman` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` int(11) NOT NULL COMMENT '1.text 2.file 3.gambar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `halaman`, `judul`, `konten`, `tipe`) VALUES
(1, 'peraturan', 'PERATURAN BUPATI BOGOR', 'assets/peraturan/Peraturan_Bupati_Bogor.pdf', 2),
(2, 'peraturan', 'PERATURAN KEMENTRIAN DALAM NEGRI ', 'assets/peraturan/Peraturan_Mentri_Dalam_Negri_HibahBantuanDaerah.pdf', 2),
(3, 'tentang', '', '{\"ops\":[{\"insert\":\"Te\\n\"}]}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `idUser` int(11) NOT NULL,
  `pengguna` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`idUser`, `pengguna`, `kegiatan`, `waktu`) VALUES
(50, 'Khrisna Widhi', 'tambah operator : Operator tu telah di tambahkan', '2019-09-15 04:31:13'),
(50, 'Khrisna Widhi', 'tambah operator : Operator setda telah di tambahkan', '2019-09-15 04:34:12'),
(50, 'Khrisna Widhi', 'tambah operator : Operator skpd telah di tambahkan', '2019-09-15 04:36:48'),
(50, 'Khrisna Widhi', 'tambah operator : Operator tapd telah di tambahkan', '2019-09-15 04:43:16'),
(50, 'Khrisna Widhi', 'tambah operator : Operator bupati telah di tambahkan', '2019-09-15 04:52:42'),
(50, 'Khrisna Widhi', 'tambah operator : Operator auditor telah di tambahkan', '2019-09-15 04:54:02'),
(50, 'Khrisna Widhi', 'verifikasi pengguna : User Khrisna Widhi dengan id 57 diverifikasi ole', '2019-09-15 04:55:49'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal Perbaikan jalan', '2019-09-15 05:02:11'),
(57, 'Khrisna Widhi', 'Edit proposal : Proposal dengan id 1 di edit', '2019-09-15 05:02:49'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 1 di setujui dengan kategori 13 dan dilanjut', '2019-09-15 05:07:42'),
(51, 'Operator TU', 'Penolakan TU : Menolak Proposal dengan id 1 pada Tahap 1', '2019-09-15 05:08:19'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 1 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-15 05:08:54'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 1 di setujui dengan kategori 1 dan dilanjutk', '2019-09-15 05:10:16'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 1 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-15 05:10:29'),
(51, 'Operator TU', 'Penolakan TU : Menolak Proposal dengan id 1 pada Tahap 1', '2019-09-15 05:11:02'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 1 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-15 05:11:07'),
(52, 'Operator TU SETDA', 'Persetujuan Setda : Menyetujui Proposal 1 Tahap 2', '2019-09-15 05:11:39'),
(52, 'Operator TU SETDA', 'Penolakan SETDA : Menolak Proposal Tahap 2', '2019-09-15 05:11:59'),
(52, 'Operator TU SETDA', 'Persetujuan Setda : Menyetujui Proposal 1 Tahap 2', '2019-09-15 05:12:21'),
(53, 'Operator SKPD', 'Pemeriksaan SKPD : Menyetujui Proposal 1 Tahap 3', '2019-09-15 05:13:19'),
(53, 'Operator SKPD', 'Penolakan SKPD : Menolak Proposal Tahap 3', '2019-09-15 05:13:34'),
(53, 'Operator SKPD', 'Pemeriksaan SKPD : Menyetujui Proposal 1 Tahap 3', '2019-09-15 05:15:34'),
(53, 'Operator SKPD', 'Penolakan SKPD : Menolak Proposal Tahap 3', '2019-09-15 05:15:47'),
(53, 'Operator SKPD', 'Revisi proposal : Merevisi Proposal Tahap 3', '2019-09-15 05:16:01'),
(57, 'Khrisna Widhi', 'Upload revisi : Mengupload Revisi Proposal 1', '2019-09-15 05:16:41'),
(53, 'Operator SKPD', 'Pemeriksaan SKPD : Menyetujui Proposal 1 Tahap 3', '2019-09-15 05:18:03'),
(54, 'Operator TAPD', 'Penolakan TAPD : Menolak Proposal Tahap 4', '2019-09-15 05:19:03'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 1 Tahap 4', '2019-09-15 05:19:29'),
(54, 'Operator TAPD', 'Penolakan TAPD : Menolak Proposal Tahap 4', '2019-09-15 05:20:43'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 1 Tahap 4', '2019-09-15 05:21:14'),
(55, 'Operator Bupati', 'Penolakan bupati : Menolak Proposal Tahap 5', '2019-09-15 05:22:46'),
(55, 'Operator Bupati', 'Pemeriksaan Bupati : Menyetujui Proposal 1 Tahap 5', '2019-09-15 05:24:25'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 1', '2019-09-15 05:25:30'),
(56, 'Auditor', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id1', '2019-09-15 05:26:56'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal tes', '2019-09-15 06:48:28'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 2 di setujui dengan kategori 1 dan dilanjutk', '2019-09-15 06:49:04'),
(51, 'Operator TU', 'Penolakan TU : Menolak Proposal dengan id 2 pada Tahap 1', '2019-09-15 06:49:28'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 2 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-15 06:51:16'),
(51, 'Operator TU', 'Penolakan TU : Menolak Proposal dengan id 2 pada Tahap 1', '2019-09-15 06:54:34'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 2 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-15 06:54:51'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 2 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-15 07:01:50'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 2 di setujui dengan kategori 1 dan dilanjutk', '2019-09-15 07:07:27'),
(51, 'Operator TU', 'Penolakan TU : Menolak Proposal dengan id 2 pada Tahap 1', '2019-09-15 07:07:48'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 2 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-15 07:08:05'),
(52, 'Operator TU SETDA', 'Persetujuan Setda : Menyetujui Proposal 2 Tahap 2', '2019-09-15 07:09:02'),
(52, 'Operator TU SETDA', 'Penolakan SETDA : Menolak Proposal Tahap 2', '2019-09-15 07:09:23'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 2 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-15 07:16:57'),
(50, 'Khrisna Widhi', 'Persetujuan Setda : Menyetujui Proposal 2 Tahap 2', '2019-09-15 07:17:04'),
(50, 'Khrisna Widhi', 'Persetujuan Setda : Menyetujui Proposal 2 Tahap 2', '2019-09-15 07:17:04'),
(50, 'Khrisna Widhi', 'Penolakan SETDA : Menolak Proposal Tahap 2', '2019-09-15 07:17:26'),
(50, 'Khrisna Widhi', 'Persetujuan Setda : Menyetujui Proposal 2 Tahap 2', '2019-09-15 07:17:45'),
(53, 'Operator SKPD', 'Pemeriksaan SKPD : Menyetujui Proposal 2 Tahap 3', '2019-09-15 07:18:40'),
(53, 'Operator SKPD', 'Penolakan SKPD : Menolak Proposal Tahap 3', '2019-09-15 07:19:09'),
(53, 'Operator SKPD', 'Pemeriksaan SKPD : Menyetujui Proposal 2 Tahap 3', '2019-09-15 07:20:22'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 2 Tahap 4', '2019-09-15 07:22:02'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 2 Tahap 4', '2019-09-15 07:26:38'),
(54, 'Operator TAPD', 'Penolakan TAPD : Menolak Proposal Tahap 4', '2019-09-15 07:31:28'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 2 Tahap 4', '2019-09-15 07:31:47'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 2 Tahap 4', '2019-09-15 07:32:47'),
(54, 'Operator TAPD', 'Penolakan TAPD : Menolak Proposal Tahap 4', '2019-09-15 07:33:21'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 2 Tahap 4', '2019-09-15 07:35:21'),
(55, 'Operator Bupati', 'Penolakan bupati : Menolak Proposal Tahap 5', '2019-09-15 07:37:06'),
(55, 'Operator Bupati', 'Pemeriksaan Bupati : Menyetujui Proposal 2 Tahap 5', '2019-09-15 07:37:24'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal C', '2019-09-15 18:22:18'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 3 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-16 14:56:37'),
(52, 'Operator TU SETDA', 'Persetujuan Setda : Menyetujui Proposal 3 Tahap 2', '2019-09-16 14:57:19'),
(53, 'Operator SKPD', 'Pemeriksaan SKPD : Menyetujui Proposal 3 Tahap 3', '2019-09-16 14:57:59'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 3 Tahap 4', '2019-09-16 14:59:48'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 3 Tahap 4', '2019-09-16 15:00:21'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 3 Tahap 4', '2019-09-16 15:00:43'),
(55, 'Operator Bupati', 'Pemeriksaan Bupati : Menyetujui Proposal 3 Tahap 5', '2019-09-16 15:02:26'),
(55, 'Operator Bupati', 'Penolakan bupati : Menolak Proposal Tahap 5', '2019-09-16 15:02:43'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal jhk', '2019-09-17 10:06:44'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 4 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-17 10:07:08'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 4 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-17 10:37:03'),
(50, 'Khrisna Widhi', 'Persetujuan Setda : Menyetujui Proposal 4 Tahap 2', '2019-09-17 10:48:32'),
(50, 'Khrisna Widhi', 'Revisi proposal : Merevisi Proposal Tahap 3', '2019-09-17 10:48:42'),
(50, 'Khrisna Widhi', 'Penolakan SKPD : Menolak Proposal Tahap 3', '2019-09-17 10:57:11'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 4 Tahap 3', '2019-09-17 11:03:49'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal mm', '2019-09-17 11:20:24'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 5 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-17 11:21:14'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 5 di setujui dengan kategori 2 dan dilanjutk', '2019-09-17 11:21:37'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 5 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-17 11:23:21'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 5 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-17 11:23:40'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 5 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-17 11:23:51'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 5 di setujui dengan kategori 26 dan dilanjut', '2019-09-17 11:23:58'),
(50, 'Khrisna Widhi', 'Penolakan SKPD : Menolak Proposal Tahap 3', '2019-09-17 11:24:30'),
(50, 'Khrisna Widhi', 'Revisi proposal : Merevisi Proposal Tahap 3', '2019-09-17 11:25:26'),
(57, 'Khrisna Widhi', 'Upload revisi : Mengupload Revisi Proposal 5', '2019-09-17 11:49:28'),
(50, 'Khrisna Widhi', 'Penolakan SKPD : Menolak Proposal Tahap 3', '2019-09-17 11:55:09'),
(50, 'Khrisna Widhi', 'Revisi proposal : Merevisi Proposal Tahap 3', '2019-09-17 12:09:13'),
(57, 'Khrisna Widhi', 'Upload revisi : Mengupload Revisi Proposal 5', '2019-09-17 12:13:25'),
(50, 'Khrisna Widhi', 'Penolakan SKPD : Menolak Proposal Tahap 3', '2019-09-17 12:15:36'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 5 Tahap 3', '2019-09-17 12:17:19'),
(50, 'Khrisna Widhi', 'Penolakan SKPD : Menolak Proposal Tahap 3', '2019-09-17 12:29:50'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 5 Tahap 3', '2019-09-17 12:30:28'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 5 Tahap 4', '2019-09-17 12:32:08'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 5 Tahap 4', '2019-09-17 12:32:09'),
(50, 'Khrisna Widhi', 'Pemeriksaan Bupati : Menyetujui Proposal 5 Tahap 5', '2019-09-17 12:38:59'),
(50, 'Khrisna Widhi', 'Penolakan bupati : Menolak Proposal Tahap 5', '2019-09-17 12:39:20'),
(50, 'Khrisna Widhi', 'Penolakan bupati : Menolak Proposal Tahap 5', '2019-09-17 12:41:45'),
(50, 'Khrisna Widhi', 'Pemeriksaan Bupati : Menyetujui Proposal 5 Tahap 5', '2019-09-17 12:42:51'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 5', '2019-09-17 12:43:27'),
(50, 'Khrisna Widhi', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id5', '2019-09-17 12:52:14'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal bn', '2019-09-17 13:34:54'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 6 di setujui dengan kategori 21 dan dilanjut', '2019-09-17 13:35:22'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 6 di setujui dengan kategori 20 dan dilanjut', '2019-09-17 13:35:59'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 6 di setujui dengan kategori 9 dan dilanjutk', '2019-09-17 13:36:12'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 6 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-17 13:36:26'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 6 di setujui dengan kategori 3 dan dilanjutk', '2019-09-17 13:36:43'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 6 Tahap 3', '2019-09-17 13:37:25'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 6 Tahap 4', '2019-09-17 13:38:03'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 6 Tahap 4', '2019-09-17 13:38:16'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 6 Tahap 4', '2019-09-17 13:40:03'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 6 Tahap 4', '2019-09-17 13:40:34'),
(50, 'Khrisna Widhi', 'Penolakan bupati : Menolak Proposal Tahap 5', '2019-09-17 13:41:13'),
(50, 'Khrisna Widhi', 'Pemeriksaan Bupati : Menyetujui Proposal 6 Tahap 5', '2019-09-17 13:43:32'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 6', '2019-09-17 13:44:07'),
(50, 'Khrisna Widhi', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id6', '2019-09-17 13:58:23'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 6', '2019-09-17 14:05:47'),
(50, 'Khrisna Widhi', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id6', '2019-09-17 14:07:39'),
(57, 'Khrisna Widhi', 'Upload lpj : Menambahkan LPJ dengan id: 6', '2019-09-17 14:18:45'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal xx', '2019-09-18 16:29:33'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 7 di setujui dengan kategori 27 dan dilanjut', '2019-09-18 16:33:49'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 7 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-18 16:34:37'),
(51, 'Operator TU', 'Penolakan TU : Menolak Proposal dengan id 7 pada Tahap 1', '2019-09-18 16:36:12'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 7 di setujui dengan kategori 10 dan dilanjut', '2019-09-18 16:36:37'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 7 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-18 16:37:16'),
(52, 'Operator TU SETDA', 'Penolakan SETDA : Menolak Proposal Tahap 2', '2019-09-18 16:37:50'),
(52, 'Operator TU SETDA', 'Persetujuan Setda : Menyetujui Proposal 7 Tahap 2', '2019-09-18 16:38:17'),
(53, 'Operator SKPD', 'Penolakan SKPD : Menolak Proposal Tahap 3', '2019-09-18 16:51:25'),
(53, 'Operator SKPD', 'Revisi proposal : Merevisi Proposal Tahap 3', '2019-09-18 16:51:51'),
(53, 'Operator SKPD', 'Pemeriksaan SKPD : Menyetujui Proposal 7 Tahap 3', '2019-09-18 16:52:42'),
(50, 'Khrisna Widhi', 'Revisi proposal : Merevisi Proposal Tahap 3', '2019-09-18 16:57:38'),
(57, 'Khrisna Widhi', 'Upload revisi : Mengupload Revisi Proposal 7', '2019-09-18 18:50:50'),
(53, 'Operator SKPD', 'Penolakan SKPD : Menolak Proposal Tahap 3', '2019-09-18 18:52:54'),
(53, 'Operator SKPD', 'Pemeriksaan SKPD : Menyetujui Proposal 7 Tahap 3', '2019-09-18 18:53:22'),
(53, 'Operator SKPD', 'Penolakan SKPD : Menolak Proposal Tahap 3', '2019-09-18 18:55:02'),
(53, 'Operator SKPD', 'Pemeriksaan SKPD : Menyetujui Proposal 7 Tahap 3', '2019-09-18 18:55:42'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 7 Tahap 4', '2019-09-18 18:57:23'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 7 Tahap 4', '2019-09-18 18:58:00'),
(55, 'Operator Bupati', 'Pemeriksaan Bupati : Menyetujui Proposal 7 Tahap 5', '2019-09-18 18:58:28'),
(55, 'Operator Bupati', 'Penolakan bupati : Menolak Proposal Tahap 5', '2019-09-18 18:58:42'),
(55, 'Operator Bupati', 'Pemeriksaan Bupati : Menyetujui Proposal 7 Tahap 5', '2019-09-18 18:59:00'),
(55, 'Operator Bupati', 'Penolakan bupati : Menolak Proposal Tahap 5', '2019-09-18 18:59:30'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal asd', '2019-09-23 04:28:10'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 8 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-23 04:29:59'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 8 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-23 04:30:24'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 8 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-23 04:30:46'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 8 di setujui dengan kategori 3 dan dilanjutk', '2019-09-23 04:31:05'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 8 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-23 04:31:23'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal a', '2019-09-24 13:47:39'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 1 di setujui dengan kategori 1 dan dilanjutk', '2019-09-24 13:47:54'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 1 Tahap 3', '2019-09-24 13:48:08'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 1 Tahap 4', '2019-09-24 13:48:15'),
(50, 'Khrisna Widhi', 'Pemeriksaan Bupati : Menyetujui Proposal 1 Tahap 5', '2019-09-24 13:48:19'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 1', '2019-09-24 13:49:06'),
(56, 'Auditor', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id1', '2019-09-24 13:50:01'),
(57, 'Khrisna Widhi', 'Upload lpj : Menambahkan LPJ dengan id: 1', '2019-09-24 13:50:38'),
(56, 'Auditor', 'Monitoring 2 : Menambah Monitoring Tahap 2 untuk proposal id1', '2019-09-25 06:41:38'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal TestHari', '2019-09-27 10:06:29'),
(51, 'Operator TU', 'Persetujuan TU : Proposal 2 di setujui dengan kategori 20 dan dilanjut', '2019-09-27 10:07:34'),
(53, 'Operator SKPD', 'Revisi proposal : Merevisi Proposal Tahap 3', '2019-09-27 10:09:18'),
(57, 'Khrisna Widhi', 'Upload revisi : Mengupload Revisi Proposal 2', '2019-09-27 10:10:32'),
(53, 'Operator SKPD', 'Pemeriksaan SKPD : Menyetujui Proposal 2 Tahap 3', '2019-09-27 10:11:52'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 2 Tahap 4', '2019-09-27 10:13:01'),
(55, 'Operator Bupati', 'Pemeriksaan Bupati : Menyetujui Proposal 2 Tahap 5', '2019-09-27 10:14:28'),
(55, 'Operator Bupati', 'Pemeriksaan Bupati : Menyetujui Proposal 2 Tahap 5', '2019-09-27 10:14:38'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 2', '2019-09-27 10:17:47'),
(56, 'Auditor', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id2', '2019-09-27 10:19:02'),
(57, 'Khrisna Widhi', 'Upload lpj : Menambahkan LPJ dengan id: 2', '2019-09-27 10:20:02'),
(56, 'Auditor', 'Monitoring 2 : Menambah Monitoring Tahap 2 untuk proposal id2', '2019-09-27 10:22:14'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal Test2', '2019-09-27 10:25:23'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 3 dilanjutkan ke asisten/setda dan dilanjutk', '2019-09-27 10:28:32'),
(50, 'Khrisna Widhi', 'Persetujuan Setda : Menyetujui Proposal 3 Tahap 2', '2019-09-27 10:28:37'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 3 Tahap 3', '2019-09-27 10:28:53'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 3 Tahap 4', '2019-09-27 10:28:59'),
(50, 'Khrisna Widhi', 'Penolakan bupati : Menolak Proposal Tahap 5', '2019-09-27 10:29:06'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal Bantuan Pemohonan Sekolah Swasta', '2019-10-08 15:57:28'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal Prorgam Bantuan Seminar Kesehatan', '2019-10-08 17:03:16'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal Bantuan Sosial untuk Rehabilitasi ', '2019-10-08 17:48:05'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal Hibah Konstruksi Kantor SATPOL PP', '2019-10-08 18:33:20'),
(57, 'Khrisna Widhi', 'Tambah proposal : Menambah Proposal Hibah Hama dan Pupuk Tanaman', '2019-10-08 18:34:51'),
(50, 'Khrisna Widhi', 'Tambah peraturan : Menambah peraturan baru dengan judul PERATURAN BUPA', '2019-10-08 18:41:41'),
(50, 'Khrisna Widhi', 'Tambah peraturan : Menambah peraturan baru dengan judul PERATURAN KEME', '2019-10-08 18:42:26'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 19 di setujui dengan kategori 31 dan dilanju', '2019-10-09 04:05:33'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 18 dilanjutkan ke asisten/setda dan dilanjut', '2019-10-09 04:05:38'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 17 di setujui dengan kategori 8 dan dilanjut', '2019-10-09 04:06:15'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 16 di setujui dengan kategori 7 dan dilanjut', '2019-10-09 04:06:27'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 15 di setujui dengan kategori 6 dan dilanjut', '2019-10-09 04:06:34'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 14 di setujui dengan kategori 24 dan dilanju', '2019-10-09 04:06:46'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 13 di setujui dengan kategori 18 dan dilanju', '2019-10-09 04:06:51'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 6 di setujui dengan kategori 12 dan dilanjut', '2019-10-09 04:06:56'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 5 di setujui dengan kategori 12 dan dilanjut', '2019-10-09 04:07:01'),
(50, 'Khrisna Widhi', 'Persetujuan TU : Proposal 4 di setujui dengan kategori 17 dan dilanjut', '2019-10-09 04:07:05'),
(50, 'Khrisna Widhi', 'Persetujuan Setda : Menyetujui Proposal 18 Tahap 2', '2019-10-09 04:07:21'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 19 Tahap 3', '2019-10-09 04:07:38'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 18 Tahap 3', '2019-10-09 04:07:54'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 17 Tahap 3', '2019-10-09 04:08:11'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 16 Tahap 3', '2019-10-09 04:08:27'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 15 Tahap 3', '2019-10-09 04:08:48'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 14 Tahap 3', '2019-10-09 04:11:42'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 13 Tahap 3', '2019-10-09 04:11:58'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 6 Tahap 3', '2019-10-09 04:12:19'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 5 Tahap 3', '2019-10-09 04:12:38'),
(50, 'Khrisna Widhi', 'Pemeriksaan SKPD : Menyetujui Proposal 4 Tahap 3', '2019-10-09 04:12:59'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 19 Tahap 4', '2019-10-09 04:13:36'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 18 Tahap 4', '2019-10-09 04:13:43'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 17 Tahap 4', '2019-10-09 04:13:55'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 16 Tahap 4', '2019-10-09 04:14:37'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 15 Tahap 4', '2019-10-09 04:14:46'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 14 Tahap 4', '2019-10-09 04:15:04'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 13 Tahap 4', '2019-10-09 04:15:34'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 6 Tahap 4', '2019-10-09 04:15:48'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 5 Tahap 4', '2019-10-09 04:16:44'),
(50, 'Khrisna Widhi', 'Pemeriksaan TAPD : Menyetujui Proposal 4 Tahap 4', '2019-10-09 04:16:56'),
(50, 'Khrisna Widhi', 'Pemeriksaan Bupati : Menyetujui Proposal 19 Tahap 5', '2019-10-09 04:17:29'),
(50, 'Khrisna Widhi', 'Pemeriksaan Bupati : Menyetujui Proposal 18 Tahap 5', '2019-10-09 04:17:34'),
(50, 'Khrisna Widhi', 'Pemeriksaan Bupati : Menyetujui Proposal 17 Tahap 5', '2019-10-09 04:17:39'),
(50, 'Khrisna Widhi', 'Pemeriksaan Bupati : Menyetujui Proposal 16 Tahap 5', '2019-10-09 04:17:47'),
(50, 'Khrisna Widhi', 'Pemeriksaan Bupati : Menyetujui Proposal 15 Tahap 5', '2019-10-09 04:18:53'),
(50, 'Khrisna Widhi', 'Pemeriksaan Bupati : Menyetujui Proposal 14 Tahap 5', '2019-10-09 04:18:58'),
(54, 'Operator TAPD', 'Penolakan TAPD : Menolak Proposal Tahap 4', '2019-10-09 04:20:09'),
(54, 'Operator TAPD', 'Pemeriksaan TAPD : Menyetujui Proposal 13 Tahap 4', '2019-10-09 04:20:28'),
(54, 'Operator TAPD', 'Penolakan TAPD : Menolak Proposal Tahap 4', '2019-10-09 04:21:02'),
(54, 'Operator TAPD', 'Penolakan TAPD : Menolak Proposal Tahap 4', '2019-10-09 04:21:10'),
(55, 'Operator Bupati', 'Pemeriksaan Bupati : Menyetujui Proposal 5 Tahap 5', '2019-10-09 04:22:16'),
(55, 'Operator Bupati', 'Pemeriksaan Bupati : Menyetujui Proposal 4 Tahap 5', '2019-10-09 04:22:21'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 19', '2019-10-09 04:29:51'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 18', '2019-10-09 04:30:06'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 17', '2019-10-09 04:31:01'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 16', '2019-10-09 04:31:52'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 15', '2019-10-09 04:35:35'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 14', '2019-10-09 04:35:48'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 5', '2019-10-09 04:35:59'),
(57, 'Khrisna Widhi', 'Upload progress : Menambahkan Progres dengan id: 4', '2019-10-09 04:36:09'),
(56, 'Auditor', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id19', '2019-10-09 04:40:54'),
(56, 'Auditor', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id18', '2019-10-09 04:46:11'),
(56, 'Auditor', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id17', '2019-10-09 04:46:55'),
(56, 'Auditor', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id16', '2019-10-09 04:47:33'),
(56, 'Auditor', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id15', '2019-10-09 04:48:02'),
(56, 'Auditor', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id14', '2019-10-09 05:10:32'),
(56, 'Auditor', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id14', '2019-10-09 05:10:32'),
(50, 'Khrisna Widhi', 'Pengaturan tentang : Mengganti isi dari informasi tentang website', '2019-10-09 05:11:00'),
(56, 'Auditor', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id5', '2019-10-09 05:46:03'),
(56, 'Auditor', 'Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id4', '2019-10-09 05:46:34'),
(57, 'Khrisna Widhi', 'Upload lpj : Menambahkan LPJ dengan id: 19', '2019-10-09 11:57:19'),
(57, 'Khrisna Widhi', 'Upload lpj : Menambahkan LPJ dengan id: 18', '2019-10-09 11:57:34'),
(57, 'Khrisna Widhi', 'Upload lpj : Menambahkan LPJ dengan id: 17', '2019-10-09 11:57:56'),
(57, 'Khrisna Widhi', 'Upload lpj : Menambahkan LPJ dengan id: 16', '2019-10-09 11:58:10'),
(57, 'Khrisna Widhi', 'Upload lpj : Menambahkan LPJ dengan id: 15', '2019-10-09 11:58:23'),
(57, 'Khrisna Widhi', 'Upload lpj : Menambahkan LPJ dengan id: 14', '2019-10-09 11:58:36'),
(57, 'Khrisna Widhi', 'Upload lpj : Menambahkan LPJ dengan id: 5', '2019-10-09 11:58:51'),
(57, 'Khrisna Widhi', 'Upload lpj : Menambahkan LPJ dengan id: 4', '2019-10-09 11:59:04'),
(56, 'Auditor', 'Monitoring 2 : Menambah Monitoring Tahap 2 untuk proposal id19', '2019-10-09 12:00:59'),
(56, 'Auditor', 'Monitoring 2 : Menambah Monitoring Tahap 2 untuk proposal id18', '2019-10-09 12:01:49'),
(56, 'Auditor', 'Monitoring 2 : Menambah Monitoring Tahap 2 untuk proposal id17', '2019-10-09 12:02:44'),
(56, 'Auditor', 'Monitoring 2 : Menambah Monitoring Tahap 2 untuk proposal id16', '2019-10-09 12:06:00'),
(56, 'Auditor', 'Monitoring 2 : Menambah Monitoring Tahap 2 untuk proposal id15', '2019-10-09 12:08:23'),
(56, 'Auditor', 'Monitoring 2 : Menambah Monitoring Tahap 2 untuk proposal id14', '2019-10-09 12:08:46'),
(56, 'Auditor', 'Monitoring 2 : Menambah Monitoring Tahap 2 untuk proposal id5', '2019-10-09 12:09:40'),
(56, 'Auditor', 'Monitoring 2 : Menambah Monitoring Tahap 2 untuk proposal id4', '2019-10-09 12:10:02'),
(50, 'Khrisna Widhi', 'Pengaturan tentang : Mengganti isi dari informasi tentang website', '2019-10-09 12:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_06_27_141247_create_hibahbansos_table', 1),
(2, '2019_06_27_141247_create_konten_table', 1),
(3, '2019_06_27_141247_create_log_table', 1),
(4, '2019_06_27_141247_create_monitoring_table', 1),
(5, '2019_06_27_141247_create_pemeriksaansetda_table', 1),
(6, '2019_06_27_141247_create_pemeriksaanskpd_table', 1),
(7, '2019_06_27_141247_create_pemeriksaantu_table', 1),
(8, '2019_06_27_141247_create_persetujuanbupati_table', 1),
(9, '2019_06_27_141247_create_progreslpj_table', 1),
(10, '2019_06_27_141247_create_user_table', 1),
(11, '2019_06_27_141247_create_verivikasitapd_table', 1),
(12, '2019_06_27_141248_add_foreign_keys_to_hibahbansos_table', 1),
(13, '2019_06_27_141248_add_foreign_keys_to_log_table', 1),
(14, '2019_06_27_141248_add_foreign_keys_to_monitoring_table', 1),
(15, '2019_06_27_141248_add_foreign_keys_to_persetujuanbupati_table', 1),
(16, '2019_06_27_141248_add_foreign_keys_to_progreslpj_table', 1),
(17, '2019_06_27_141248_add_foreign_keys_to_verivikasitapd_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `idHibahBansos` int(11) NOT NULL,
  `nomor` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggalMonitoring2` timestamp NOT NULL DEFAULT current_timestamp(),
  `namaPenerima` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamatPenerima` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketua` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danaDiterima` bigint(20) NOT NULL,
  `poin1` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin1` int(11) NOT NULL COMMENT 'satuan %',
  `poin2` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin2` int(11) NOT NULL COMMENT 'satuan %',
  `poin3` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin3` int(11) NOT NULL COMMENT 'satuan %',
  `poin4a` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin4a` int(11) NOT NULL COMMENT 'satuan %',
  `poin4b` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin4b` int(11) NOT NULL COMMENT 'satuan %',
  `poin5` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin5` int(11) NOT NULL COMMENT 'satuan %',
  `poin6` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin6` int(11) NOT NULL COMMENT 'satuan %',
  `poin7` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin7` int(11) NOT NULL COMMENT 'satuan %',
  `poin8a` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin8a` int(11) NOT NULL COMMENT 'satuan %',
  `poin8b` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin8b` int(11) NOT NULL COMMENT 'satuan %',
  `poin8b1` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin8b1` int(11) NOT NULL COMMENT 'satuan %',
  `poin8b2` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin8b2` int(11) NOT NULL COMMENT 'satuan %',
  `poin8b3` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin8b3` int(11) NOT NULL COMMENT 'satuan %',
  `poin8b4` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin8b4` int(11) NOT NULL COMMENT 'satuan %',
  `poin9` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin9` int(11) NOT NULL COMMENT 'satuan %',
  `poin10` int(11) NOT NULL COMMENT '0 tidak / progress == 0; 1 ada progress',
  `progresPoin10` int(11) NOT NULL COMMENT 'satuan %',
  `keterangan` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`idHibahBansos`, `nomor`, `tanggal`, `tanggalMonitoring2`, `namaPenerima`, `alamatPenerima`, `ketua`, `danaDiterima`, `poin1`, `progresPoin1`, `poin2`, `progresPoin2`, `poin3`, `progresPoin3`, `poin4a`, `progresPoin4a`, `poin4b`, `progresPoin4b`, `poin5`, `progresPoin5`, `poin6`, `progresPoin6`, `poin7`, `progresPoin7`, `poin8a`, `progresPoin8a`, `poin8b`, `progresPoin8b`, `poin8b1`, `progresPoin8b1`, `poin8b2`, `progresPoin8b2`, `poin8b3`, `progresPoin8b3`, `poin8b4`, `progresPoin8b4`, `poin9`, `progresPoin9`, `poin10`, `progresPoin10`, `keterangan`) VALUES
(19, '23', '2019-10-09 04:40:54', '2019-10-09 04:40:54', 'Bag. Keuangan', 'Bogor', 'Agus', 2000000, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 89, 1, 90, 1, 90, 1, 90, 1, 78, 1, 78, 1, 78, 1, 90, 1, 100, 'Data Lengkap'),
(18, '11', '2019-10-09 04:46:11', '2019-10-09 04:46:11', 'Bag. Keuangan', 'Bogor', 'Agus', 1000000, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 100, 1, 100, 1, 100, 0, 0, 1, 80, 0, 0, 1, 90, 1, 90, 1, 90, 'Data Lengkap'),
(17, '14', '2019-10-09 04:46:55', '2019-10-09 04:46:55', 'Bag. Keuangan', 'Bogor', 'Agus', 1000000, 1, 89, 1, 89, 1, 90, 1, 88, 1, 89, 1, 81, 1, 70, 1, 90, 1, 90, 1, 100, 1, 100, 1, 100, 1, 90, 1, 90, 1, 90, 1, 90, 'Data Lengkap'),
(16, '14', '2019-10-09 04:47:33', '2019-10-09 04:47:33', 'Bag. Keuangan', 'Bogor', 'Agus', 1000000, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 'Data Lengkap'),
(15, '15', '2019-10-09 04:48:02', '2019-10-09 04:48:02', 'Bag. Keuangan', 'Bogor', 'Agus', 1000000, 1, 80, 1, 80, 1, 80, 0, 0, 0, 0, 1, 80, 1, 80, 1, 89, 1, 85, 1, 90, 1, 100, 1, 100, 1, 90, 1, 87, 1, 88, 1, 100, 'Data Lengkap'),
(14, '14', '2019-10-09 05:10:32', '2019-10-09 05:10:32', 'Bag. Keuangan', 'Bogor', 'Agus', 1000000, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 89, 1, 89, 1, 90, 1, 100, 1, 78, 1, 80, 1, 90, 1, 90, 0, 0, 'Data Lengkap'),
(14, '14', '2019-10-09 05:10:32', '2019-10-09 05:10:32', 'Bag. Keuangan', 'Bogor', 'Agus', 1000000, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 89, 1, 89, 1, 90, 1, 100, 1, 78, 1, 80, 1, 90, 1, 90, 0, 0, 'Data Lengkap'),
(5, '26', '2019-10-09 05:46:03', '2019-10-09 05:46:03', 'Bag. Keuangan', 'Bogor', 'Agus', 1000000, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 89, 1, 90, 1, 100, 1, 100, 1, 70, 1, 90, 1, 100, 'Data Lengkap'),
(4, '18', '2019-10-09 05:46:34', '2019-10-09 05:46:34', 'Bag. Keuangan', 'Bogor', 'Agus', 1000000, 0, 0, 0, 0, 1, 65, 1, 78, 1, 40, 1, 80, 1, 90, 1, 80, 1, 80, 1, 90, 1, 90, 1, 90, 1, 90, 1, 90, 1, 100, 0, 0, 'Data Lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaansetda`
--

CREATE TABLE `pemeriksaansetda` (
  `idHibahBansos` int(11) NOT NULL,
  `kategori` int(11) NOT NULL COMMENT 'lihat file system/helper/hibansos_helper untuk penomoran kategoru',
  `acc` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `revisi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemeriksaansetda`
--

INSERT INTO `pemeriksaansetda` (`idHibahBansos`, `kategori`, `acc`, `waktu`, `revisi`) VALUES
(18, 34, 0, '2019-10-09 04:07:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaanskpd`
--

CREATE TABLE `pemeriksaanskpd` (
  `idHibahBansos` int(11) NOT NULL,
  `kategoriProposal` int(11) NOT NULL DEFAULT 0 COMMENT '1.Hibah 2.Bansos 0.belum',
  `pengecekanDokumen` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persyaratanAdministrasi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemberianRekomendasiDana` int(11) NOT NULL COMMENT '1.ya 0.tidak',
  `danaRekomendasiSKPD` bigint(20) NOT NULL,
  `acc` int(11) NOT NULL COMMENT '1.ya 2.tidak',
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `revisi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemeriksaanskpd`
--

INSERT INTO `pemeriksaanskpd` (`idHibahBansos`, `kategoriProposal`, `pengecekanDokumen`, `persyaratanAdministrasi`, `pemberianRekomendasiDana`, `danaRekomendasiSKPD`, `acc`, `waktu`, `revisi`) VALUES
(4, 2, '1,2,3,4', '1,2,3,4,5,6,7,8', 1, 8000000, 1, '2019-10-09 04:12:59', 0),
(5, 1, '1,2,3,4', '1,2,3,4,5,6,7,8', 1, 900000, 1, '2019-10-09 04:12:38', 0),
(6, 1, '1,2,3,4', '1,2,3,4,5,6,7,8', 1, 14000000, 1, '2019-10-09 04:12:19', 0),
(13, 1, '1,2,3,4', '1,2,3,4,5,6,7,8', 1, 15000000, 1, '2019-10-09 04:11:58', 0),
(14, 1, '1,2,3,4', '1,2,3,4,5,6,7,8', 1, 4000000, 1, '2019-10-09 04:11:42', 0),
(15, 1, '1,2,3,4', '1,2,3,4,5,6,7,8', 1, 9000000, 1, '2019-10-09 04:08:48', 0),
(16, 2, '1,2,3,4', '1,2,3,4,5,6,7,8', 1, 15000000, 1, '2019-10-09 04:08:27', 0),
(17, 2, '1,2,3,4', '1,2,3,4,5,6,7,8', 1, 16000000, 1, '2019-10-09 04:08:11', 0),
(18, 1, '1,2,3,4', '1,2,3,4,5,6,7,8', 1, 15000000, 1, '2019-10-09 04:07:54', 0),
(19, 1, '1,2,3,4', '1,2,3,4,5,6,7,8', 1, 4000000, 1, '2019-10-09 04:07:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaantu`
--

CREATE TABLE `pemeriksaantu` (
  `idHibahBansos` int(11) NOT NULL,
  `kategori` int(11) NOT NULL COMMENT 'lihat file system/helper/hibansos_helper untuk penomoran kategoru',
  `acc` int(11) NOT NULL COMMENT '1.ya 2.tidak',
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `revisi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemeriksaantu`
--

INSERT INTO `pemeriksaantu` (`idHibahBansos`, `kategori`, `acc`, `waktu`, `revisi`) VALUES
(4, 17, 1, '2019-10-09 04:07:05', 0),
(5, 12, 1, '2019-10-09 04:07:01', 0),
(6, 12, 1, '2019-10-09 04:06:56', 0),
(13, 18, 1, '2019-10-09 04:06:51', 0),
(14, 24, 1, '2019-10-09 04:06:46', 0),
(15, 6, 1, '2019-10-09 04:06:34', 0),
(16, 7, 1, '2019-10-09 04:06:27', 0),
(17, 8, 1, '2019-10-09 04:06:15', 0),
(19, 31, 1, '2019-10-09 04:05:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `persetujuanbupati`
--

CREATE TABLE `persetujuanbupati` (
  `idHibahBansos` int(11) NOT NULL,
  `keterangan` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc` int(11) NOT NULL,
  `waktu` timestamp NULL DEFAULT current_timestamp(),
  `revisi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persetujuanbupati`
--

INSERT INTO `persetujuanbupati` (`idHibahBansos`, `keterangan`, `acc`, `waktu`, `revisi`) VALUES
(19, 'Proposal diterima.', 1, '2019-10-09 04:17:29', 0),
(18, 'Proposal diterima.', 1, '2019-10-09 04:17:34', 0),
(17, 'Proposal diterima.', 1, '2019-10-09 04:17:39', 0),
(16, 'Proposal diterima.', 1, '2019-10-09 04:17:47', 0),
(15, 'Proposal diterima.', 1, '2019-10-09 04:18:53', 0),
(14, 'Proposal diterima.', 1, '2019-10-09 04:18:58', 0),
(5, 'Dana sesuai target', 1, '2019-10-09 04:22:16', 0),
(4, 'Dana sesuai target.', 1, '2019-10-09 04:22:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `progreslpj`
--

CREATE TABLE `progreslpj` (
  `idHibahBansos` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkYoutube` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileLPJ` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileProgres` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progreslpj`
--

INSERT INTO `progreslpj` (`idHibahBansos`, `keterangan`, `linkYoutube`, `fileLPJ`, `fileProgres`) VALUES
(19, 'Laporan Pertanggungjawaban', 'https://www.youtube.com/watch?v=Ev63zHlNTsk', '/proposal/lpj/lpj.pdf', '/proposal/progress/laporan_progres_2.pdf'),
(18, 'Laporan Pertanggungjawaban', 'https://www.youtube.com/watch?v=Ev63zHlNTsk', '/proposal/lpj/lpj1.pdf', '/proposal/progress/laporan_progres_21.pdf'),
(17, 'Laporan Pertanggungjawaban', 'https://www.youtube.com/watch?v=Ev63zHlNTsk', '/proposal/lpj/lpj_2.pdf', '/proposal/progress/laporan_progres.pdf'),
(16, 'Laporan Pertanggungjawaban', 'https://www.youtube.com/watch?v=Ev63zHlNTsk', '/proposal/lpj/lpj2.pdf', '/proposal/progress/laporan_progres1.pdf'),
(15, 'Laporan Pertanggungjawaban', 'https://www.youtube.com/watch?v=Ev63zHlNTsk', '/proposal/lpj/lpj3.pdf', '/proposal/progress/laporan_progres2.pdf'),
(14, 'Laporan Pertanggungjawaban', 'https://www.youtube.com/watch?v=Ev63zHlNTsk', '/proposal/lpj/lpj_21.pdf', '/proposal/progress/laporan_progres_22.pdf'),
(5, 'Laporan Pertanggungjawaban', 'https://www.youtube.com/watch?v=Ev63zHlNTsk', '/proposal/lpj/lpj4.pdf', '/proposal/progress/laporan_progres3.pdf'),
(4, 'Laporan Pertanggungjawaban', 'https://www.youtube.com/watch?v=Ev63zHlNTsk', '/proposal/lpj/lpj_22.pdf', '/proposal/progress/laporan_progres_23.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noKtp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passReal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passHash` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 7 COMMENT '1.Superadmin 2.AdminTU 3.AdminSetda 4.AdminSkpd 5.AdminTapd 6.Bupati 7.yangMengajukan',
  `statusAktif` int(11) NOT NULL DEFAULT 0 COMMENT '1.aktif 0.tidakAktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `alamat`, `telepon`, `noKtp`, `username`, `passReal`, `passHash`, `role_id`, `statusAktif`) VALUES
(50, 'Khrisna Widhi', 'khrisnaww@gmail.com', 'Ciluar Permai Blok A.3', '218 3494 664', '4916616112287964', 'op_Admin', '1q2w3e4r', '5416d7cd6ef195a0f7622a9c56b55e84', 1, 1),
(51, 'Operator TU', 'khrisna_wd@rocketmail.com', 'Bogor', '081316417171', '5562632646556564', 'op_tu', '1q2w3e4r', '5416d7cd6ef195a0f7622a9c56b55e84', 2, 1),
(52, 'Operator TU SETDA', 'khrisna_wq@rocketmail.com', 'Bogor', '081316417172', '5562632646556567', 'op_setda', '1q2w3e4r', '5416d7cd6ef195a0f7622a9c56b55e84', 3, 1),
(53, 'Operator SKPD', 'khrisnazz@gmail.com', 'Bogor', '081316417175', '4556568887459598', 'op_skpd', '1q2w3e4r', '5416d7cd6ef195a0f7622a9c56b55e84', 4, 1),
(54, 'Operator TAPD', 'khrisna1wd@rocketmail.com', 'Bogor', '081316417177', '2232656587456787', 'op_tapd', '1q2w3e4r', '5416d7cd6ef195a0f7622a9c56b55e84', 5, 1),
(55, 'Operator Bupati', 'bupati@gmail.com', 'Bogor', '081316417111', '3365445465465132', 'op_bupati', '1q2w3e4r', '5416d7cd6ef195a0f7622a9c56b55e84', 6, 1),
(56, 'Auditor', 'auditor@gmail.com', 'Bogor', '089334353423', '4556568882245653', 'auditor', '1q2w3e4r', '5416d7cd6ef195a0f7622a9c56b55e84', 8, 1),
(57, 'Khrisna Widhi', 'khrisnaa@gmail.com', 'Bogor', '081316417657', '4556568887856453', 'khrisnawd', '1q2w3e4r', '5416d7cd6ef195a0f7622a9c56b55e84', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `verivikasitapd`
--

CREATE TABLE `verivikasitapd` (
  `idHibahBansos` int(11) NOT NULL,
  `danaEvaluasiTAPD` bigint(20) NOT NULL,
  `keterangan` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `revisi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verivikasitapd`
--

INSERT INTO `verivikasitapd` (`idHibahBansos`, `danaEvaluasiTAPD`, `keterangan`, `acc`, `waktu`, `revisi`) VALUES
(19, 2000000, 'Dana akan maksimal dengan nominal tersebut.', 1, '2019-10-09 04:13:36', 0),
(18, 12000000, 'Dana akan maksimal dengan nominal tersebut.', 1, '2019-10-09 04:13:43', 0),
(17, 10000000, 'Dana akan maksimal dengan nominal tersebut.', 1, '2019-10-09 04:13:55', 0),
(16, 13000000, 'Dana akan maksimal dengan nominal tersebut.', 1, '2019-10-09 04:14:36', 0),
(15, 6000000, 'Dana akan maksimal dengan nominal tersebut.', 1, '2019-10-09 04:14:46', 0),
(14, 4000000, 'Dana akan maksimal dengan nominal tersebut.', 1, '2019-10-09 04:15:04', 0),
(5, 800000, 'Dana akan maksimal dengan nominal tersebut.', 1, '2019-10-09 04:16:43', 0),
(4, 7000000, 'Dana akan maksimal dengan nominal tersebut.', 1, '2019-10-09 04:16:56', 0),
(13, 0, '', 2, '2019-10-09 04:21:02', 0),
(6, 0, '', 2, '2019-10-09 04:21:10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hibahbansos`
--
ALTER TABLE `hibahbansos`
  ADD PRIMARY KEY (`idHibahBansos`),
  ADD KEY `idYangMengajukan` (`idYangMengajukan`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD KEY `idHibahBansos` (`idHibahBansos`);

--
-- Indexes for table `pemeriksaansetda`
--
ALTER TABLE `pemeriksaansetda`
  ADD KEY `idHibahBansos` (`idHibahBansos`);

--
-- Indexes for table `pemeriksaanskpd`
--
ALTER TABLE `pemeriksaanskpd`
  ADD PRIMARY KEY (`idHibahBansos`),
  ADD KEY `idHibahBansos` (`idHibahBansos`);

--
-- Indexes for table `pemeriksaantu`
--
ALTER TABLE `pemeriksaantu`
  ADD PRIMARY KEY (`idHibahBansos`),
  ADD KEY `id` (`idHibahBansos`);

--
-- Indexes for table `persetujuanbupati`
--
ALTER TABLE `persetujuanbupati`
  ADD KEY `idHibahBansos` (`idHibahBansos`);

--
-- Indexes for table `progreslpj`
--
ALTER TABLE `progreslpj`
  ADD KEY `idHibahBansos` (`idHibahBansos`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`,`telepon`,`noKtp`,`username`),
  ADD UNIQUE KEY `email_3` (`email`,`telepon`,`noKtp`,`username`),
  ADD UNIQUE KEY `email_4` (`email`,`telepon`,`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `verivikasitapd`
--
ALTER TABLE `verivikasitapd`
  ADD KEY `idHibahBansos` (`idHibahBansos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hibahbansos`
--
ALTER TABLE `hibahbansos`
  MODIFY `idHibahBansos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hibahbansos`
--
ALTER TABLE `hibahbansos`
  ADD CONSTRAINT `hibahbansos_ibfk_1` FOREIGN KEY (`idYangMengajukan`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD CONSTRAINT `monitoring_ibfk_1` FOREIGN KEY (`idHibahBansos`) REFERENCES `hibahbansos` (`idHibahBansos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemeriksaansetda`
--
ALTER TABLE `pemeriksaansetda`
  ADD CONSTRAINT `pemeriksaansetda_ibfk_1` FOREIGN KEY (`idHibahBansos`) REFERENCES `hibahbansos` (`idHibahBansos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemeriksaanskpd`
--
ALTER TABLE `pemeriksaanskpd`
  ADD CONSTRAINT `pemeriksaanskpd_ibfk_1` FOREIGN KEY (`idHibahBansos`) REFERENCES `hibahbansos` (`idHibahBansos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemeriksaantu`
--
ALTER TABLE `pemeriksaantu`
  ADD CONSTRAINT `pemeriksaantu_ibfk_1` FOREIGN KEY (`idHibahBansos`) REFERENCES `hibahbansos` (`idHibahBansos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `persetujuanbupati`
--
ALTER TABLE `persetujuanbupati`
  ADD CONSTRAINT `persetujuanbupati_ibfk_1` FOREIGN KEY (`idHibahBansos`) REFERENCES `hibahbansos` (`idHibahBansos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `progreslpj`
--
ALTER TABLE `progreslpj`
  ADD CONSTRAINT `progreslpj_ibfk_1` FOREIGN KEY (`idHibahBansos`) REFERENCES `hibahbansos` (`idHibahBansos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verivikasitapd`
--
ALTER TABLE `verivikasitapd`
  ADD CONSTRAINT `verivikasitapd_ibfk_1` FOREIGN KEY (`idHibahBansos`) REFERENCES `hibahbansos` (`idHibahBansos`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
