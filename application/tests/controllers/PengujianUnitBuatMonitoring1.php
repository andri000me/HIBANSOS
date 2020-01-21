<?php


use Symfony\Component\HttpClient\HttpClient;

class PengujianUnitBuatMonitoring1 extends UnitTestCase
{

    private function makeRequest() : string {
        $client = HttpClient::create();
        $response = $client->request('GET', base_url(),[
            'verify_peer'=>false
        ]);
        $headers= explode(';',$response->getHeaders()['set-cookie'][0]);
        $client->request('GET', base_url('testing/monitoring1'),[
            'verify_peer'=>false,
            'headers'=>['cookie'=>$headers[0]]
        ]);
        return $headers[0];
    }
    private function colormessages ($message) : void {
        echo "\e[42m $message \e[0m\n ";
    }
    private function codeToSymbol($em) :string {
        if($em > 0x10000) {
            $first = (($em - 0x10000) >> 10) + 0xD800;
            $second = (($em - 0x10000) % 0x400) + 0xDC00;
            return json_decode('"' . sprintf("\\u%X\\u%X", $first, $second) . '"');
        } else {
            return json_decode('"' . sprintf("\\u%X", $em) . '"');
        }
    }
    final public function test_no1() : void{
        echo "\n";
        $ci_session = $this->makeRequest();
        $client = new GuzzleHttp\Client();

        $response = $client->request('GET',base_url('monitoring1/pasti_gak_ketemu'),[
            'headers'=>['cookie'=>$ci_session],
            'verify' => false,
        ]);

        $body = $response->getBody();

        $this->assertStringContainsString('Tidak dapat menemukan proposal', $body);

        $this->colormessages('1. Proposal yang diminta tidak ditemukan ');
        $this->colormessages('Expected System mengembalikan user ke halaman daftar Monitoring dengan menampilkan pesan proposal tidak ditemukan. ');
        $this->colormessages('Status : valid '.$this->codeToSymbol(0x2713));
    }
    final public function test_no2() : void{
        echo "\n";
        $ci_session = $this->makeRequest();
        $client = new GuzzleHttp\Client();

        $model = $this->newModel('M_hibahbansos');

        $data = $model->readHibahBansos(['progres' => 1,'monitoring'=>0]);


        $response = $client->request('POST',base_url('monitoring1/'). $data['idHibahBansos'],[
            'headers'=>['cookie'=>$ci_session],
            'verify' => false,
            'form_params'=>[
                'namaPenerima'=>'unit testing Nama penerima',
                'alamatPenerima'=>'unit testing Alamat penerima',
                'poin1'=>0,
                'poin2'=>0,
                'poin3'=>0,
                'poin4a'=>0,
                'poin4b'=>0,
                'poin5'=>0,
                'poin6'=>0,
                'progresPoin1'=>0,
                'progresPoin2'=>0,
                'progresPoin3'=>0,
                'progresPoin4a'=>0,
                'progresPoin4b'=>0,
                'progresPoin5'=>0,
                'progresPoin6'=>0,
            ]
        ]);

        $body = $response->getBody();

        $this->assertStringContainsString('Terdapat kesalahan input data', $body);

        $this->colormessages('3. Auditor memilih salah satu proposal');
        $this->colormessages('Expected Data yang diberikan tidak sesuai dan menampilkan pesan error.');
        $this->colormessages('Status : valid '.$this->codeToSymbol(0x2713));
    }
    final public function test_no3() : void{
        echo "\n";
        $ci_session = $this->makeRequest();
        $client = new GuzzleHttp\Client();

        $model = $this->newModel('M_hibahbansos');

        $data = $model->readHibahBansos(['progres' => 1,'monitoring'=>0]);


        $response = $client->request('POST',base_url('monitoring1/'). $data['idHibahBansos'],[
            'headers'=>['cookie'=>$ci_session],
            'verify' => false,
            'form_params'=>[
                'nomor'=>'11122221111222',
                'namaPenerima'=>'unit testing Nama penerima',
                'alamatPenerima'=>'unit testing Alamat penerima',
                'ketua'=>'unit testing Ketua/Pimpinan',
                'danaDiterima'=>'1000',
                'poin1'=>0,
                'poin2'=>0,
                'poin3'=>0,
                'poin4a'=>0,
                'poin4b'=>0,
                'poin5'=>0,
                'poin6'=>0,
                'progresPoin1'=>0,
                'progresPoin2'=>0,
                'progresPoin3'=>0,
                'progresPoin4a'=>0,
                'progresPoin4b'=>0,
                'progresPoin5'=>0,
                'progresPoin6'=>0,
            ]
        ]);

        $body = $response->getBody();

        $this->assertStringContainsString('Monitoring 1 berhasil', $body);

        $this->colormessages('2. Auditor memilih salah satu proposal');
        $this->colormessages('Expected Menambahkan data ke database dengan function createMonitoring Menampilkan pesan “Monitoring 1 Berhasil !” Menampilkan halaman daftarMonitoring');
        $this->colormessages('Status : valid '.$this->codeToSymbol(0x2713));

        $model->updateHibahBansos(['progres'=>1,'monitoring'=>0], [
            'idHibahBansos'=>$data['idHibahBansos']
        ]);
    }

}