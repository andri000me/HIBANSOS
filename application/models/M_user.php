<?php
  class M_user extends CI_Model{

     public function __construct(){
       $this->load->database();
     }


     public function readUser($where1= false, $where2 = false, $idSuperAdmin = false, $idPengguna = false){
       if($where1 != FALSE){
         return $this->db->get_where("user", $where1);
       }else if($where2 != FALSE){
         $query = $this->db->get_where("user", $where2);
         return $query->row();
       }else if($idSuperAdmin != FALSE){
         $role_id = array('2', '3', '4', '5' ,'6','8');
         $this->db->where_in('role_id', $role_id);
         $query = $this->db->get('user');
         return $query->result_array();
       }else if($idPengguna != FALSE){
         $query = $this->db->get_where('user', array('id'=>$idPengguna));
         return $query->row_array();
       }else if($where1 === FALSE && $where2 === FALSE && $idSuperAdmin === FALSE && $idPengguna === FALSE){
         $query = $this->db->get_where('user', array('role_id'=>7));
         return $query->result_array();
       }
     }
     public function createUser($post){
       $this->db->insert('user', $post);
       return $this->db->affected_rows();
     }

     public function updateUser($data, $where){
       return $this->db->update('user', $data, $where);
     }

     public function deletePengguna($id){
         return $this->db->delete('user',array('id'=>$id));
     }
  }
 ?>
