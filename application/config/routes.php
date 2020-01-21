<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = 'ControllerUtama/_404';
$route['translate_uri_dashes'] = FALSE;
$route['logout'] = 'ControllerUtama/logout';
$route['faker/user'] = 'FakerController/index';
$route['faker/bansos'] = 'FakerController/randomHibansos';


$route['testing/tambah_hibah_bansos'] = 'ControllerHibahBansos/testing1';
$route['testing/periksatu'] = 'ControllerHibahBansos/testing2';
$route['testing/monitoring1'] = 'ControllerHibahBansos/testing3';




require (APPPATH.'routes/public.php');
require (APPPATH.'routes/administrator.php');
require (APPPATH.'routes/user.php');
require (APPPATH.'routes/operator.php');