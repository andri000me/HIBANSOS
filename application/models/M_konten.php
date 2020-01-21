<?php
  class M_konten extends CI_Model{

     public function __construct(){
       $this->load->database();
     }


     public function readKonten($halaman, $id){
       if($halaman != FALSE){
         $query = $this->db->get_where('konten', array('halaman'=>$halaman));
         return $query->result_array();
       }else{
         $query = $this->db->get_where('konten', array('id'=>$id));
         return $query->row();
       }
     }


     public function createKonten($data){
       return $this->db->insert('konten', $data);
     }


     public function updateKonten($data, $where){
       $this->db->update('konten', $data, $where);
       return $this->db->affected_rows();
     }


     public function deletePeraturan($id){
         return $this->db->delete('konten',array('id'=>$id));
     }


  }
 ?>
