@extends('layout')
@section('title','Home')
@section('script')
    <script src="{{base_url('assets/js/home.js')}}"></script>
@stop
@section('content')
    <div class="container">
        @component('public.home.section-1')@endcomponent
        @component('public.home.section-2')@endcomponent
        @component('public.home.section-3',['list'=>count($list)>0 ? $list:'' ])@endcomponent
    </div>
@stop