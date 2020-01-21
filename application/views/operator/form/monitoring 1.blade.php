@php
    $commons = [
    ['name'=>'nomor','title'=>'Nomor surat'],
    ['name'=>'namaPenerima','title'=>'Nama penerima'],
    ['name'=>'alamatPenerima','title'=>'Alamat penerima'],
    ['name'=>'ketua','title'=>'Ketua/Pimpinan'],
    ['name'=>'danaDiterima','title'=>'Dana di terima','value'=>'1000']
    ];
    $points = [
    ['name'=>'poin1','title'=>'Proposal/Usulan Penerima Hibah/Bantuan Sosial'],
    ['name'=>'poin2','title'=>'Rekomendasi SKPD'],
    ['name'=>'poin3','title'=>'Keputusan Bupati Tentang Penetapan Daftar Penerima'],
    ['name'=>'poin4a','title'=>'a. Program Kegiatan','head'=>'Kesesuain NPHD'],
    ['name'=>'poin4b','title'=>'b. Besaran','head'=>'Kesesuain NPHD'],
    ['name'=>'poin5','title'=>'Pakta Integritas'],
    ['name'=>'poin6','title'=>'Bukti Transfer Uang Pada Hibah/Bansos Berupa Uang']];
    $progress = [
    ['name'=>'progresPoin1'],
    ['name'=>'progresPoin2'],
    ['name'=>'progresPoin3'],
    ['name'=>'progresPoin4a'],
    ['name'=>'progresPoin4b'],
    ['name'=>'progresPoin5'],
    ['name'=>'progresPoin6'],
    ];
@endphp
@extends('operator.form.layout-monitoring')
@section('title','Monitoring 1')
@section('form')
    <form action="{{current_url()}}" novalidate method="post">
        @if (isset($formerror))
            <p class="text-danger">Terdapat kesalahan input data</p>
        @endif
        @foreach ($commons as $field)
            @php $_id = uniqid()  @endphp
            <div class="form-group row">
                <div class="col-4">
                    <label for="{{$_id}}">{{$field['title']}}</label>
                </div>
                <div class="col-8">
                    <div class="md-form mt-0">
                        <input type="text"
                               @if (isset($preval[$field['name']]))
                               value="{{$preval[$field['name']]}}"
                               @endif
                               name="{{$field['name']}}"
                               class="form-control
                                      @if (isset($formerror[$field['name']]))
                                       is-invalid
@endif"
                               id="{{$_id}}" placeholder="Harap di isi">
                        @if (isset($formerror[$field['name']]))
                            <small class="text-danger">{{$formerror[$field['name']]}}</small>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($points as $index=>$point)
            @php $radio_id1 = uniqid()  @endphp
            @php $radio_id2 = uniqid()  @endphp
            @php $field_id = uniqid()  @endphp
            <div class="form-group row">
                <label for="inputEmail3MD" class="col-4 col-form-label">
                    @if (isset($point['head']))
                        {{$point['head']}} : <br />
                    @endif
                    {{$point['title']}}</label>
                <div class="col-8">
                    <div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input  type="radio"
                                    value="1"
                                    @if (isset($preval[$point['name']]))
                                    @if($preval[$point['name']] == 1 )
                                    checked
                                    @endif
                                    @endif
                                    required
                                    class="custom-control-input" id="{{$radio_id1}}" name="{{$point['name']}}">
                            <label class="custom-control-label" for="{{$radio_id1}}">Ada / Sesuai</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                    @if (isset($preval[$point['name']]))
                                    @if($preval[$point['name']] == 0 )
                                    checked
                                    @endif
                                    @endif
                                    type="radio" value="0" required class="custom-control-input" id="{{$radio_id2}}" name="{{$point['name']}}">
                            <label class="custom-control-label" for="{{$radio_id2}}">Tidak ada / tidak sesuai</label>
                        </div>
                    </div>
                    <div class="md-form mt-0">
                        <input type="text"
                               @if (isset($preval[$progress[$index]['name']]))
                               value="{{$preval[$progress[$index]['name']]}}"
                               @endif
                               name="{{$progress[$index]['name']}}"
                               class="form-control only_number"
                               id="{{$field_id}}"
                               placeholder="Isi 1 - 100">
                        @if (isset($formerror[$point['name']]))
                            <small class="text-danger">{{$formerror[$point['name']]}}</small>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <div>
            <button type="submit" class="btn btn-lg btn-main-2">Simpan</button>
        </div>
    </form>
@endsection
@section('script')
    <script type="application/javascript" src="{{base_url('assets/js/pemeriksaan/auditor.js')}}"></script>
@stop