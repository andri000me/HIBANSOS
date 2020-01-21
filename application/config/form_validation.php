<?php
$config = [
    'login'=>[
        [
            'field'=>'username',
            'rules'=>'required',
        ],
        [
            'field'=>'password',
            'rules'=>'required',
        ]
    ],
    'daftar'=>[
        [
            'field'=>'nama',
            'rules'=>'required',
        ],
        [
            'field'=>'noKtp',
            'rules'=>'required|exact_length[16]|numeric|is_unique[user.noKtp]',
            'errors'=>['is_unique'=>'Nomor ktp terdaftar','exact_length'=>'Harus 16 karakter berupa angka']
        ],
        [
            'field'=>'telepon',
            'rules'=>'required|min_length[9]|max_length[12]|numeric|is_unique[user.telepon]',
            'errors'=>['is_unique'=>'Nomor telepon terdaftar','min_length'=>'Nomor telepon maksimal 9 angka','max_length'=>'Nomor telepon maksimal 12 angka']
        ],
        [
            'field'=>'email',
            'rules'=>'required|valid_email|is_unique[user.email]',
            'errors'=>['valid_email'=>'Berikan alamat email valid','is_unique'=>'Alamat email terdaftar']
        ],
        [
            'field'=>'alamat',
            'rules'=>'required',
        ],
        [
            'field'=>'username',
            'rules'=>'required|is_unique[user.username]',
        ],
        [
            'field'=>'password',
            'rules'=>'required|min_length[5]',
        ],
        [
            'field'=>'k-password',
            'rules'=>'required|matches[password]|min_length[5]',
        ]
    ],
    'tambahoperator'=>[
        [
            'field'=>'nama',
            'rules'=>'required',
        ],
        [
            'field'=>'noKtp',
            'rules'=>'required|exact_length[16]|numeric|is_unique[user.noKtp]',
            'errors'=>['is_unique'=>'Nomor ktp terdaftar','exact_length'=>'Harus 16 karakter berupa angka']
        ],
        [
            'field'=>'telepon',
            'rules'=>'required|min_length[9]|max_length[12]|numeric|is_unique[user.telepon]',
            'errors'=>['is_unique'=>'Nomor telepon terdaftar']
        ],
        [
            'field'=>'email',
            'rules'=>'required|valid_email|is_unique[user.email]',
            'errors'=>['is_unique'=>'Alamat email terdaftar']
        ],
        [
            'field'=>'alamat',
            'rules'=>'required',
        ],
        [
            'field'=>'username',
            'rules'=>'required|is_unique[user.username]',
        ],
        [
            'field'=>'password',
            'rules'=>'required|min_length[5]',
        ],
        [
            'field'=>'k-password',
            'rules'=>'required|matches[password]',
        ],
        [
            'field'=>'role_id',
            'rules'=>'required',
        ]
    ],
    'editoperator'=>[
        [
            'field'=>'nama',
            'rules'=>'required',
        ],
        [
            'field'=>'noKtp',
            'rules'=>'required|exact_length[16]|numeric|callback_is_bolehupdate[user.noKtp]',
            'errors'=>['is_bolehupdate'=>'Nomor ktp terdaftar','exact_length'=>'Harus 16 karakter berupa angka']
        ],
        [
            'field'=>'telepon',
            'rules'=>'required|min_length[9]|max_length[12]|numeric|callback_is_bolehupdate[user.telepon]',
            'errors'=>['is_bolehupdate'=>'Nomor telepon terdaftar']
        ],
        [
            'field'=>'email',
            'rules'=>'required|valid_email|callback_is_bolehupdate[user.email]',
            'errors'=>['is_bolehupdate'=>'Alamat email terdaftar']
        ],
        [
            'field'=>'alamat',
            'rules'=>'required',
        ],
        [
            'field'=>'username',
            'rules'=>'required|callback_is_bolehupdate[user.username]',
            'errors'=>['is_bolehupdate'=>'Username telah terdaftar']
        ],
        [
            'field'=>'password',
            'rules'=>'required',
        ],
        [
            'field'=>'k-password',
            'rules'=>'required|matches[password]',
        ],
        [
            'field'=>'role_id',
            'rules'=>'required',
        ]
    ],
    'tambahproposal'=>[
        [
            'field'=>'judulKegiatan',
            'rules'=>'required',
        ],
        [
            'field'=>'nama',
            'rules'=>'required',
        ],
        [
            'field'=>'deskripsiDana',
            'rules'=>'required',
        ],
        [
            'field'=>'dana',
            'rules'=>'required|numeric',
        ],
        [
            'field'=>'alamat',
            'rules'=>'required',
        ],
        [
            'field'=>'latarBelakang',
            'rules'=>'required',
        ],
        [
            'field'=>'maksudTujuan',
            'rules'=>'required',
        ],
        [
            'field'=>'fileProposal',
            'rules'=>'callback_onlypdf',
        ],
        [
            'field'=>'foto',
            'rules'=>'callback_onlyfoto',
        ],
        [
            'field'=>'tglKegiatan',
            'rules'=>'required',
        ],
    ],
    'periksatu/setda'=>[
        [
            'field'=>'kategoriPemeriksaanTUSETDA',
            'rules'=>'required|less_than_equal_to[35]|greater_than_equal_to[-1]',
            "errors"=>["required"=>"Wajib pilih salah satu",'less_than_equal_to'=>'Terjadi kesalahan silahkan coba lagi',"greater_than_equal_to"=>'Terjadi kesalahan silahkan coba lagi']
        ],
    ],
    'periksaskpd'=>[
        [
            'field'=>'persyaratanAdministrasi[]',
            'rules'=>'required|callback_cekpersyaratan_skpd[administrasi]',
            "errors"=>['cekpersyaratan_skpd'=>'Pastikan semua terisi']
        ],
        [
            'field'=>'pengecekanDokumen[]',
            'rules'=>'required|callback_cekpersyaratan_skpd[dokumen]',
            "errors"=>['cekpersyaratan_skpd'=>'Pastikan semua terisi']
        ],
        [
            'field'=>'danaRekomendasiSKPD',
            'rules'=>'callback_cekpersyaratan_skpd[dana]',
            "errors"=>['cekpersyaratan_skpd'=>'Dana rekomendasi tidak lebih besar dari dana yang di ajukan']
        ],
        [
            'field'=>'kategoriPemeriksaanSKPD',
            'rules'=>'required',
            "errors"=>['required'=>'Pilih salah satu']
        ],
        [
            'field'=>'dana-awal',
            'rules'=>'required',
            "errors"=>['required'=>'Terjadi kesalahan coba lagi']
        ],
    ],
    'periksaTAPD'=>[
        [
            'field'=>'keterangan',
            'rules'=>'required',
            "errors"=>['required'=>'Isi keterangan pemeriksaan']
        ],
        [
            'field'=>'danaEvaluasiTAPD',
            'rules'=>'callback_cekpersyaratan_skpd[dana]',
            "errors"=>['cekpersyaratan_skpd'=>'Dana rekomendasi tidak lebih besar dari dana yang di ajukan pengaju / SKPD']
        ],
        [
            'field'=>'dana-awal',
            'rules'=>'required',
            "errors"=>['required'=>'Terjadi kesalahan coba lagi']
        ],
    ],
    'bupati'=>[
        [
            'field'=>'keterangan',
            'rules'=>'required',
            "errors"=>['required'=>'Isi keterangan pemeriksaan']
        ],
    ],
    'monitoring_1'=>[
        [
            'field'=>'nomor',
            'rules'=>'required',
            "errors"=>['required'=>'Isi nomor surat']
        ],
        [
            'field'=>'alamatPenerima',
            'rules'=>'required',
            "errors"=>['required'=>'Isi alamat penerima']
        ],
        [
            'field'=>'ketua',
            'rules'=>'required',
            "errors"=>['required'=>'Isi ketua/pimpinan']
        ],
        [
            'field'=>'namaPenerima',
            'rules'=>'required',
            "errors"=>['required'=>'Isi nama penerima dana']
        ],
        [
            'field'=>'danaDiterima',
            'rules'=>'required',
            "errors"=>['required'=>'Sertakan dana yang diterima']
        ],
        [
            'field'=>'poin1',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin1]',
            "errors"=>[
                'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai',
                'required'=>'Wajib pilih salah satu'
            ]
        ],
        [
            'field'=>'poin2',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin2]',
            "errors"=>['ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai',
                'required'=>'Wajib pilih salah satu'
            ]
        ],
        [
            'field'=>'poin3',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin3]',
            "errors"=>[
                'required'=>'Wajib pilih salah satu'
              , 'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
        [
            'field'=>'poin4a',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin4a]',
            "errors"=>[
                'required'=>'Wajib pilih salah satu',
                'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
        [
            'field'=>'poin4b',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin4b]',
            "errors"=>[
                'required'=>'Wajib pilih salah satu',
                'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
        [
            'field'=>'poin5',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin5]',
            "errors"=>[
                'required'=>'Wajib pilih salah satu',
              'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
        [
            'field'=>'poin6',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin6]',
            "errors"=>[
                'required'=>'Wajib pilih salah satu',
              'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
    ],
    'monitoring_2'=>[
        [
            'field'=>'poin7',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin7]',
            "errors"=>[
                'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai',
                'required'=>'Wajib pilih salah satu'
            ]
        ],
        [
            'field'=>'poin8a',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin8a]',
            "errors"=>['ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai',
                'required'=>'Wajib pilih salah satu'
            ]
        ],
        [
            'field'=>'poin8b',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin8b]',
            "errors"=>[
                'required'=>'Wajib pilih salah satu'
              , 'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
        [
            'field'=>'poin8b1',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin8b1]',
            "errors"=>[
                'required'=>'Wajib pilih salah satu',
                'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
        [
            'field'=>'poin8b2',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin8b2]',
            "errors"=>[
                'required'=>'Wajib pilih salah satu',
                'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
        [
            'field'=>'poin8b3',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin8b3]',
            "errors"=>[
                'required'=>'Wajib pilih salah satu',
                'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
        [
            'field'=>'poin8b4',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin8b4]',
            "errors"=>[
                'required'=>'Wajib pilih salah satu',
                'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
        [
            'field'=>'poin9',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin9]',
            "errors"=>[
                'required'=>'Wajib pilih salah satu',
                'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
        [
            'field'=>'poin10',
            'rules'=>'required|callback_ceksyarat_auditor[progresPoin10]',
            "errors"=>[
                'required'=>'Wajib pilih salah satu',
                'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
        [
            'field'=>'keterangan',
            'rules'=>'required',
            "errors"=>[
                'required'=>'Wajib pilih salah satu',
                'ceksyarat_auditor'=>'Sertakan angka 1-100 bila ada/sesuai']
        ],
    ],
    'editproposal'=>[
        [
            'field'=>'judulKegiatan',
            'rules'=>'required',
        ],
        [
            'field'=>'nama',
            'rules'=>'required',
        ],
        [
            'field'=>'deskripsiDana',
            'rules'=>'required',
        ],
        [
            'field'=>'dana',
            'rules'=>'required|numeric',
        ],
        [
            'field'=>'alamat',
            'rules'=>'required',
        ],
        [
            'field'=>'latarBelakang',
            'rules'=>'required',
        ],
        [
            'field'=>'maksudTujuan',
            'rules'=>'required',
        ],
        [
            'field'=>'fileProposal',
            'rules'=>'callback_editonlypdf',
        ],
        [
            'field'=>'foto',
            'rules'=>'callback_editonlyfoto',
        ],
        [
            'field'=>'tglKegiatan',
            'rules'=>'required',
        ],
    ],
];