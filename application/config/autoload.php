<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$autoload['packages'] = array();
$autoload['libraries'] = array('session','upload','form_validation');
$autoload['drivers'] = array();
$autoload['helper'] = array('url','nominal', 'file', 'view','hibansos','activenav');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('M_konten');