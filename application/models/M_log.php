<?php
  class M_log extends CI_Model{

     public function __construct(){
       $this->load->database();
     }


     public function readLog( ){
       $query = $this->db->order_by('waktu','DESC')->get('log');
       return $query->result_array();
     }
     public function createLog($data){
       return $this->db->insert('log', $data);
     }


  }
 ?>
