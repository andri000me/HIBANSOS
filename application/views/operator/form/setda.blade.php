@extends('operator.form.layout')
@section('title','Periksa TU')
@section('form')
    @php
        $list_kategori = array_slice(kategori_hibansos(),31);
    @endphp
    <form action="{{base_url(uri_string())}}" method="post">
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
        <p >Pilih salah satu kategori : @if (isset($formerror['kategoriPemeriksaanTUSETDA']))
                <span class="text-danger ml-3">
               {{$formerror['kategoriPemeriksaanTUSETDA']}}
           </span>
            @endif </p>
        <div class="row">
            @php $value_kategori = 32; @endphp
            @foreach ($list_kategori as $option)
                @php $rid = uniqid() @endphp
                <div class="col-6">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" value="{{$value_kategori}}" id="{{$rid}}" name="kategoriPemeriksaanTUSETDA">
                        <label class="custom-control-label" for="{{$rid}}">{{$option}}</label>
                    </div>
                    @php $value_kategori++;@endphp
                </div>
            @endforeach
        </div>
    </form>
@endsection