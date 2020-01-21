@extends('layout')
@section('title','Pengaturan '.$tipe)
@section('content')
    <section class="my-5 py-5">
        <div class="container mb-5">
            @component('component.big-card',['title'=>"Pengaturan ".$tipe])
                @component('administrator.pengaturan.'.$tipe, ['konten'=>$konten])@endcomponent
            @endcomponent
        </div>
    </section>
@stop