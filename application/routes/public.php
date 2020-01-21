<?php
$route['default_controller'] = 'ControllerUtama/home';
$route['login'] = 'ControllerUtama/login';
$route['logout'] = 'ControllerUtama/logout';
$route['daftar'] = 'ControllerUtama/daftar';
$route['peraturan'] = 'ControllerUtama/peraturan';
$route['tentang'] = 'ControllerUtama/tentang';
$route['lihatPeraturan/(:any)'] = 'ControllerUtama/lihatPeraturan/$1';

$route['proposal/detail/(:any)'] = 'ControllerHibahBansos/detailProposal/$1';
$route['lihatlpj/(:any)'] = 'ControllerHibahBansos/lihatFileLPJ/$1';
$route['lihatMonitoring1/(:any)'] = 'ControllerHibahBansos/lihatMonitoring1/$1';
$route['lihatMonitoring2/(:any)'] = 'ControllerHibahBansos/lihatMonitoring2/$1';
$route['lihatProposal/(:any)'] = 'ControllerHibahBansos/lihatFileProposal/$1';
$route['proposal/progres/(:any)'] = 'ControllerHibahBansos/lihatFileProgres/$1';
//Butuh konfirmasi
$route['pencarian'] = 'ControllerHibahBansos/daftarProposal';
$route['pencarian/kategori/(:any)'] = 'ControllerHibahBansos/daftarProposalPerkategori/$1';
$route['pencarian/nama/(:any)'] = 'ControllerHibahBansos/daftarProposalPencarian/$1';