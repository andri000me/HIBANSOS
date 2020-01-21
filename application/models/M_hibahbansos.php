<?php
class M_hibahbansos extends CI_Model{

  public function __construct(){
    $this->load->database();
  }
  public function readHibahBansos($where1 = false, $where2 =false, $where3=false, $search=false){
    if($where1 == FALSE && $where2 == FALSE && $where3 == FALSE && $search == FALSE){
      $query = $this->db->order_by('idHibahBansos','DESC')->get('hibahbansos');
      return $query->result_array();
    }else if($where1 != FALSE && $where2 == FALSE){
      $query = $this->db->get_where('hibahbansos', $where1);
      return $query->row_array();
    }else if($where1 == FALSE && $where2 != FALSE){
      $query = $this->db->get_where('hibahbansos', $where2);
      return $query->row();
    }else if($where3 != FALSE){
      $query = $this->db->order_by('idHibahBansos','DESC')->get_where('hibahbansos', $where3);
      return $query->result_array();
    }else if($search != FALSE){
      $sql = $this->db->query("SELECT * FROM hibahbansos WHERE judulKegiatan like '%$search%'");
      return $sql->result_array();
    }
  }


  
  public function readHibahBansosProgresLPJ(){
    $SQL = "SELECT * from hibahbansos where progres = 1 OR lpj = 1  ORDER BY `hibahbansos`.`idHibahBansos` DESC";
    $query = $this->db->query($SQL);
    return $query->result_array();
  }
  public function createHibahBansos($data){
    return $this->db->insert('hibahbansos', $data);
  }
  public function updateHibahBansos($data, $where){
    return $this->db->update('hibahbansos', $data, $where);
  }
  public function createPeriksaTu($data){
    $this->db->delete('pemeriksaantu',['idHibahBansos'=>$data['idHibahBansos']]);
    return $this->db->insert('pemeriksaantu', $data);
  }
  public function readPeriksaTu($where){
    $query = $this->db->get_where('pemeriksaantu', $where);
    return $query->row_array();
  }
  public function createPeriksaSetda($data){
    $this->db->delete('pemeriksaansetda',['idHibahBansos'=>$data['idHibahBansos']]);
    $this->db->delete('pemeriksaantu',['idHibahBansos'=>$data['idHibahBansos']]);
    return $this->db->insert('pemeriksaansetda', $data);
  }
  public function readPeriksaSetda($where){
    $query = $this->db->get_where('pemeriksaansetda', $where);
    return $query->row_array();
  }
  public function createPeriksaSkpd($data){
    $this->db->delete('pemeriksaanskpd',['idHibahBansos'=>$data['idHibahBansos']]);
    return $this->db->insert('pemeriksaanskpd', $data);
  }
  public function readPeriksaSkpd($where){
    $query = $this->db->get_where('pemeriksaanskpd', $where);
    return $query->row_array();
  }
  public function createVerivikasiTapd($data){
    $this->db->delete('verivikasitapd',['idHibahBansos'=>$data['idHibahBansos']]);
    return $this->db->insert('verivikasitapd', $data);
  }
  public function readVerivikasiTapd($where){
    $query = $this->db->get_where('verivikasitapd', $where);
    return $query->row_array();
  }
  public function createPersetujuanBupati($data){
    $this->db->delete('persetujuanbupati',['idHibahBansos'=>$data['idHibahBansos']]);
    return $this->db->insert('persetujuanbupati', $data);
  }
  public function readPersetujuanBupati($where){
    $query = $this->db->get_where('persetujuanbupati', $where);
    return $query->row_array();
  }
  public function createProgresLPJ($data){
    return $this->db->insert('progreslpj', $data);
  }
  public function readProgresLPJ($where1, $where2){
    if($where1 != FALSE){
      $query = $this->db->get_where('progreslpj', $where1);
      return $query->row_array();
    }else{
      $query = $this->db->get_where('progreslpj', $where2);
      return $query->row();
    }
  }
  public function updateProgresLPJ($data, $where){
    return $this->db->update('progreslpj', $data, $where);
  }
  public function createMonitoring($data){
    return $this->db->insert('monitoring', $data);
  }
  public function updateMonitoring($data, $where){
    return $this->db->update('monitoring', $data, $where);
  }
  public function readMonitoring($where){
    $query = $this->db->get_where('monitoring', $where);
    return $query->row_array();
  }
  public function deleterevisi($id)
  {
    $this->db->where('idHibahBansos', $id);
    return $this->db->delete('pemeriksaanskpd');
  }
  public function readLpj($where){
    $query = $this->db->get_where('progreslpj', $where);
    return $query->row_array();
  }

}
?>
