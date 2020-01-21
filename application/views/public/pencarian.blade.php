@php
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
@endphp
@extends('layout')
@section('title','Pencarian')
@section('css')
    <link rel="stylesheet" href="{{base_url('assets/css/usercss.css')}}">
@stop
@section('content')
    <div class="section mt-5">
        <div class="container-fluid py-5">
            <div class="row my-5">
                <div class="col-3">
                    @component('component.tabel-informasi')@endcomponent
                </div>
                <div class="col-9 mb-5">
                    <div class="card pb-5">
                        <div class="card-body pt-0" id="card-container" style="max-height: 100vh;overflow-y: auto">
                            <nav style="top: 0;z-index: 98" class="navbar mx-0 sticky-top navbar-expand-lg bg-white">
                                <div class="collapse navbar-collapse" id="basicExampleNav">
                                    <div class="md-form input-group mt-3">
                                        <input id="cari-nama-text" type="text" class="form-control" placeholder="Nama proposal" aria-label="Recipient's username"
                                               aria-describedby="MaterialButton-addon2">
                                        <div class="input-group-append">
                                            <a  class="btn btn-md btn-info m-0 px-3" id="cari-nama-link"><i class="fas fa-search"></i> Cari</a>
                                        </div>
                                    </div>
                                    <div class="md-form input-group mt-3">
                                        <select class="browser-default custom-select" id="kategori-select" aria-label="Example select with button addon">
                                            <option selected disabled>Kategori proposal</option>
                                            @foreach (kategori_hibansos() as $val=>$kategori)
                                                <option value="{{base_url('pencarian/kategori/'.($val+1))}}" >{{$kategori}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a  role="button" href="{{base_url()}}" class="btn btn-md btn-info m-0 px-3" id="cari-kategori-link"><i class="fas fa-search"></i> Cari</a>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                            <div class="row">
                                @if (count($list)>0)
                                    <div class="col-12">
                                        @if ($list!= null)
                                            @if (is_string($key ))
                                                <p>Menampilkan {{count($list)}} proposal</p>
                                            @else
                                                <p>Menampilkan {{count($list)}} proposal dengan kata kunci "{{kategori_hibansos($key-1)}}"</p>
                                            @endif
                                        @endif
                                    </div>
                                    @foreach ($list as $proposal)
                                        <div class="col-3">
                                            @component('component.cardproposal',$proposal)@endcomponent
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <h1 class="display-4 text-center">
                                            Tidak dapat menemukan proposal
                                        </h1>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        window.carinamalink= '{{base_url('pencarian/nama/')}}';
    </script>
    <script type="application/javascript" src="{{base_url('assets/js/home.js')}}"></script>
@stop