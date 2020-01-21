@extends('layout')
@section('css')
    @stop
@section('script')
    <script type="application/javascript" src="{{base_url('assets/js/addons/datatables.js')}}"></script>
    <script type="application/javascript">
        $("table").dataTable({sort:false});
    </script>
@stop
@section('title','Pemeriksaan')
@section('content')
    <section class="mt-5">
        <div class="container-fluid py-5">
            <div class="card">
                <div class="card-header display-4 bg-transparent border-0">
                    Pemeriksaan
                </div>
                <div class="card-body">
                    <table id="table-pemeriksaan" class="table w-100 table-bordered">
                        @component('operator.pemeriksaan.thead')
                        @endcomponent
                        <tbody>
                        @foreach ($list as $hibansos)
                                <tr>
                                    @component('operator.pemeriksaan.infoproposal',$hibansos)
                                    @endcomponent
                                    @foreach (['tu','setda','skpd','tapd','bupati'] as $td)
                                        @component('operator.pemeriksaan.'.$td,array_merge(['role'=>$user->role_id],$hibansos) )@endcomponent
                                    @endforeach
                                    <td><a href="{{base_url('detailpemeriksaan/'.$hibansos['idHibahBansos'])}}">detail</a></td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop