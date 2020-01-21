@php
    $points = [
    ['name'=>'poin7','title'=>'Bukti Serah Terima Barang Berupa Berita Acara Serah Terima Barang'],
    ['name'=>'poin8a','title'=>'a. Satu Tahap Pencairan/Sekaligus'],
    ['name'=>'poin8b','title'=>'b. Beberapa Tahap Pencairan, dibagi :'],
    ['name'=>'poin8b1','title'=>'Laporan Tahap I'],
    ['name'=>'poin8b2','title'=>'Laporan Tahap II'],
    ['name'=>'poin8b3','title'=>'Laporan Tahap III'],
    ['name'=>'poin8b4','title'=>'Laporan Tahap IV'],
    ['name'=>'poin9','title'=>'Dokumentasi Hasil kegiatan'],
    ['name'=>'poin10','title'=>'Sisa Hibah/Bansos']];
    $progress = [
    ['name'=>'progresPoin7'],   
    ['name'=>'progresPoin8a'],
    ['name'=>'progresPoin8b'],
    ['name'=>'progresPoin8b1'],
    ['name'=>'progresPoin8b2'],
    ['name'=>'progresPoin8b3'],
    ['name'=>'progresPoin8b4'],
    ['name'=>'progresPoin9'],
    ['name'=>'progresPoin10',],
    ];
@endphp
@extends('operator.form.layout-monitoring')
@section('title','Monitoring 1')
@section('form')
    <form action="{{current_url()}}" method="post">
        @if (isset($formerror))
            <p class="text-danger">Terdapat kesalahan input data</p>
        @endif
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
            <div class="md-form">
                <textarea id="keterangan" name="keterangan" placeholder="Keterangan" class="md-textarea form-control" rows="3"></textarea>
                <label for="keterangan">Wajib di isi</label>
                @if (isset($formerror['keterangan']))
                    <small class="text-danger">
                        Wajib di isi
                    </small>
                @endif
            </div>
        <div>
            <button class="btn btn-lg btn-main-2">Simpan</button>
        </div>
    </form>
@endsection
@section('script')
    <script type="application/javascript" src="{{base_url('assets/js/pemeriksaan/auditor.js')}}"></script>
@stop