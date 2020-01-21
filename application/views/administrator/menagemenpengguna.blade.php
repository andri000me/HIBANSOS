@php
    $common = ['Nama','KTP', 'Email', 'Nomor telepon', 'Username'];$isoperator = $tipe == "operator"; $isoperator ? array_push($common, 'Operator') : null;
@endphp
@extends('layout')
@section('title','Menagemen '.$tipe)
<section class="my-5 py-5">
    <div class="container-fluid mb-5">
        @component('component.big-card',['title'=>"Menagemen ".$tipe])
            @if ($isoperator)
                <a href="{{base_url('tambahOperator')}}" class="btn my-3 btn-block btn-main-2 w-25">
                    <i class="fas fa-user-plus"></i>
                    Tambah operator
                </a>
            @endif
            <div class="" style="min-height: 100vh">
                <table class="table">
                    <thead>
                    <tr>
                        @foreach($common as $th)
                            <th>{{$th}}</th>
                        @endforeach
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userlist as $_user)
                        @php $component = $isoperator? 'operator' : 'pengguna' @endphp
                        @component('administrator.menagamenpengguna.'.$component, $_user) @endcomponent
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endcomponent
    </div>
</section>
@section('script')
    @component('administrator.modalkonfirmasi',['tipe'=>$tipe])@endcomponent
    <script src="{{base_url('assets/js/addons/datatables.js')}}"></script>
    <script src="{{base_url('assets/js/menagemenpengguna.js')}}"></script>
@stop