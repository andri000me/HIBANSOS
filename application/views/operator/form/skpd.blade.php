@php
    $administrasi = ['Akta Notaris Pendirian Lembaga','Surat Pernyataan Tanggung Jawab','Nomor Pokok Wajib Pajak','Surat Keterangan Domisili Lembaga dari Desa / Kelurahan Setempat
    ',' Izin Operasional Tanda Daftar Lembaga dari Instansi yang Berwenang','Bukti Kontrak Sesuai Gedung/Bangunan Bagi Lembaga yang Kantornya Menyewa','Salinan Fotocopy KTP Atas Nama Ketua dan Sekretaris','Salinan Rekening Bank yang Masih Aktif Atas Nama Lembaga dan/atau Pengurus Belanja Hibah'.''];
$dokumen = ['Proposal Hibah Bansos', 'Surat Keterangan Tanggung Jawab', 'Surat Keterangan Kesediaan Menyediakan Dana Pendamping','Gambar Rencana dan Konstruksi Bangunan']

@endphp
@extends('operator.form.layout')
@section('title','Periksa TU')
@section('form')
    @component('operator.modalrevisi',$proposal)@endcomponent
    <form action="{{base_url(uri_string())}}" method="post">
        <a href="{{base_url('pemeriksaan')}}" class="btn mr-1 btn-sm btn-info">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
        <button type="button" data-toggle="modal" data-target="#modal-tolak" class="btn mx-1 btn-sm btn-danger">
            <i class="fas fa-trash-alt"></i>            Tolak
        </button>
        <button id="submit" type="submit" class="btn mx-1 btn-sm btn-main-2">
            <i class="fas fa-save"></i>
            Kirim ke tim TAPD
        </button>
        @if ( $proposal['revisi_count']<2)
            <button type="button" class="btn btn-main1 btn-sm mx-1" data-toggle="modal" data-target="#modal-revisi" > Revisi</button>
        @endif
        <div class="row mt-3">
            <div class="col-6 mt-2">
                <h3 class="h3-responsive">Persyaratan administrasi</h3>
                <hr>
                @if(isset($formerror['persyaratanAdministrasi[]']))
                    <p class="text-danger">{{$formerror['persyaratanAdministrasi[]']}}</p>
                @endif
                @foreach ($administrasi as $value =>$text)
                    @php $cid = uniqid() @endphp
                    <div class="custom-control custom-checkbox">
                        <input value="{{$value+1}}"
                               @if (in_array($value+1,$preval['persyaratanAdministrasi']??[]))
                               checked
                               @endif
                               name="persyaratanAdministrasi[]" type="checkbox" class="custom-control-input
                               @if (isset($preval['persyaratanAdministrasi']) && isset($formerror['persyaratanAdministrasi[]']))
                        @if (! in_array($value+1,$preval['persyaratanAdministrasi']))
                                is-invalid
                                @endif
                        @endif
                                " id="{{$cid}}">
                        <label class="custom-control-label" for="{{$cid}}">{{$text}}</label>
                    </div>
                @endforeach
                @if ($proposal['is_revisi'])
                    <table class="table mt-3 w-100 table-borderless">
                        <tr><th class="p-0">Catatan revisi</th>
                        </tr>
                        <tr>
                            <td> {{$proposal['revisi_note']}}</td>
                        </tr>
                    </table>
                @endif
            </div>
            <div class="col-6 mt-2">
                <h3 class="h3-responsive">Pengecekan dokumen</h3>
                <hr>
                @if(isset($formerror['pengecekanDokumen[]']))
                    <p class="text-danger">{{$formerror['pengecekanDokumen[]']}}</p>
                @endif
                @foreach ($dokumen as $value=>$option)
                    @php $cid = uniqid() @endphp
                    <div class="custom-control custom-checkbox">
                        <input
                                @if (in_array($value+1,$preval['pengecekanDokumen']??[])) checked @endif
                        value="{{$value+1}}"
                                name="pengecekanDokumen[]" type="checkbox"
                                class="custom-control-input
                               @if (isset($preval['pengecekanDokumen']) && isset($formerror['pengecekanDokumen[]'])) @if (! in_array($value+1,$preval['pengecekanDokumen']))
                                        is-invalid @endif @endif"
                                id="{{$cid}}">
                        <label class="custom-control-label" for="{{$cid}}">{{$option}}</label>
                    </div>
                @endforeach
                <span>Kategori : </span>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio"
                           @if (isset($preval['kategoriPemeriksaanSKPD']))
                           @if ($preval['kategoriPemeriksaanSKPD'] == 1)
                           checked
                           @endif
                           @endif
                           class="custom-control-input"
                           value="1" id="defaultInline1"
                           name="kategoriPemeriksaanSKPD">
                    <label class="custom-control-label" for="defaultInline1">Hibah</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                            @if (isset($preval['kategoriPemeriksaanSKPD']))
                            @if ($preval['kategoriPemeriksaanSKPD'] == 2)
                            checked
                            @endif
                            @endif
                            type="radio" class="custom-control-input" value="2" id="defaultInline2" name="kategoriPemeriksaanSKPD">
                    <label class="custom-control-label" for="defaultInline2">Bantuan sosial</label>
                </div>
                <small class="d-block {{isset($formerror['kategoriPemeriksaanSKPD'])? "text-danger":''}}">Pilih salah satu</small>
                <h3 class="h3-responsive mt-2">Rekomendasi dana</h3>
                <hr>
                <div class="md-form input-group mb-3">
                    <input type="hidden" value="{{$proposal['dana']}}" name="dana-awal" id="dana-awal">
                    <div class="input-group-prepend">
                        <span class="input-group-text md-addon">Rp</span>
                    </div>
                    <input type="text" name="danaRekomendasiSKPD" id="rekomendasi-dana" max="{{$proposal['dana']}}" placeholder="{{str_replace("Rp", "",rupiah($proposal['dana']))}} (dana diajukan)" class="form-control" aria-label="Biarkan kosong bila tidak memberikan rekomendasi dana">
                </div>
                <small id="rekomendasi-info-1" class="d-block">* Biarkan kosong bila tidak memberikan rekomendasi dana</small>
                <small id="rekomendasi-info-2" class="d-block {{isset($formerror['danaRekomendasiSKPD'])? "text-danger":''}}">* Rekomendasi dana tidak boleh lebih besar dari yang diajukan</small>
            </div>
            <div class="col-12 mt-2">
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script type="application/javascript" src="{{base_url('assets/js/pemeriksaan/skpd.js')}}"></script>
@stop