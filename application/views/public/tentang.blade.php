@extends('layout')
@section('css')
    <link href="{{base_url('assets/css/addons/quill.snow.css')}}" rel="stylesheet" />
@stop
@section('script')
    <script type="application/javascript" src="{{base_url('assets/js/addons/quill.min.js')}}"></script>
    <script type="application/javascript">
        window.delta = @json($konten[0]['konten']);
    </script>
    <script type="application/javascript" src="{{base_url('assets/js/tentang.js')}}"></script>
@stop
@section('title','Tentang')
@section('script')
@stop
@section('content')
    <section class="mt-5">
        <div class="container">
            <div class="card">
                <div class="card-header display-4 bg-transparent border-0">
                    Hibansos
                </div>
                <div id="tentang-container" class="card-body">
                    <div id="quill-container">

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop