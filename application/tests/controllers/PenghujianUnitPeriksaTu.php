<?php

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;

class PenghujianUnitPeriksaTu extends TestCase
{

    private function makeRequest() : string {
        $client = HttpClient::create();
        $response = $client->request('GET', base_url(),[
            'verify_peer'=>false
        ]);
        $headers= explode(';',$response->getHeaders()['set-cookie'][0]);
        $client->request('GET', base_url('testing/periksatu'),[
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

    final public function test_no1() : void {
        echo "\n";
        $client = HttpClient::create();
        $ci_session = $this->makeRequest();

        $options = [
            'verify_peer'=>false,
            'headers'=>['cookie'=>$ci_session]
        ];

        $res = $client->request('GET',base_url('periksa/tu/pasti_gak_ketemu_karna_string'),$options);

        $body = $res->getContent();

        $this->assertStringContainsString('Proposal tidak di temuka',$body);

        $this->colormessages('1. Proposal yang diminta tidak ditemukan '. $this->codeToSymbol(0x2713));
    }
    final public function test_no2() : void {
        echo "\n";
        $client = HttpClient::create();
        $ci_session = $this->makeRequest();

        $options = [
            'verify_peer'=>false,
            'headers'=>['cookie'=>$ci_session],
            'body'=>[
                'kategoriPemeriksaanTUSETDA'=>3,
            ]
        ];

        $res = $client->request('POST',base_url('periksa/tu/4'),$options);

        $body = $res->getContent();

        $this->assertStringContainsString('Proposal dilanjutkan tahap berikutnya',$body);

        $this->colormessages('2. Operator TU memilih proposal yang akan dilakukan pemeriksaan. User memilih salah satu kategori OPD.'. $this->codeToSymbol(0x2713));
    }
    final public function test_no3() : void {
        echo "\n";
        $client = HttpClient::create();
        $ci_session = $this->makeRequest();

        $options = [
            'verify_peer'=>false,
            'headers'=>['cookie'=>$ci_session],
            'body'=>[
                'kategoriPemeriksaanTUSETDA'=>-1,
            ]
        ];

        $res = $client->request('POST',base_url('periksa/tu/4'),$options);

        $body = $res->getContent();

        $this->assertStringContainsString('Proposal dilanjutkan tahap berikutnya',$body);

        $this->colormessages('3. User memilih proposal yang akan dilakukan pemeriksaan. User menekan tombol lanjut ke asisten.'. $this->codeToSymbol(0x2713));
    }

}