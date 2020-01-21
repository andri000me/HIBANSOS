<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('_pemeriksaan')) {
  function _pemeriksaan($id,$tahapan, $acc, $role){
    $role = $role -1;
    $info = new stdClass();
    $link =['tu','setda'];
    if ($tahapan>$role){
      $info->class = "bg-success";
      $info->text = 'Di setujui';
    }
    else{
      if ($acc == 2 && $tahapan == $role){
        $info->link = base_url()."periksa/".$link[$tahapan-1]."/".$id;
        $info->class = "bg-info";
      }else{
        $info->class = "";
        $info->text = 'proses';
      }
    }
    return $info;
  }
}