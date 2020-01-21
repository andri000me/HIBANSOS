@extends('operator.form.layout')
@section('title','Periksa TAPD')
@section('customtd')
    <div class="col-md-12">
        <p class="p-1 border-bottom text-capitalize">Rekomendasi SKPD</p>
        <div>
            {{rupiah($proposal['danaRekomendasiSKPD'])}}
        </div>
    </div>
@endsection
@section('form')
    <div class="row">
        <div class="col-6 mx-auto">
            <h5>Hasil pemeriksaan</h5>
            <table class="table w-100">
                <tr><th>Rekomendasi Dana</th>
                    <td> {{rupiah((int)$proposal['danaEvaluasiTAPD']) }}</td>
                </tr>
                <tr><th colspan="2">Keterangan</th></tr>
                <tr>
                    <td colspan="2">
                        {{$proposal['verifikasi']['keterangan']}}
                    </td>
                </tr>
            </table>
            <a href="{{base_url('pemeriksaan')}}" class="btn mr-1 btn-sm btn-info">Kembali</a>
            <a target="_blank" href="{{base_url('verifikasi/tapd/cetakForm/'.$proposal['idHibahBansos'])}}" class="btn mx-1 btn-sm btn-main-2">
                    <i class="fas fa-print"></i>
                Cetak formulir</a>
        </div>
    </div>
@endsection
@section('script')
    <script type="application/javascript" src="{{base_url('assets/js/pemeriksaan/tu.js')}}"></script>
@stop