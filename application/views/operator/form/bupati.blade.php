@extends('operator.form.layout')
@section('title','Periksa TAPD')
@section('customtd')
    <div class="col-md-6">
        <p class="p-1 border-bottom text-capitalize">Rekomendasi SKPD</p>
        <div>
            {{rupiah($proposal['danaRekomendasiSKPD'])}}
        </div>
    </div>
    <div class="col-md-6">
        <p class="p-1 border-bottom text-capitalize">Evaluasi TAPD</p>
        <div>
            <p class="p-1">{{rupiah($proposal['danaEvaluasiTAPD'])}}</p>
        </div>
    </div>
@endsection
@section('form')
    <form action="{{base_url(uri_string())}}" method="post" novalidate>
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="md-form">
                    <textarea id="form7" class="md-textarea form-control" name="keterangan" placeholder="Keterangan" rows="3"></textarea>
                    <label for="form7" class=" @if (isset($formerror['keterangan'])) text-danger @endif">Wajib di isi</label>
                </div>
                <a href="{{base_url('pemeriksaan')}}" class="btn mr-1 btn-sm btn-info">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
                <button type="button" data-toggle="modal" data-target="#modal-tolak" class="btn mx-1 btn-sm btn-danger">
                    <i class="fas fa-trash-alt"></i>            Tolak
                </button>
                <button type="submit" class="btn mx-1 btn-sm btn-main-2">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script type="application/javascript" src="{{base_url('assets/js/pemeriksaan/tu.js')}}"></script>
@stop