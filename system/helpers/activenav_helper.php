<?php
if (!function_exists('activenav')){
  function activenav($param){
    $current_page= (explode("/",uri_string()));
    return $current_page[0] === $param ? 'active':'';
  }
}