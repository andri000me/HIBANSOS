<?php
/**
 * @property viewprop        $viewprop                           LOL
 */
class Viewprop{
  private $_INC;
  private $user_session;
  private $user_notifikasi;
  public function __construct($instance)
  {
    $this->_INC = $instance['instance'];
  }
  public function common(){
    $this->user_session = $this->_INC->session->user ?? null;
    $this->user_notifikasi= $this->_INC->session->user_notifikasi ?? null;
    $prop = [
        'notifikasi'=> $this->user_notifikasi,
        'user'=>$this->user_session,
        'nav'=>$this->nav()
    ];
    $this->resetnotif();
    return $prop;
  }
  private function nav(){
    $tipe =  $this->_INC->session->user ?? null;
    if ($tipe == null)
      return ['public'];
    else{
      $role = (int) $this->_INC->session->user->role_id;
      $username = $this->_INC->session->user->username;
      if (in_array($role, [2, 3, 4, 5, 6,])){
        $role = 'operator';
      }elseif ($role == 7){
        $role = 'user';
      }elseif ($role == 8){
        $role = 'auditor';
      }else{
        $role = 'administrator';
      }
    }
    return ['role'=>$role, 'username'=>$username];
  }
  public function setnotif($kode, $pesan){
    $this->_INC->session->set_userdata(['user_notifikasi'=>['kode' => $kode, 'pesan' => $pesan]]);
  }
  private function resetnotif(){
    $this->_INC->session->unset_userdata('user_notifikasi');
  }
  public function resetformerror(){
    $this->_INC->session->unset_userdata('_404');
    $this->_INC->session->unset_userdata('_400');
    $this->_INC->session->unset_userdata('formerror');
    $this->_INC->session->unset_userdata('preval');
  }
  public function setformerror($prop){
    $prop['_404'] = $this->_INC->session->_404;
    $prop['_400'] = $this->_INC->session->_400;
    $prop['formerror'] = $this->_INC->session->formerror;
    $prop['preval'] = $this->_INC->session->preval;
    return $prop;
  }
}