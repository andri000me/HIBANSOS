<?php
$route['pemeriksaan'] = 'ControllerHibahBansos/periksa';
//Routing persetujuan * operator non auditor
$route['periksa/tu/(:any)'] = 'ControllerHibahBansos/periksaTU/$1';
$route['periksa/setda/(:any)'] = 'ControllerHibahBansos/periksaSETDA/$1';
$route['periksa/skpd/(:any)'] = 'ControllerHibahBansos/periksaSKPD/$1';
$route['verifikasi/tapd/(:any)'] = 'ControllerHibahBansos/verifikasiTAPD/$1';
$route['verifikasi/tapd/(:any)/edit'] = 'ControllerHibahBansos/verifikasiTAPD/$1/$2';
$route['verifikasi/tapd/cetakForm/(:any)'] = 'ControllerHibahBansos/cetakFormTAPD/$1';
$route['periksa/bupati/(:any)'] = 'ControllerHibahBansos/persetujuanBUPATI/$1';
//Routing penolakan
$route['periksa/tu/tolak/(:any)'] = 'ControllerHibahBansos/periksaTUtolak/$1';
$route['periksa/setda/tolak/(:any)'] = 'ControllerHibahBansos/periksaSETDAtolak/$1';
$route['periksa/skpd/tolak/(:any)'] = 'ControllerHibahBansos/periksaSKPDtolak/$1';
$route['periksa/skpd/revisi/(:any)'] = 'ControllerHibahBansos/set_revisi/$1';
$route['verifikasi/tapd/tolak/(:any)'] = 'ControllerHibahBansos/verifikasiTAPDtolak/$1';
$route['periksa/bupati/tolak/(:any)'] = 'ControllerHibahBansos/persetujuanBUPATItolak/$1';
$route['detailpemeriksaan/(:any)'] = 'ControllerHibahBansos/detailPemeriksaan/$1';
//Routing persetujuian * operator auditor
$route['daftarMonitoring'] = 'ControllerHibahBansos/daftarMonitoring/';
$route['monitoring1/(:any)'] = 'ControllerHibahBansos/buatMonitoring1/$1';
$route['monitoring2/(:any)'] = 'ControllerHibahBansos/buatMonitoring2/$1';