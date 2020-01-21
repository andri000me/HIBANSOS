@php
    $fields = [
     [
     'name'=>'username',
     'label'=>'Username',
     'preval'=>$preval['username'] ?? null,
     'error'=>$formerror['username'] ?? null
     ],
     [
     'name'=>'password',
     'label'=>'Password',
     'type'=>'password',
     'error'=>$formerror['password']?? null,
     'preval'=>null
     ],
     ];
@endphp
@extends('layout')
@section('title','login')
@section('script')
    <script src="{{base_url('assets/js/global.js')}}"></script>
@stop
@section('content')
    <section>
        <div class="container">
            <div class="col-md-6 mx-auto">
                <form action="{{base_url('login')}}" method="post" novalidate>
                    @foreach ($fields as $field)
                        @component('component.field', $field)@endcomponent
                    @endforeach
                    <p class="form-text text-right @if (isset($_400)|| isset($_404) || isset($formerror)) text-danger @else text-muted @endif">
                        {{$_400 ?? $_404?? "* harap isi semua bidang"}}
                    </p>
                    <div class="d-flex my-0">
                        <button class="btn bg-main2 mx-1 my-0 btn-block my-4 btn-main-2" type="submit">
                            <i class="fas fa-sign-in-alt"></i>
                            Login
                        </button>
                        <a href="{{base_url('daftar')}}" role="button" class="btn mx-1 my-0 btn-outline-dark btn-block my-4">
                            <i class="fas fa-user-plus"></i>
                            Daftar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop