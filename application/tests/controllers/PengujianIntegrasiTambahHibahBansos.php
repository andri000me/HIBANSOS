<?php


use Symfony\Component\HttpClient\HttpClient;

class PengujianIntegrasiTambahHibahBansos extends UnitTestCase
{
    private function makeRequest() : string {
        $client = HttpClient::create();
        $response = $client->request('GET', base_url(),[
            'verify_peer'=>false
        ]);
        $headers= explode(';',$response->getHeaders()['set-cookie'][0]);
        $client->request('GET', base_url('testing/tambah_hibah_bansos'),[
            'verify_peer'=>false,
            'headers'=>['cookie'=>$headers[0]]
        ]);
        return $headers[0];
    }
    public function colormessages ($message){
        echo "\e[42m $message \e[0m\n ";
    }
    public function codeToSymbol($em) {
        if($em > 0x10000) {
            $first = (($em - 0x10000) >> 10) + 0xD800;
            $second = (($em - 0x10000) % 0x400) + 0xDC00;
            return json_decode('"' . sprintf("\\u%X\\u%X", $first, $second) . '"');
        } else {
            return json_decode('"' . sprintf("\\u%X", $em) . '"');
        }
    }
    public function setUp() : void
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
    }
    final public function test_no1() : void{
        echo "\n";
        $ci_session = $this->makeRequest();
        $client = new GuzzleHttp\Client();

        $response = $client->request('POST',base_url('tambahHibahBansos'),[
            'headers'=>['cookie'=>$ci_session],
            'verify' => false,
            'multipart' => [
                ['name'=> 'fileProposal', 'contents' => file_get_contents('https://upload.wikimedia.org/wikipedia/en/a/a9/Example.jpg'),],
                ['name'=> 'foto', 'contents' => file_get_contents('https://upload.wikimedia.org/wikipedia/en/a/a9/Example.jpg'),
                ],
                ['name'=>'judulKegiatan', 'contents'=>'test case'],
                ['name'=>'nama', 'contents'=>'test case'],
                ['name'=>'deskripsiDana','contents'=>'test case'],
                ['name'=>'dana','contents'=>'1000000'],
                ['name'=>'alamat','contents'=>'test case'],
                ['name'=>'latarBelakang','contents'=>'test case test case test case'],
                ['name'=>'latarBelakang','contents'=>'test case test case test case'],
                ['name'=>'tglKegiatan','contents'=>'2019-10-09'],
                ['name'=>'maksudTujuan','contents'=>'test case test case'],
            ]
        ]);

        $body = $response->getBody();

        $this->assertStringContainsString('pastikan file berekstensi pdf', $body);
        $this->assertStringContainsString('pastikan berekstensi (jpg, jpeg, png)', $body);

        $this->colormessages('1. User mengupload file proposal ');
        $this->colormessages('Expected Proposal gagal diupload, sistem ');
        $this->colormessages('Status : valid'.$this->codeToSymbol(0x2713));

    }
    public function test_no2(): void{
        echo "\n";
        $ci_session = $this->makeRequest();
        $client = new GuzzleHttp\Client();

        $response = $client->request('GET',base_url('tambahHibahBansos'),[
            'verify'=>false,
            'headers'=>['cookie'=>$ci_session],

        ]);

        $body = $response->getBody();

        $this->assertStringContainsString('Tambah proposal', $body);

        $this->colormessages('2. User mengupload file proposal ');
        $this->colormessages('Expected : menampilkan halaman tambahproposal');
        $this->colormessages('Status : valid'.$this->codeToSymbol(0x2713));
    }
    public function test_no3() : void{

        echo "\n";
        $ci_session = $this->makeRequest();
        $client = new GuzzleHttp\Client();

        $response = $client->request('POST',base_url('tambahHibahBansos'),[
            'headers'=>['cookie'=>$ci_session],
            'verify' => false,
            'form_params' => [
                ['name'=>'judulKegiatan', 'contents'=>'test case'],
                ['name'=>'nama', 'contents'=>'test case'],
                ['name'=>'deskripsiDana','contents'=>'test case'],
                ['name'=>'dana','contents'=>'1000000'],
                ['name'=>'alamat','contents'=>'test case'],
                ['name'=>'latarBelakang','contents'=>'test case test case test case'],
                ['name'=>'latarBelakang','contents'=>'test case test case test case'],
                ['name'=>'tglKegiatan','contents'=>'2019-10-09'],
                ['name'=>'maksudTujuan','contents'=>'test case test case'],
            ]
        ]);

        $body = $response->getBody();

        $this->assertStringContainsString('Harap isi bidang ini', $body);

        $this->colormessages('3. User mengupload file proposal ');
        $this->colormessages('Expected : Data yang diberikan tidak sesuai dan menampilkan pesan error, sistem mengembalikkan user ke halaman tambahproposal.');
        $this->colormessages('Status : valid'.$this->codeToSymbol(0x2713));
    }
    public function test_no4():void {
        echo "\n";
        $ci_session = $this->makeRequest();
        $client = new GuzzleHttp\Client();

        $response = $client->request('POST',base_url('tambahHibahBansos'),[
            'headers'=>['cookie'=>$ci_session],
            'verify' => false,
            'multipart' => [
                [
                    'name'=> 'fileProposal',
                    'contents' => file_get_contents('https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'),
                    'filename'=>'file.pdf'
                ]
                ,
                [
                    'name'=> 'foto',
                    'filename'=>'foto.jpg',
                    'contents' => file_get_contents('https://upload.wikimedia.org/wikipedia/en/a/a9/Example.jpg'),
                ],
                ['name'=>'judulKegiatan', 'contents'=>'test case'],
                ['name'=>'nama', 'contents'=>'test case'],
                ['name'=>'deskripsiDana','contents'=>'test case'],
                ['name'=>'dana','contents'=>'1000000'],
                ['name'=>'alamat','contents'=>'test case'],
                ['name'=>'latarBelakang','contents'=>'test case test case test case'],
                ['name'=>'latarBelakang','contents'=>'test case test case test case'],
                ['name'=>'tglKegiatan','contents'=>'2019-10-09'],
                ['name'=>'maksudTujuan','contents'=>'test case test case'],

            ]
        ]);

        $body = $response->getBody();

        $model = $this->newModel('M_hibahbansos');

        $data = $model->readHibahBansos(false, false, false, false , 'test case');

        $this->assertGreaterThanOrEqual(1,count($data));
        $this->assertStringContainsString('Proposal saya', $body);

        $this->colormessages('4. User mengupload file proposal ');
        $this->colormessages('Expected File proposal berhasil diupload ke database. Sistem menampilkan halaman proposalsaya');
        $this->colormessages('Status : valid'.$this->codeToSymbol(0x2713));
    }
}