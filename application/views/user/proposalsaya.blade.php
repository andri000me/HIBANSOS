@php
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
;
@endphp
@extends('layout')
@section('title',$user->username)
@section('css')
    <link rel="stylesheet" href="{{base_url('assets/css/usercss.css')}}">
    <style>
        .card-img-top{
            width: 100%!important;
        }
    </style>
@endsection
@section('content')
    <section>
        <div class="container-fluid mt-5 py-5">
            <div class="row">
                <div class="col-3">
                    @component('component.tabel-informasi')@endcomponent
                </div>
                <div class="col-9 mb-5" style="">
                    @if (count($notifikasi_proposal)>0)
                        <div class="card mb-3 noth100">
                            <div class="card-body">
                                <h3 class="h3-responsive">
                                    Notifikasi
                                </h3>
                                @component('user.notifikasi',['list'=>$notifikasi_proposal])@endcomponent
                            </div>
                        </div>
                    @endif
                    <div class="card pb-5 noth100">
                        <div class="card-body pt-5"  id="card-container" style="overflow-y: auto">
                            <div class="row">
                                @foreach ($list as $proposal)
                                    <div class="col-3">
                                        @component('component.cardproposal',$proposal)@endcomponent
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop