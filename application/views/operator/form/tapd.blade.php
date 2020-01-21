@extends('operator.form.layout')
@section('title','Periksa TAPD')
@section('customtd')
    <div class="col-md-12">
        <p class="p-1 border-bottom text-capitalize">Rekomendasi SKPD</p>
        <p class="p-1">
            {{rupiah($proposal['danaRekomendasiSKPD'])}}
        </p>
    </div>
@endsection
@section('form')
    <form action="{{base_url(uri_string())}}" method="post" novalidate>
        <input type="hidden" name="dana-awal" value="{{$proposal['danaRekomendasiSKPD']}}">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="md-form">
                    <input type="number"
                           placeholder="Koreksi dana maximal ({{rupiah($proposal['danaRekomendasiSKPD'])}})"
                           @if (isset($preval['danaEvaluasiTAPD']))
                           value="{{$preval['danaEvaluasiTAPD']}}"
                           @endif
                           min="0"
                           max="{{(int)$proposal['danaRekomendasiSKPD']}}"
                           id="danaEvaluasiTAPD"
                           name="danaEvaluasiTAPD"
                           class="form-control ">
                    <label for="danaEvaluasiTAPD">Wajib di isi</label>
                    <small class="@if (isset($formerror['danaEvaluasiTAPD'])) text-danger @else text-muted @endif">
                        @if (isset($formerror['danaEvaluasiTAPD']))
                            {{$formerror['danaEvaluasiTAPD']}}
                        @else
                            Kosongkan apabila tidak memberikan rekomendasi
                        @endif
                    </small>
                </div>
                <div class="md-form">
                    <textarea id="form7" class="md-textarea form-control" name="keterangan" placeholder="Keterangan" rows="3"></textarea>
                    <label for="form7" class=" @if (isset($formerror['keterangan'])) text-danger @endif">Wajib di isi</label>
                </div>
                <a href="{{base_url('pemeriksaan')}}" class="btn mr-1 btn-sm btn-info">Kembali</a>
                <button type="button" data-toggle="modal" data-target="#modal-tolak" class="btn mx-1 btn-sm btn-danger">
                    <i class="fas fa-trash-alt"></i>            Tolak
                </button>
                <button type="submit" class="btn mx-1 btn-sm btn-main-2">Verifikasi</button>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script type="application/javascript" src="{{base_url('assets/js/pemeriksaan/tu.js')}}"></script>
@stop