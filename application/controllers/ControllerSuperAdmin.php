<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Carbon\Carbon;
class ControllerSuperAdmin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_log');
        $this->load->model('M_konten');
        $this->load->library('Viewprop', ['instance'=>$this]);
        $this->onlypost();
        $this->cekAdministrator();
        $this->setRules();
    }
    private function setRules(){
        foreach ([
                     'required'=>'Harap isi bidang ini',
                     'is_unique'=>'Data sudah sudah terdaftar',
                     'min_length'=>'Minimal {param} karakter',
                     'max_length'=>'Maximal {param} karakter',
                     'matches'=>'Harus sama dengan {param}',
                     'numeric'=>'Harus berupa angka {param}',
                     'is_bolehupdate'=>'Data sudah terdaftar',
                     'email'=>'Berikan alamat email yang valid',
                 ]
                 as $rule =>$pesan)
        {
            $this->form_validation->set_message($rule,$pesan);
        }
    }
    private function cekAdministrator(){
        if (isset($this->session->user)){
            if (
                $this->session->user->role_id != 1
            ){
                $this->viewprop->setnotif(400, 'Halaman tidak dapat di akses');
                redirect(base_url(), 'location', 301);
                die();
            }
        }else{
            $this->viewprop->setnotif(400, 'Halaman tidak dapat di akses');
            redirect(base_url(), 'location', 301);
            die();
        }
    }
    private function onlypost(){
        if (in_array(uri_string(), ['verifikasiAkun','hapusPengguna','tambahPeraturan','hapusPeraturan']) && $this->input->method()!='post'){
            $this->viewprop->setnotif(400, 'Halaman tidak dapat di akses');
            redirect(base_url(), 'location', 301);
        }
    }
    private function readUser($userid){
        $read = $this->M_user->readUser(['id'=>$userid]);
        return $read->num_rows() == 1 ? $read->result_object() : false;
    }
    private function setformerror($redirect){
        $this->session->set_userdata([
            'formerror'=>$this->form_validation->error_array(),
            'preval'=>$this->input->post()
        ]);
        redirect($redirect, 'location', 301);
    }
    private function loadview_form($action){
        $prop = $this->viewprop->common();
        $prop['action'] = $action;
        $prop = $this->viewprop->setformerror($prop);
        view('administrator/'.$action,$prop);
        $this->viewprop->resetformerror();
    }
    function is_bolehupdate($value, $param){
        $cek = $this->M_user->readUser([$param=>$value]);
        return $cek->num_rows() == 0 || (int)$this->input->post('id') === (int)$cek->result_object()[0]->id;
    }
    public function daftarPengguna($tipe){
        $read_operator = function (){
            return  $this->M_user->readUser(FALSE, FALSE, 1);
        };
        $read_pengguna = function (){
            return $this->M_user->readUser();
        };
        $prop = $this->viewprop->common();
        $prop['tipe'] = $tipe;
        $prop['userlist'] = $tipe == 'operator' ? $read_operator() : $read_pengguna();
        view('administrator/menagemenpengguna', $prop);
    }
    public function verivikasiAkun(){
        $verifikasi = function ($user){
            if ($user->statusAktif == 0){
                if ($user->username == $this->input->post("username")){
                    $where = array('id' => $this->input->post('userid'));
                    $data = array('statusAktif' => 1);
                    $this->M_user->updateUser($data, $where);
                    $this->viewprop->setnotif(200, 'pengguna '.$this->input->post('username').' berhasil di verifikasi');
                    $this->buatLog(
                        "verifikasi pengguna : User ".$user->nama." dengan id ".$user->id." diverifikasi oleh ".$this->session->user->nama
                    );
                }else{
                    $this->viewprop->setnotif(400, 'Konfirmasi username salah');
                }
            }else{
                $this->viewprop->setnotif(400, 'pengguna '.$this->input->post('username').' sudah verifikasi');
            }
        };
        $cek = $this->readuser((int)$this->input->post('userid'));
        $cek ? $verifikasi($cek[0]) : $this->viewprop->setnotif(400, 'Tidak dapat menemukan pengguna');
        return redirect(base_url('menagemenpengguna/'. $this->input->post('referer')), 'location',301);
    }
    public function hapusPengguna(){
        $this->load->library("user_agent");
        $hapus = function ($user){
            $this->M_user->deletePengguna($user->id);
            $this->viewprop->setnotif(200, 'pengguna '.$this->input->post('username').' berhasil di Hapus');
            $this->buatLog("Hapus pengguna : User ".$user->nama." dengan id ".$user->id." di hapus oleh ".$this->session->user->nama);
        };
        $M = $this->M_user->readUser(["id"=>$this->input->post("userid")]);
        if ($M->num_rows() === 1){
                $hapus((object)$M->result_array()[0]);
        }
        redirect($this->agent->referrer(), "location", "303");
    }
    public function tambahOperator()
    {
        $daftar = function ($post){
            $post['passReal'] = $post['password'];unset($post['password']);unset($post['k-password']);
            $post['passHash'] = md5($post['passReal']);
            $post['statusAktif'] = 1;
            $cek = $this->M_user->createUser($post);
            $cek === 1 && $this->buatLog('tambah operator : Operator '.tipe_operator($post['role_id'])." telah di tambahkan");
            return $cek === 1;
        };
        if ($this->input->method() == 'post'){
            $run = function ($daftar){
                if ($daftar){
                    $this->viewprop->setnotif(200, 'Operator di tambahkan');
                }else{
                    $this->viewprop->setnotif(501, 'Terjadi kesalah silahkan coba lagi');
                }
                redirect('menagemenpengguna/operator');
            };
            $post = $this->input->post();
            $this->form_validation->run('tambahoperator') ? $run($daftar($post)) :
                $this->setformerror('tambahOperator');
        }else{
            $this->loadview_form('edit_tambahoperator');
        }
    }
    public function editOperator($id = null){
        $ispost = $this->input->method() == 'post';
        if ($id == null && !$ispost){
            $this->viewprop->setnotif(404, 'Tidak dapat mengakses halaman');
            redirect(base_url('menagemenpengguna/operator'),'location',301);
        }
        $viewform = function ($id){
            if ($user = $this->readUser((int)$id)){
                !$this->session->preval && $this->session->set_userdata(['preval'=>(array)$user[0]]);
                $this->loadview_form('edit_tambahoperator');
            }else{
                $this->viewprop->setnotif(404, 'Tidak dapat menemukan akun');
                redirect(base_url('menagemenpengguna/operator'), 'location', 301);
            }
        };
        $validasi = function ($update){
            $post = $this->input->post();
            if ($this->form_validation->run('editoperator')){
                $post['passReal'] = $post['password'];unset($post['password']);unset($post['k-password']);
                $post['passHash'] = md5($post['passReal']);
                $id = $post['id'];unset($post['id']);
                $update(['id'=>$id], $post);
            }else{
                $this->setformerror('editOperator/'.$post['id']);
            }
        };
        $update = function ($where, $data){
            $this->M_user->updateUser($data, $where);
            $this->viewprop->setnotif(200, 'User '.$data['username'].' berhasil di edit');
            $this->buatLog('Edit operator : Operator dengan id  '.$where['id'].' telah di edit');
            redirect(base_url('menagemenpengguna/operator'), 'location', 301);
        };
        $ispost ? $validasi($update) : $viewform($id);
    }
    public function pengaturanTentang(){
        $insert = function (){
            $where = array('halaman' => 'tentang');
            $data = array('konten' => $this->input->post('tentang'));
            if($insert = $this->M_konten->updateKonten($data, $where)){
                $this->buatLog("Pengaturan tentang : Mengganti isi dari informasi tentang website");
                $this->viewprop->setnotif(200, 'Halaman tentang berhasil di update');
            };
        };
        if ($this->input->method() == 'post'){
            $this->form_validation->set_rules('tentang','tentang','required');
            $this->form_validation->run()?
                $insert():$this->viewprop->setnotif(400, 'terjadi kesalahan ulangi lagi');
            redirect(base_url(uri_string()), 'location', 301);
        }else{
            $prop = $this->viewprop->common();
            $konten = $this->M_konten->readKonten('tentang', FALSE);
            if (count($konten ) == 0){
                $prop['konten'] = '';
            }else{
                $prop['konten'] = $konten[0]['konten'];
            }
            $prop['tipe'] = 'tentang';
            view('administrator.pengaturan',$prop);
        }
    }
    public function pengaturanPeraturan(){
        $prop = $this->viewprop->common();
        $prop['konten'] = $this->M_konten->readKonten('peraturan', FALSE);
        $prop['tipe'] = 'peraturan';
        view('administrator.pengaturan',$prop);
    }
    public function tambahPeraturan(){
        $upload = function (){
            $this->load->library('upload');
            $this->upload->initialize([
                'upload_path'=> 'assets/peraturan',
                'allowed_types'=>'pdf',
                'max'=>0
            ]);
            return $this->upload->do_upload('file');
        };
        $save = function (){
            $lokasiFile = 'assets/peraturan/'.$this->upload->data('file_name');
            $data = array(
                'halaman' => 'peraturan',
                'judul' => $this->input->post('judul'),
                'konten' => $lokasiFile,
                'tipe' => 2);
            $this->M_konten->createKonten($data);
            $this->buatLog("Tambah peraturan : Menambah peraturan baru dengan judul ".$data['judul']);
            $this->viewprop->setnotif(200, "Penambahan berhasil");
        };
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $cek = $this->form_validation->run();
        if ($cek){
            $run = $upload();
            $run ? $save() : $this->viewprop->setnotif(400, "Pastikan format file berbentuk pdf");
        }else{
            $this->viewprop->setnotif(500, "Kesalahan coba lagi");
        }
        redirect(base_url('pengaturanperaturan'), 'location', 301);
    }
    public function hapusPeraturan(){
        $delete = function ($data){
            $file = ($data->konten);
            $judul = ($data->judul);
            unlink($file);
            $this->M_konten->deletePeraturan($data->id);
            $this->buatLog("Hapus peraturan : Menghapus Peraturan dengan judul ".$judul);
            $this->viewprop->setnotif(200, 'Peraturan '.$judul.' dihapus');
        };
        $result = $this->M_konten->readKonten(FALSE, $this->input->post('id'));
        $result ?$delete($result) : $this->viewprop->setnotif(400, 'Tidak dapat menemukan file');
        redirect(base_url('pengaturanperaturan'),'location',301);
    }
    public function buatLog($kegiatan){
        $Carbon = new Carbon(Carbon::now(new DateTimeZone('Asia/jakarta')));
        $waktu = $Carbon->toDateTimeString();
        $data = array(
            'idUser' => $this->session->user->id,
            'pengguna' => $this->session->user->nama,
            'kegiatan' => $kegiatan,
            'waktu' => $waktu,
        );
        $this->M_log->createLog($data);
    }
    public function lihatLog(){
        $prop = $this->viewprop->common();
        $prop['logs'] =$this->M_log->readLog();
        view('administrator.log',$prop);
    }
}