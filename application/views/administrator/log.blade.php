@extends('layout')
@section('title','Log sistem')
@section('content')
    <section class="my-5 py-5">
        <div class="container-fluid mb-5">
            @component('component.big-card',['title'=>"Log sistem"])
                <div class="" style="min-height: 100vh">
                    <table class="table">
                        <thead>
                        <tr>
                            @foreach(["User", "berita acara","fungsionalitas", "Waktu"] as $th)
                                <th>{{$th}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $log)
                            @php $log['kegiatan']= explode(" : ",$log['kegiatan']) @endphp
                            <tr>
                                <td>
                                    {{$log['pengguna']}}
                                </td>
                                <td>
                                    {{$log['kegiatan'][1]}}
                                </td>
                                <td>
                                    {{$log['kegiatan'][0]}}
                                </td>
                                <td>
                                    {{$log['waktu']}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endcomponent
        </div>
    </section>
@stop
@section('script')
    <script src="{{base_url('assets/js/addons/datatables.js')}}"></script>
    <script src="{{base_url('assets/js/log.js')}}"></script>
@stop