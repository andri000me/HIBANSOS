@extends('layout')
@section('title','Peraturan')
@section('script')
@stop
@section('content')
    <section class="">
        <div class="container">
            <div class="card">
                <div class="card-header display-4 bg-transparent border-0">
                    HIBAH BANSOS
                </div>
                <div id="tentang-container" class="card-body">
                    <p class="">
                        Hibahbansos mengikuti peraturan-peraturan yang telah di tetapkan oleh pemerintah negara kesatuan republik indonesia dan pemerintah daerah antara lain
                    </p>
                    <table class="table">
                        <tbody>
                        @foreach ($list as $peraturan)
                            <tr>
                                <th>
                                    <a target="_blank" role="button" class="btn btn-sm btn-info w-50" href="{{base_url('lihatPeraturan/'.$peraturan['id'])}}">
                                        {{$peraturan['judul']}}
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <small>Untuk melihat peraturan tersebut silahkan klik tombol diatas</small>
                </div>
            </div>
        </div>
    </section>
@stop