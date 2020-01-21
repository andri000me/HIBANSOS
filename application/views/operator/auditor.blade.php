@php         setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');@endphp
@extends('layout')
@section('title','Pemeriksaan')
@section('content')
    <section class="mt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-6 mx-auto">
                    <h1 class="h1-responsive text-center text-capitalize">
                        Daftar proposal monitoring
                    </h1>
                </div>
                <div class="p-3 w-100">
                    <div class="mx-auto">
                        <table id="table-pemeriksaan" class="table w-100 table-bordered">
                            <thead>
                            @foreach (['Detail','Nama kegiatan', 'Pengaju','Tanggal','Dana di terima','Periksa'] as $th)
                                <th>{{$th}}</th>
                            @endforeach
                            </thead>
                            <tbody>
                            @foreach ($list as $hibansos)
                                    <tr>
                                        <td><a href="{{base_url('detailpemeriksaan/'.$hibansos['idHibahBansos'])}}">detail</a></td>
                                        @component('operator.pemeriksaan.auditor',$hibansos)
                                        @endcomponent
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('script')
    <script style="{{base_url('assets/js/pemeriksaan.js')}}"></script>
    <script type="application/javascript" src="{{base_url('assets/js/addons/datatables.js')}}"></script>
    <script>
        $("table").dataTable({
            sort:false
        });
    </script>
@stop