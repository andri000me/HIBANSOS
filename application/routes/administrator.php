<?php
$route['menagemenpengguna/(pengguna)'] = 'ControllerSuperAdmin/daftarPengguna/$1';
$route['menagemenpengguna/(operator)'] = 'ControllerSuperAdmin/daftarPengguna/$1';
$route['verifikasiAkun'] = 'ControllerSuperAdmin/verivikasiAkun';
$route['hapusPengguna'] = 'ControllerSuperAdmin/hapusPengguna/$1';
$route['editOperator/(:any)'] = 'ControllerSuperAdmin/editOperator/$1';
$route['editOperator'] = 'ControllerSuperAdmin/editOperator';
$route['tambahOperator'] = 'ControllerSuperAdmin/tambahOperator';
$route['pengaturantentang'] = 'ControllerSuperAdmin/pengaturanTentang';
$route['pengaturanperaturan'] = 'ControllerSuperAdmin/pengaturanPeraturan';
$route['tambahPeraturan'] = 'ControllerSuperAdmin/tambahPeraturan';
$route['hapusPeraturan'] = 'ControllerSuperAdmin/hapusPeraturan';
$route['log'] = 'ControllerSuperAdmin/lihatLog';

