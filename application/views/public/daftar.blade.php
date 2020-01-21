@extends('layout')
@section('title','Pendaftaran')
@section('script')
    <script src="{{base_url('assets/js/validator.js')}}"></script>
    <script src="{{base_url('assets/js/global.js')}}"></script>
@stop
@section('content')
    <section class="mt-5">
        <div class="container">
            @component('component.big-card', ['title'=>'Pendaftaran'])
                <div class="col-md-10 mx-auto">
                    @component('component.addedituser',['action'=>uri_string(),'errors'=>$formerror,'preval'=>$preval])
                        @slot('formbutton')
                            <div class="col-md-8 text-center mx-auto">
                                <p class="my-0">
                                    <small>
                                        Setelah mengklik daftar anda harus menunggu verifikasi akun agar dapat login
                                    </small>
                                </p>
                                <div class="">
                                    <button class="btn btn-lg mx-0 w-50 btn-main-2">
                                        <i class="fas fa-user-plus"></i>
                                        Daftar
                                    </button>
                                </div>
                            </div>
                        @endslot
                    @endcomponent
                </div>
            @endcomponent
        </div>
    </section>
@stop