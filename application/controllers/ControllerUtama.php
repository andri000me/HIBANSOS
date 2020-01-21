<?php
class controllerUtama extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('M_user');
    $this->load->model('M_konten');
    $this->load->model('M_hibahbansos');
    $this->load->library('Viewprop',['instance'=>$this]);
    foreach ([
                 'required'=>'Harap isi bidang ini',
                 'is_unique'=>'Data anda sudah terdaftar',
                 'min_length'=>'Minimal {param} karakter',
                 'max_length'=>'Maximal {param} karakter',
                 'matches'=>'Harus sama dengan {param}',
                 'numeric'=>'Harus berupa angka {param}',
                 'email'=>'Berikan alamat email yang benar'
             ]
             as $rule =>$pesan)
    {
      $this->form_validation->set_message($rule,$pesan);
    }
  }
  private function setformerror($redirect){
    $this->session->set_userdata([
        'formerror'=>$this->form_validation->error_array(),
        'preval'=>$this->input->post()
    ]);
    redirect(base_url($redirect), 'location', 301);
  }
  public function _404(){
    echo "Untuk halaman ".uri_string();
  }
  public function home(){
    $prop = $this->viewprop->common();
    $prop['list'] = $this->M_hibahbansos->readHibahBansos();
    view('public.home', $prop);
  }
  public function login(){
    $read_user = function (){
      $where = array(
          'username' => $this->input->post('username'),
          'passHash' => md5($this->input->post('password'))
      );
      $login = $this->M_user->readUser($where);
      if($login->num_rows() === 1){
        $user = $login->result()[0];
        if ($user->statusAktif == 1){
          $this->session->set_userdata(['user'=>$user]);
          $this->viewprop->setnotif(200, 'Selamat datang '.$user->username);
          $this->viewprop->resetformerror();
          redirect(base_url());
          die();
        }else{
          $this->session->set_userdata(['_404'=>'User belum diverfikasi']);
        }
      }else{
        $this->session->set_userdata(['_404'=>'Kombinasi username dan password salah']);
      }
    };
    if ($this->input->method() == 'post'){
      $validasi = $this->form_validation->run('login');
      $validasi ? $read_user()
          :
          $this->session->set_userdata(['formerror'=>$this->form_validation->error_array()]);
      redirect(base_url(uri_string()), 'location', 301);
      die();
    }

    $prop = $this->viewprop->common();
    $prop = $this->viewprop->setformerror($prop);
    view('public/login', $prop);
    $this->viewprop->resetformerror();
  }
  public function logout(){
    if ($this->session->user!== null){
      $this->session->sess_destroy();
      redirect(base_url());
    }
  }
  public function daftar(){
//    Block kode untuk melakukan pendaftaran
    $daftar = function ($post){
      $post['passReal'] = $post['password'];unset($post['password']);unset($post['k-password']);
      $post['passHash'] = md5($post['passReal']);
      $cek = $this->M_user->createUser($post);
      return $cek === 1;
    };
//    Blok kode untuk melakukan validasi(POST) & menampilkan form (GET)
    if ($this->input->method() == 'post'){
      $run = function ($daftar){
        if ($daftar){
          $this->viewprop->setnotif(200, 'Silahkan tunggu verifikasi');
        }else{
          $this->viewprop->setnotif(501, 'Terjadi kesalah silahkan coba lagi');
        }
        redirect('');
      };
      $post = $this->input->post();
      $this->form_validation->run('daftar') ? $run($daftar($post)) : $this->setformerror('daftar');
    }else{
      $prop = $this->viewprop->common();
      $prop['action'] = 'daftar';
      $prop = $this->viewprop->setformerror($prop);
      view('public/daftar',$prop);
      $this->viewprop->resetformerror();
    }
  }
//  isi database konten bukan lagi berupa teks biasa tapi json object untuk quilljs
  public function tentang(){
    $prop = $this->viewprop->common();
    $prop['konten'] = $this->M_konten->readKonten('tentang', FALSE);
    view('public.tentang',$prop);
  }
  public function peraturan(){
    $prop = $this->viewprop->common();
    $prop['list'] = $this->M_konten->readKonten('peraturan', FALSE);
    view('public.peraturan',$prop);
  }
  public function lihatPeraturan($id){
    $result = $this->M_konten->readKonten(FALSE, $id);
    $filePeraturan = ($result->konten);
    $file = $filePeraturan;
    $filename = $filePeraturan;
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    @readfile($file);
  }
}