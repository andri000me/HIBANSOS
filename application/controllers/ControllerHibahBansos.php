<?php

use Carbon\Carbon;

class ControllerHibahBansos extends CI_Controller
{

    private $testingmode;

    public function testing1(){
        $this->load->library('unit_test');
        $this->load->model('M_user');
        $this->testingmode = true;
        $this->load->library('TambahHibahbansosTesting',['instance'=>$this]);
        $this->tambahhibahbansostesting->run();
    }

    public function testing2(){
        $this->load->library('unit_test');
        $this->load->model('M_user');
        $this->testingmode = true;
        $this->load->library('PeriksaTuTesting',['instance'=>$this]);
        $this->periksatutesting->run();
    }
    public function testing3(){
        $this->load->library('unit_test');
        $this->load->model('M_user');
        $this->testingmode = true;
        $this->load->library('Monitoring1Testing',['instance'=>$this]);
        $this->monitoring1testing->run();
    }

    /**
     * ControllerHibahbansos constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['tgl_indo','pemeriksaan']);
        $this->load->helper('nominal');
        $this->load->model('M_log');
        $this->load->model('M_hibahbansos');
        $this->load->library('Viewprop',['instance'=>$this]);
        foreach (['required'=>'Harap isi bidang ini',
                     'onlypdf'=>'Wajib di isi & pastikan file berekstensi pdf',
                     'onlyfoto'=>'Wajib di isi & pastikan berekstensi (jpg, jpeg, png)',
                     'editonlypdf'=>'Wajib di isi & pastikan file berekstensi pdf',
                     'editonlyfoto'=>'Wajib di isi & pastikan berekstensi (jpg, jpeg, png)',
                 ]
                 as $rule =>$pesan)
        {
            $this->form_validation->set_message($rule,$pesan);
        }
        $this->needlogin();
        if (uri_string() == 'pemeriksaan'){
            if ($this->session->user->role_id != null){
                if ((int) $this->session->user->role_id >7 ){
                    $this->viewprop->setnotif(400, "Halaman tidak dapat di akses");
                    redirect(base_url(), 'location',301);
                    exit();
                }
            }else{
                $this->viewprop->setnotif(400, "Halaman tidak dapat di akses");
                redirect(base_url(), 'location',301);
                exit();
            }
        }
    }
    /**
     * called @ constructor
     * beberapa fungsionalitas membutuhkan akses login, pengecekan pada fungsi ini
     */
    private function needlogin(){
        $url =explode('/',  uri_string());
        $only_user = ['tambahHibahBansos','proposalsaya'];
        if (in_array($url[0], $only_user)){
            if (!$this->session->user){
                $this->viewprop->setnotif(400, "Halaman tidak dapat di akses");
                redirect(base_url(''), 'location', 301);
                exit();

            }elseif ($this->session->user->role_id!=7){
                $this->viewprop->setnotif(400, "Halaman tidak dapat di akses");
                redirect(base_url(''), 'location', 301);
                exit();
            }
        }else{
            $only_operator = ['pemeriksaan', 'periksa', 'verifikasi','detailpemeriksaan'];
            if (in_array($url[0], $only_operator) && ! in_array(
                    $this->session->user->role_id
                    ?? -1
                    ,[1, 2, 3, 4, 5, 6, 8] )){
                $this->viewprop->setnotif(400, "Halaman tidak dapat di akses");
                redirect(base_url(''), 'location', 301);
                exit();
            }
        }
    }

    /**
     * @param $akses_role
     * parameter untuk menentukan apakah pemeriksaan / fungsi terkait sesuai dengan user yang  login
     *
     */
    private function checkoperator ($akses_role){
        $cek = ($akses_role == $this->session->user->role_id ) || $this->session->user->role_id == 1;
        if ($cek==false){
            $this->viewprop->setnotif(400, "Halaman tidak dapat diakses");
            redirect(base_url(),'location', 301);
            exit();
        }
    }

    /**
     * @param $action
     * parameter action untuk menentukan action baik di view yang akan diload dan form attribute action
     */
    private function loadview_form($action){
        $prop = $this->viewprop->common();
        $prop['action'] = $action;
        $prop = $this->viewprop->setformerror($prop);
        view('user/'.$action,$prop);

        $this->viewprop->resetformerror();
    }

    /**
     * @param $action
     * @param $proposal
     *
     * parameter action untuk menentukan action baik di view yang akan diload dan form attribute action
     * paramter proposal berupa objek mysqli berdasarkan tabel hibahbansos
     */
    private function loadviewoperator_form($action, $proposal){
        $prop = $this->viewprop->common();
        $prop['operator'] = $action;
        $prop['proposal'] =$proposal;
        $prop = $this->viewprop->setformerror($prop);
        view('operator.form.'.$action,$prop);
        $this->viewprop->resetformerror();
    }

    /**
     * @param $redirect
     * paramter redirect digunakan untuk memenuhhi pattern post redirect
     * variable redirect digunakan kemana ke redirect url
     * fungsi dijalankan ketika terdapat form yang memiliki inputan tidak sesuai dengan rules yang ditentukan
     */
    private function setformerror($redirect){
        $this->session->set_userdata([
            'formerror'=>$this->form_validation->error_array(),
            'preval'=>$this->input->post()
        ]);
        redirect($redirect, 'location', 301);
    }

    /**
     * @return bool
     * fungsi callback pada rules tambahproposal
     * mengcek apakah file yang terupload memiliki ekstensi pdf
     */
    function onlypdf(){
        $namafile = $_FILES['fileProposal']['name'];
        $tipefile =
            str_replace('application/', '',get_mime_by_extension($namafile)
            );
        return $tipefile == 'pdf';
    }
    function editonlypdf(){
        if (($_FILES['fileProposal']['size']>0)){
            return $this->onlypdf();
        }
        return true;
    }
    function editonlyfoto(){
        if (($_FILES['foto']['size']>0)){
            return $this->onlyfoto();
        }
        return true;
    }
    /**
     * @return bool
     * fungsi callback pada rules tambahproposal
     * mengecek apakah file yang terupload miliki ekstentensi foto
     */
    function onlyfoto(){
        $namafile = $_FILES['foto']['name'];
        $tipefile =
            str_replace('image/', '',get_mime_by_extension($namafile)
            );
        $tipe_foto= 'png|jpg|jpeg';
        return in_array($tipefile, explode('|', $tipe_foto));
    }

    /**
     * @param $name
     * @param $config
     * @return bool|string
     * fungsi untuk menjalankan proses upload file
     * true : mengembalikan nama file
     *
     */
    function uploadfile($name, $config){
        $this->upload->initialize($config);
        return $this->upload->do_upload($name) ?// true kembalikan nama direktori/file
            $this->upload->data()['file_name'] : false;
    }

    /**
     * @param $param
     * @param $tipe
     * @return bool
     * fungsi callback pada form validation untuk mengecek dan menset dana yang di berikan oleh admin skpd
     *
     */
    function cekpersyaratan_skpd($param, $tipe){
        $rekomendasi =$this->input->post('danaRekomendasiSKPD') ?? $this->input->post('danaEvaluasiTAPD');
        if ($tipe == 'administrasi'){
            $data = $this->input->post('persyaratanAdministrasi[]');
            if (is_array($data)){
                return ! (count($data) != 8);
            }else{
                return false;
            }
        }else if ($tipe == 'dokumen'){
            $data = $this->input->post('pengecekanDokumen[]');
            if (is_array($data)){
                return ! (count($data) != 4);
            }else{
                return false;
            }
        }else if ($rekomendasi != ""){
            if (preg_replace("/[^0-9]/", "",$rekomendasi) =="")
                return false;
            else {
                $dana_awal =(int) $this->input->post('dana-awal');
                $intRekomendasi = (int) $rekomendasi;
                return $intRekomendasi <= $dana_awal;
            }
        }
    }

    /**
     * @param $value
     * @param $progestocheck
     * @return bool
     * fungsi callback pada formvalidation pada saat melakukan monitoring
     * apbila radio di set ada maka progress harus memiliki nilai antara 1 - 100
     */
    function ceksyarat_auditor($value, $progestocheck){
        if ($value == 1){
            return !preg_replace("/[^0-9]/", "", $this->input->post($progestocheck)) =="";
        }else{
            $_POST[$progestocheck] = 0;
            return true;
        }
    }
    public function editHibahBansos($id){
        $proposal = $this->M_hibahbansos->readHibahBansos(['idHibahBansos'=>$id]);
        if ($proposal['tahapanProposal']<=1){
            $do_upload = function (){
                $konfigurasi_upload =
                    [
                        'fileProposal'=> ["allowed_types"=>"pdf", "upload_path"=>"assets/proposal/pdf"],
                        'foto'=>["allowed_types"=>"png|jpg|jpeg","max_width"=>0,"min_width"=>0, "upload_path"=>"assets/proposal/foto"]
                    ];
                $namafile = [];
                foreach ($konfigurasi_upload as $nama=>$konfigurasi){
                    $upload = $this->uploadfile($nama, $konfigurasi);
                    if ($upload){
                        $namafile [$nama] =$konfigurasi['upload_path'] . '/' .$upload;
                    }
                }
                return count($konfigurasi_upload) == count($namafile) ? $namafile : false;
            };
            if ($this->input->method() == 'post'){
                if ($this->form_validation->run('editproposal')){
                    $post = $this->input->post();
                    if ($_FILES['foto']['size']>0 && $_FILES['fileProposal']['size']>0){
                        $namafile = $do_upload();
                        if ($namafile){
                            $post = array_merge($namafile , $post);
                        }
                    }
                    $this->M_hibahbansos->updateHibahBansos($post, ["idHibahBansos" => $id]);
                    $this->viewprop->setnotif(200, "Proposal telah di edit");
                    $this->buatLog('Edit proposal : Proposal dengan id '.$id." di edit");
                    redirect(base_url('proposalsaya'), 'location', 301);
                }else{
                    $this->setformerror(uri_string());
                }
            }else{
                $view = explode('/', uri_string());
                $this->session->set_userdata('preval',$proposal);
                $this->loadview_form($view[0]);
            }
        }else{
            $this->viewprop->setnotif(400, "Proposal telah melalui tahap pemeriksaan");
            redirect(base_url('proposalsaya'), 'location', 301);    }
    }
    public function hapusProposal($id){
        $proposal = $this->M_hibahbansos->readHibahBansos(['idHibahBansos'=>$id]);
        $redirect = 'proposalsaya';
        if ($proposal!== null){
            $this->db->delete('hibahbansos',['idHibahBansos'=>$id]);
            $this->viewprop->setnotif(200, "Proposal telah di hapus");
            $this->buatLog('Hapus proposal : Proposal telah di hapus dengan id '.$id);
        }else{
            $this->viewprop->setnotif(404, "Tidak dapat menemukan proposal");
        }
        redirect(base_url($redirect),'location',301);
    }
    public function tambahHibahBansos(){
        /**
         * proses melakukan upload file & foto proposal
         * ketika salah satu file gagal melakukan proses upload , proposal tidak di tambahkan ke database
         *
         */
        $do_upload = function (){
            $konfigurasi_upload =
                [
                    'fileProposal'=> ["allowed_types"=>"pdf", "upload_path"=>"assets/proposal/pdf"],
                    'foto'=>["allowed_types"=>"png|jpg|jpeg","max_width"=>0,"min_width"=>0, "upload_path"=>"assets/proposal/foto"]
                ];
            $namafile = [];
            foreach ($konfigurasi_upload as $nama=>$konfigurasi){
                $upload = $this->uploadfile($nama, $konfigurasi);
                if ($upload){
                    $namafile [$nama] =$konfigurasi['upload_path'] . '/' .$upload;
                }
            }
            return count($konfigurasi_upload) == count($namafile) ? $namafile : false;
        };

//    proses menyimpan proposal
        $simpan = function ($data){
            $data['idYangMengajukan'] = $this->session->user->id;
            $this->M_hibahbansos->createHibahBansos($data);
            $this->buatLog("Tambah proposal : Menambah Proposal ".$this->input->post('judulKegiatan'));
            $this->viewprop->setnotif(200, "Proposal telah terdaftar ");
            return 'proposalsaya';
        };
        if ($this->input->method() == 'post'){
            if ($this->form_validation->run('tambahproposal')){
                $run = $do_upload();
                $redirect = $run ? $simpan(array_merge($run,$this->input->post())):
                    uri_string();
                !$run && $this->viewprop->setnotif(400, 'Pastikan file anda benar');
//        block code reddirect
                redirect(base_url($redirect), 'location');

            }else{
                $this->setformerror('tambahHibahBansos');
            }
        }else{
            $this->loadview_form('tambahHibahBansos');
        }
    }

    /**
     *
     */
    public function daftarProposalSaya(){
        $where = array('idYangMengajukan' => $this->session->user->id);
        $prop = $this->viewprop->common();
        $prop['list'] = $this->M_hibahbansos->readHibahBansos(false, false, $where);
        $find_notifikasi = function ($item){
            if ($item['is_revisi'] == 1)
                return true;
            if ($item['acc'] == 1 && $item['progres'] == 0)
                return true;
            if ($item['monitoring'] == 1 && $item['lpj'] == 0)
                return true;
            return false;
        };
        $prop['notifikasi_proposal']= array_filter($prop['list'],$find_notifikasi);
        view('user/proposalsaya',$prop);
    }
    public function buatProgres($id){
        $upload = $this->uploadfile('progress', ["allowed_types"=>"pdf", "upload_path"=>"assets/proposal/progress"]);
        if ($upload!=false){
            $this->M_hibahbansos->updateHibahBansos([
                'progres'=>1,
            ], ['idHibahBansos'=>$id]);
            $data = array(
                "idHibahBansos" => $id,
                "fileProgres" =>"/proposal/progress/". $upload
            );
            $this->M_hibahbansos->createProgresLPJ($data);
            $this->buatLog("Upload progress : Menambahkan Progres dengan id: ".$id);
            $this->viewprop->setnotif(200, 'Upload progress berhasil');
        }else{
            $this->viewprop->setnotif(501, 'Pastiksan file berekstensi pdf');
        }
        redirect(base_url('proposal/detail/'.$id),'location',301);
    }
    public function buatLPJ($id){
        $upload = $this->uploadfile('fileLPJ', ["allowed_types"=>"pdf", "upload_path"=>"assets/proposal/lpj"]);
        if ($upload!=false){
            $this->M_hibahbansos->updateHibahBansos([
                'lpj'=>1,
            ], ['idHibahBansos'=>$id]);
            $this->M_hibahbansos->updateProgresLPJ([
                "keterangan" => $this->input->post('keterangan'),
                "linkYoutube" => $this->input->post('linkYoutube'),
                "fileLPJ" => "/proposal/lpj/". $upload,
            ], ['idHibahBansos'=>$id]);
            $this->buatLog("Upload lpj : Menambahkan LPJ dengan id: ".$id);
            $this->viewprop->setnotif(200, 'Upload lpj berhasil');
        }else{
            $this->viewprop->setnotif(501, 'Pastiksan file berekstensi pdf');
        }
        redirect(base_url('proposal/detail/'.$id),'location',301);
    }
    public function periksa(){
        $prop = $this->viewprop->common();
        $prop['list'] = $this->M_hibahbansos->readHibahBansos();



        view('operator/periksa',$prop);
    }
    public function daftarMonitoring(){
        $this->checkoperator(8);
        $prop = $this->viewprop->common();
        $prop['list'] = $this->M_hibahbansos->readHibahBansosProgresLPJ();
        view('operator.auditor',$prop);
    }
    public function buatMonitoring1($id){
        $this->checkoperator(8);
        $proposal = $this->M_hibahbansos->readHibahBansos(['idHibahBansos'=>$id]);

        if ($proposal === null){
            $this->viewprop->setnotif(404, "Tidak dapat menemukan proposal");
            redirect('daftarMonitoring');
        }else{
            if ($this->input->method() == 'post'){
                if ($this->form_validation->run('monitoring_1')){
                    $post = $this->input->post();
                    $post['idHibahBansos'] = $proposal['idHibahBansos'];
                    $this->M_hibahbansos->createMonitoring($post);
                    $this->M_hibahbansos->updateHibahBansos(["monitoring" => 1], ["idHibahBansos" => $id]);
                    $this->buatLog("Monitoring 1 : Menambah Monitoring Tahap 1 untuk proposal id".$id);
                    $this->viewprop->setnotif(200, 'Monitoring 1 berhasil');
                    redirect(base_url('daftarMonitoring'),'location',301);
                }else{
                    $this->setformerror(current_url());
                }
            }else{
                $this->loadviewoperator_form('monitoring 1',$proposal);
            }
        }
    }
    public function buatMonitoring2($id){
        $this->checkoperator(8);
        $proposal = $this->M_hibahbansos->readHibahBansos(['idHibahBansos'=>$id]);
        if ($this->input->method() == 'post'){
            if ($this->form_validation->run('monitoring_2')){
                $post = $this->input->post();
                $this->M_hibahbansos->updateMonitoring($post, ['idHibahBansos'=>$id]);
                $this->M_hibahbansos->updateHibahBansos(["monitoring2" => 1], ["idHibahBansos" => $id]);
                $this->buatLog("Monitoring 2 : Menambah Monitoring Tahap 2 untuk proposal id".$id);
                $this->viewprop->setnotif(200, 'Monitoring 2 berhasil');
                redirect(base_url('daftarMonitoring'),'location',301);
            }else{
                $this->setformerror(current_url());
            }
        }else{
            $this->loadviewoperator_form('monitoring 2',$proposal);
        }
    }
    /*
     *Role
     * 1 Super admin
     * 2 TU
     * 3 SETDA
     * 4 SKPD
     * 5 TAPD
     * 6 BUPATI
     */
    public function periksaTU($id){
        $this->checkoperator(2);
        $where = array('idHibahBansos' => $id);
        $proposal = $this->M_hibahbansos->readHibahBansos($where);
        if ($proposal != null) {
            if ($this->input->method() == 'post')
            {
                if ($this->form_validation->run('periksatu/setda')){
                    $kategori_terpilih = $this->input->post('kategoriPemeriksaanTUSETDA');
                    $data = [
                        'tahapanProposal'=>$kategori_terpilih == -1 ? 2:3,
                        'kategoriPemeriksaanTUSETDA'=>$kategori_terpilih,
                        'acc'=>2
                    ];
                    $this->M_hibahbansos->updateHibahBansos($data, $where);
                    $data = array("idHibahBansos" => $id, "kategori" => $kategori_terpilih,"acc"=>1);
                    $pesanlog = "Proposal ".$proposal['idHibahBansos']." dilanjutkan ke asisten/setda dan dilanjutkan pada tahap 2";
                    if ($this->input->post('kategoriBansos') < 32 && $this->input->post('kategoriPemeriksaanTUSETDA')!= -1 ){
                        $this->M_hibahbansos->createPeriksaTu($data);
                        $pesanlog = "Proposal ".$proposal['idHibahBansos']." di setujui dengan kategori ".$kategori_terpilih." dan dilanjutkan pada tahap 3";
                    }elseif($cek = $this->M_hibahbansos->readPeriksaTu($where)){
                        $this->M_hibahbansos->createPeriksaTu($data);
                    }
                    $this->buatLog("Persetujuan TU : ".$pesanlog);
                    $this->viewprop->setnotif(200, 'Proposal dilanjutkan tahap berikutnya');
                    redirect(base_url('pemeriksaan'),'location',301);
                }else{
                    $this->setformerror(current_url());
                }
            }else{
                $this->loadviewoperator_form('tu',$proposal);
            }
        }
        else{
            $this->viewprop->setnotif(400, 'Proposal tidak di temukan');
            redirect(base_url('pemeriksaan'),'location','301');
        }
    }
    public function periksaTUtolak($id){
        $this->checkoperator(2);
        $this->M_hibahbansos->updateHibahBansos(
            [
                "acc" => 0,
                "alasanPenolakan" => $this->input->post('alasanPenolakan'),
                "tahapanProposal"=>1,
                "kategoriPemeriksaanTUSETDA"=>0
            ],
            ["idHibahBansos" => $id]);
        $this->M_hibahbansos->createPeriksaTu([
            "idHibahBansos" => $id,
            "acc" => 2,
        ]);
        $this->buatLog("Penolakan TU : Menolak Proposal dengan id ".$id." pada Tahap 1");
        $this->viewprop->setnotif(200, 'Proposal di tolak');
        redirect(base_url('pemeriksaan'),'location',301);
    }
    private function buatLog($kegiatan){
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
    public function periksaSETDA($id){
        $this->checkoperator(3);
        $where = array('idHibahBansos' => $id);
        $proposal = $this->M_hibahbansos->readHibahBansos($where);
        if ($proposal != null) {
            if ($this->input->method() == 'post')
            {
                if ($this->form_validation->run('periksatu/setda')){
                    $kategori_terpilih = $this->input->post('kategoriPemeriksaanTUSETDA');
                    $data = [
                        'tahapanProposal'=>3,
                        'kategoriPemeriksaanTUSETDA'=>$kategori_terpilih,
                        'acc'=>2
                    ];
                    $this->M_hibahbansos->updateHibahBansos($data, $where);
                    $data = array(
                        "idHibahBansos" => $id,
                        "kategori" => $kategori_terpilih,
                    );
                    $this->buatLog("Persetujuan Setda : Menyetujui Proposal ".$id." Tahap 2");
                    $this->M_hibahbansos->createPeriksaSetda($data);
                    $this->viewprop->setnotif(200, 'Proposal dilanjutkan tahap berikutnya');
                    redirect(base_url('pemeriksaan'),'location',301);
                }else{
                    $this->setformerror(current_url());
                }
            }else{
                $this->loadviewoperator_form('setda',$proposal);
            }
        }
        else{
            $this->viewprop->setnotif(400, 'Proposal tidak di temukan');
            redirect(base_url('pemeriksaan'),'location','301');
        }
    }
    public function periksaSKPD($id){
        $this->checkoperator(4);
        $where = array('idHibahBansos' => $id);
        $proposal = $this->M_hibahbansos->readHibahBansos($where);
        $update_proposal = function ($prop){
            $this->M_hibahbansos->updateHibahBansos($prop['data'], $prop['where']);
        };
        $insert_skpd = function ($data){
            $this->M_hibahbansos->createPeriksaSkpd($data);
        };
        if ($proposal != null) {
            if ($this->input->method() == 'post')
            {
                if ($this->form_validation->run('periksaskpd')){
                    $post = $this->input->post();
                    $update_proposal(
                        ["where"=>['idHibahBansos' =>$proposal['idHibahBansos']],
                            "data"=>
                                [
                                    'acc'=>2,
                                    'tahapanProposal'=>4,
                                    'is_revisi'=>0,
                                    "kategoriPemeriksaanSKPD"=> $post['kategoriPemeriksaanSKPD'],
                                    'danaRekomendasiSKPD'=> $post['danaRekomendasiSKPD'] == ""
                                        ?
                                        $post['dana-awal'] :
                                        $post['danaRekomendasiSKPD'],]]);
                    $insert_skpd([
                        "idHibahBansos" => $proposal['idHibahBansos'],
                        "kategoriProposal" => $post['kategoriPemeriksaanSKPD'],
                        "persyaratanAdministrasi" => implode(',', $post['persyaratanAdministrasi']),
                        "pengecekanDokumen" => implode(',', $post['pengecekanDokumen']),
                        "pemberianRekomendasiDana" => $post['danaRekomendasiSKPD'] == "" ? 0:1,
                        //                  potensi revisi * (logic sekarang : danaRekomendasiSKPD gak di isi yang masuk ke db kolom danaRekomendasiSKPD tabel periksaskpd otomatis 0)
                        "danaRekomendasiSKPD" => $post['danaRekomendasiSKPD'] == "" ? 0:$post['danaRekomendasiSKPD'],
                        "acc" => 1,
                    ]);
                    $this->buatLog("Pemeriksaan SKPD : Menyetujui Proposal ".$id." Tahap 3");
                    $this->viewprop->setnotif(200, 'Proposal dilanjutkan tahap berikutnya');
                    redirect(base_url('pemeriksaan'),'location',301);
                }else{
                    $this->setformerror(current_url());
                }
            }else{
                $this->loadviewoperator_form('skpd',$proposal);
            }
        }
        else{
            $this->viewprop->setnotif(400, 'Proposal tidak di temukan');
            redirect(base_url('pemeriksaan'),'location','301');
        }
    }
    public function verifikasiTAPD($id, $edit = null){
        $where = array('idHibahBansos' => $id);
        $proposal = $this->M_hibahbansos->readHibahBansos($where);
        if ((int)$proposal['tahapanProposal']<=4){
            $this->checkoperator(5);
        }
        $update_proposal = function ($prop){
            $this->M_hibahbansos->updateHibahBansos($prop['data'], $prop['where']);
        };
        $insert_tapd= function ($data){
            $this->M_hibahbansos->createVerivikasiTapd($data);
        };
        if ($proposal != null) {
            if ($this->input->method() == 'post')
            {
                if ($this->form_validation->run('periksaTAPD')){
                    $post = $this->input->post();
                    $update_proposal(["where"=>['idHibahBansos' =>$proposal['idHibahBansos']],
                        "data"=> ['acc'=>2,'tahapanProposal'=>5,
                            "danaEvaluasiTAPD"=>$post['danaEvaluasiTAPD'] == "" ? $post['dana-awal']:$post['danaEvaluasiTAPD'],]]);
                    $insert_tapd([
                        "idHibahBansos" => $proposal['idHibahBansos'],
                        "danaEvaluasiTAPD"=>$post['danaEvaluasiTAPD'] == "" ? $post['dana-awal']:$post['danaEvaluasiTAPD'],
                        "keterangan" => $post['keterangan'],
                        "acc" => 1,
                    ]);
                    $this->buatLog("Pemeriksaan TAPD : Menyetujui Proposal ".$id." Tahap 4");
                    $this->viewprop->setnotif(200, 'Proposal dilanjutkan tahap berikutnya');
                    redirect(base_url('pemeriksaan'),'location',301);
                }else{
                    $this->setformerror(current_url());
                }
            }else{
                if ((int)$proposal['tahapanProposal']>4 && $edit === null){
                    $prop = $this->viewprop->common();
                    $prop['proposal'] = $proposal;
                    $prop['operator'] = 'tapd';
                    $prop['proposal']['verifikasi'] = $this->M_hibahbansos->readVerivikasiTapd(['idHibahBansos'=>$proposal['idHibahBansos']]);
                    view('operator/form/tapd-1', $prop);
                }else{
                    $this->loadviewoperator_form('tapd',$proposal);
                }
            }
        }
        else{
            $this->viewprop->setnotif(400, 'Proposal tidak di temukan');
            redirect(base_url('pemeriksaan'),'location','301');
        }
    }
    public function persetujuanBUPATI($id){
        $this->checkoperator(6);
        $where = array('idHibahBansos' => $id);
        $proposal = $this->M_hibahbansos->readHibahBansos($where);
        $update_proposal = function ($id){
            $this->M_hibahbansos->updateHibahBansos(["tahapanProposal" => 6, "acc" => 1], ['idHibahBansos'=>$id]);
        };
        $insert_bupati= function ($data){
            $this->M_hibahbansos->createPersetujuanBupati($data);
        };
        if ($proposal != null){
            if ($this->input->method()=='post'){
                if ($this->form_validation->run('bupati')){
                    $update_proposal($id);
                    $insert_bupati([
                        "idHibahBansos" => $id,
                        "keterangan" => $this->input->post('keterangan'),
                        "acc" => 1,
                    ]);
                    $this->buatLog("Pemeriksaan Bupati : Menyetujui Proposal ".$id." Tahap 5");
                    $this->viewprop->setnotif(200, 'Proposal dilanjutkan tahap berikutnya');
                    redirect(base_url('pemeriksaan'),'location',301);
                }
                else{
                    $this->setformerror(current_url());
                }
            }else{
                $this->loadviewoperator_form('bupati',$proposal);
            }
        }else{
            $this->viewprop->setnotif(400, 'Proposal tidak di temukan');
            redirect(base_url('pemeriksaan'),'location','301');
        }
    }
    public function cetakFormTAPD($id){
        $where = ["idHibahBansos" => $id];
        $proposal = $this->M_hibahbansos->readHibahBansos($where);
        $tapd = $this->M_hibahbansos->readVerivikasiTapd($where);
        if ($proposal == null && $tapd == null){
            $this->viewprop->setnotif(404, 'Tidak dapat menemukan proposal');
            redirect(base_url('pemeriksaan'),'location',301);
        }else{
            view('operator.formulirtapd', ['proposal'=>$proposal,'tapd'=>$tapd]);
        }
    }
    public function periksaSETDAtolak($id){
        $this->checkoperator(3);
        $this->M_hibahbansos->updateHibahBansos(
            [ "acc" => 0, "alasanPenolakan" => $this->input->post('alasanPenolakan'),"tahapanProposal"=>2,],
            ["idHibahBansos" => $id]);
        $this->M_hibahbansos->createPeriksaSetda([
            "idHibahBansos" => $id,
            "acc" => 2,
        ]);
        $this->buatLog("Penolakan SETDA : Menolak Proposal Tahap 2");
        $this->viewprop->setnotif(200, 'Proposal di tolak');
        redirect(base_url('pemeriksaan'),'location',301);
    }
    public function periksaSKPDtolak($id){
        $this->checkoperator(4);
        $this->M_hibahbansos->updateHibahBansos([
            "acc" => 0,"is_revisi"=>0,"tahapanProposal"=>"3",
            "alasanPenolakan" => $this->input->post('alasanPenolakan')],
            ["idHibahBansos" => $id]);
        $this->M_hibahbansos->createPeriksaSkpd([
            "idHibahBansos" => $id,
            "acc" => 2,
        ]);
        $this->buatLog("Penolakan SKPD : Menolak Proposal Tahap 3");
        $this->viewprop->setnotif(200, 'Proposal di tolak');
        redirect(base_url('pemeriksaan'),'location',301);
    }
    public function verifikasiTAPDtolak($id){
        $this->checkoperator(5);
        $this->M_hibahbansos->updateHibahBansos([
            "acc" => 0,
            "tahapanProposal"=>4,
            "danaEvaluasiTAPD"=>0,
            "alasanPenolakan" => $this->input->post('alasanPenolakan')],
            ["idHibahBansos" => $id]);
        $this->M_hibahbansos->createVerivikasiTapd([
            "idHibahBansos" => $id,
            "acc" => 2,
        ]);
        $this->buatLog("Penolakan TAPD : Menolak Proposal Tahap 4");
        $this->viewprop->setnotif(200, 'Proposal di tolak');
        redirect(base_url('pemeriksaan'),'location',301);
    }
    public function persetujuanBUPATItolak($id){
        $this->checkoperator(6);
        $this->M_hibahbansos->updateHibahBansos(
            [
                "acc" => 0,
                "tahapanProposal"=>5,
                "alasanPenolakan" => $this->input->post('alasanPenolakan')],
            ["idHibahBansos" => $id]);
        $this->M_hibahbansos->createPersetujuanBupati([
            "idHibahBansos" => $id,
            "acc" => 2,
        ]);
        $this->buatLog("Penolakan bupati : Menolak Proposal Tahap 5");
        $this->viewprop->setnotif(200, 'Proposal di tolak');
        redirect(base_url('pemeriksaan'),'location',301);
    }
    public function set_revisi($id){
        $this->checkoperator(4);
        $this->M_hibahbansos->updateHibahBansos([
            "is_revisi" => 1 ,
            "acc"=>2,
            "tahapanProposal"=>3,
            "revisi_note" => $this->input->post('revisi_note'),
            'revisi_count'=>((int) $this->input->post('revisi_count'))+1
        ], ['idHibahBansos'=>$id]);
        $this->M_hibahbansos->createPeriksaSkpd([
            "idHibahBansos" => $id,
            "revisi"=>1,
        ]);
        $this->buatLog("Revisi proposal : Merevisi Proposal Tahap 3");
        $this->viewprop->setnotif(200, "Proposal di revisi");
        redirect(base_url('pemeriksaan'),'location',301);
    }
    public function upload_revisi($id){
        $upload = $this->uploadfile('fileProposal', ["allowed_types"=>"pdf", "upload_path"=>"assets/proposal/pdf"]);
        if ($upload!=false){
            $this->M_hibahbansos->updateHibahBansos([
                'is_revisi'=>2,
                'fileProposal'=>'assets/proposal/pdf/'.$upload
            ], ['idHibahBansos'=>$id]);
            $this->buatLog("Upload revisi : Mengupload Revisi Proposal ".$id);
            $this->M_hibahbansos->deleterevisi($id);
            $this->viewprop->setnotif(200, 'Upload revisi berhasil');
        }else{
            $this->viewprop->setnotif(501, 'Pastiksan file proposal berekstensi pdf');
        }
        redirect(base_url('proposal/detail/'.$id),'location',301);
    }
    public function detailPemeriksaan($id){
        $prop = $this->viewprop->common();
        $where = ['idHibahBansos'=>$id];
        $proposal =  $this->M_hibahbansos->readHibahBansos($where);
        if ($proposal!= null){
            $prop['tu']= $this->M_hibahbansos->readPeriksaTu($where);
            $prop['setda']= $this->M_hibahbansos->readPeriksaSetda($where);
            $prop['skpd']= $this->M_hibahbansos->readPeriksaSkpd($where);
            $prop['tapd'] = $this->M_hibahbansos->readVerivikasiTapd($where);
            $prop['bupati'] = $this->M_hibahbansos->readPersetujuanBupati($where);
            $prop['proposal'] = $proposal;
            if ($proposal['monitoring2'] == 1)
                $prop['lpj'] = $this->M_hibahbansos->readProgresLPJ($where, FALSE);
            view('operator.detailPemeriksaan',$prop);
        }else{
            $this->viewprop->setnotif(404, 'Proposal tidak di temukan');
            redirect(base_url('pemeriksaan'),'location',301);
        }
    }
    public function detailProposal($id){
        $prop = $this->viewprop->common();
        $where = ['idHibahBansos'=>$id];
        $proposal =  $this->M_hibahbansos->readHibahBansos($where);
        if ($proposal!= null){
            $prop['tu']= $this->M_hibahbansos->readPeriksaTu($where);
            $prop['setda']= $this->M_hibahbansos->readPeriksaSetda($where);
            $prop['skpd']= $this->M_hibahbansos->readPeriksaSkpd($where);
            $prop['tapd'] = $this->M_hibahbansos->readVerivikasiTapd($where);
            $prop['bupati'] = $this->M_hibahbansos->readPersetujuanBupati($where);
            if ($proposal['lpj'] == 1){
                $prop['lpj'] = $this->M_hibahbansos->readProgresLPJ($where, FALSE);
            }
            $prop['proposal'] = $proposal;
            view('public.detailproposal',$prop);
        }else{
            $this->viewprop->setnotif(404, 'Proposal tidak di temukan');
            redirect(base_url('pemeriksaan'),'location',301);
        }
    }
    public function daftarProposal(){
        $list = $this->M_hibahbansos->readHibahBansos();
        $prop= $this->viewprop->common();
        $prop['list'] = $list;
        $prop['key']='';
        view('public.pencarian',$prop);
    }
    public function daftarProposalPerkategori($kategori){
        $where = array('kategoriPemeriksaanTUSETDA' => $kategori);
        $list = $this->M_hibahbansos->readHibahBansos(FALSE, FALSE, $where, FALSE);
        $prop= $this->viewprop->common();
        $prop['list'] = $list;
        $prop['key']=$kategori;
        view('public.pencarian',$prop);  }
    public function daftarProposalPencarian($pencarian){
        $list = $this->M_hibahbansos->readHibahBansos(FALSE, FALSE, FALSE, $pencarian);
        $prop= $this->viewprop->common();
        $prop['list'] = $list;
        $prop['key']=$pencarian;
        view('public.pencarian',$prop);  }
    public function lihatFileProposal($id){
        $proposal = $this->M_hibahbansos->readHibahBansos([
            'idHibahBansos' => $id
        ]);
        $file = str_replace('assets', '', $proposal['fileProposal']);
        $filename = "Proposal-".$proposal['idHibahBansos']."-".$proposal['judulKegiatan'];
        $this->serve_file($filename, $file);
    }
    public function lihatFileLPJ($idHibahBansos){
        $where = array('idHibahBansos' => $idHibahBansos);
        $proposal = $this->M_hibahbansos->readHibahBansos($where, FALSE, FALSE, FALSE);
        $result = $this->M_hibahbansos->readLPJ($where);
        $file = $result['fileLPJ'];
        $filename = "LPJ-".$proposal['idHibahBansos']."-".$proposal['judulKegiatan'];
        $this->serve_file($filename, $file);
    }
    public function lihatFileProgres($id){
        $where = array('idHibahBansos' => $id);
        $proposal = $this->M_hibahbansos->readHibahBansos($where, FALSE, FALSE, FALSE);
        $result = $this->M_hibahbansos->readProgresLPJ(FALSE, $where);
        $file = $result->fileProgres;
        $filename = "Progress-".$proposal['idHibahBansos']."-".$proposal['judulKegiatan'];
        $this->serve_file($filename, $file);
    }
    private function serve_file($filename, $file){
        header('Content-Description: File Transfer');
        header("Content-Length: " . filesize ('assets'.$file ) );
        header("Content-type:application/pdf");
        header("Content-disposition: attachment;filename= $filename.pdf");
        header('Pragma: public');
        ob_clean();
        flush();
        readfile('assets/'.$file);
    }
    public function lihatMonitoring2($id){
        $where = ["idHibahBansos" => $id];
        $monitoring = $this->M_hibahbansos->readMonitoring($where);
        $monitoring['m_tahap'] = 2;
        view('public.monitoring 2',$monitoring);
    }
    public function lihatMonitoring1($id){
        $where = array("idHibahBansos" => $id);
        $data['hibahbansos'] = $this->M_hibahbansos->readHibahBansos($where, FALSE, FALSE, FALSE);
        $monitoring = $this->M_hibahbansos->readMonitoring($where);
        $monitoring['m_tahap'] = 1;
        view('public.monitoring 1',$monitoring);
    }
}