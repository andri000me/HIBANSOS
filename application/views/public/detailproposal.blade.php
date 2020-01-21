@php         setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');@endphp
@extends('layout')
@section('title','Detail proposal')
@section('content')
    <section class="mt-5">
        <div class="container py-5">
            @if (isset($user->id))
                @if ($user->id == $proposal['idYangMengajukan'])
                    @if ($proposal['is_revisi']==1 && $proposal['revisi_count']<3 && $user!=null)
                        @component('user.upload_revisi',$proposal)@endcomponent
                    @endif
                    @if ($proposal['acc'] == 1 && $proposal['progres'] == 0)
                        @component('user.upload_progress',$proposal)@endcomponent
                    @endif
                    @if ($proposal['monitoring'] == 1 && $proposal['lpj'] == 0)
                        @component('user.upload_lpj',$proposal)@endcomponent
                    @endif
                @endif
            @endif
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img id="display-proposal" src="{{base_url($proposal['foto'])}}" alt="thumbnail" class="img-thumbnail"
                            >
                        </div>
                        <div class="col-6">
                            <h3>{{$proposal['judulKegiatan']}}</h3>
                            <hr>
                            <p class="subtitle">
                                oleh : {{$proposal['nama']}}
                            </p>
                            @component('component.informasi-umum',$proposal)
                            @endcomponent
                            @if (isset($user->id))
                                @if ((int)$proposal['tahapanProposal']===1 && $user->id === $proposal['idYangMengajukan'])
                                    <a href="{{base_url('editHibahBansos/'.$proposal['idHibahBansos'])}}" class="btn ml-0 btn-sm btn-info">
                                        Edit proposal
                                    </a>
                                    <a href="{{base_url('hapusHibahBansos/'.$proposal['idHibahBansos'])}}" class="btn ml-0 btn-sm btn-danger">
                                        Hapus proposal
                                    </a>
                                @endif
                            @endif
                            <div>
                                <p>Unduh dokumentasi proposal</p>
                                <a href="{{base_url('lihatProposal/'.$proposal['idHibahBansos'])}}" class="badge p-2 badge-default">Proposal</a>
                                @if ($proposal['progres']==1&& $proposal['acc']==1)
                                    <a target="_blank" href="{{base_url('proposal/progres/'.$proposal['idHibahBansos'])}}" class="badge p-2 badge-primary">Progress</a>
                                @endif
                                @if ($proposal['monitoring']==1&& $proposal['acc']==1)
                                    <a target="_blank" href="{{base_url('lihatMonitoring1/'.$proposal['idHibahBansos'])}}" class="badge p-2 badge-secondary">Monitoring 1</a>
                                @endif
                                @if ($proposal['lpj']==1&& $proposal['acc']==1)
                                    <a target="_blank" href="{{base_url('lihatlpj/'.$proposal['idHibahBansos'])}}" class="badge p-2 badge-success">LPJ</a>
                                @endif
                                @if ($proposal['monitoring2']==1&& $proposal['acc']==1)
                                    <a target="_blank" href="{{base_url('lihatMonitoring2/'.$proposal['idHibahBansos'])}}"  class="badge p-2 badge-danger">Monitoring 2</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                @if (isset($lpj))
                    @component('public.lpj-card',$lpj)
                    @endcomponent
                @endif
                <div class="col-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="h5-responsive">
                                <i class="fab fa-wpforms"></i>
                                Status pemeriksaan
                            </h5>
                            <table class="table">
                                <thead class="text-uppercase">
                                <tr>
                                    <th>Operator</th>
                                    <th>Status</th>
                                    <th>Waktu</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 1;
                                $arr = ["tu"=>$tu, "setda"=>$setda, "skpd"=>$skpd, "tapd"=>$tapd, "bupati"=>$bupati];
                                @endphp
                                @include('public.infopemeriksaan', ["arr"=>$arr])
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6 mt-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="h5-responsive">
                                <i class="fas fa-money-check-alt"></i>  Pendanaan
                            </h5>
                            <table class="table">
                                <thead class="">
                                <tr>
                                    <th>Dana yang di ajukan</th>
                                    <th>{{rupiah($proposal['dana'])}}</th>
                                </tr>
                                <tr>
                                    <th>Rekomendasi SKPD</th>
                                    <th>{{$proposal['tahapanProposal']>3?rupiah($proposal['danaRekomendasiSKPD']):'-'}}</th>
                                </tr>
                                <tr>
                                    <th>Evaluasi TAPD</th>
                                    <th>{{
                                        $proposal['tahapanProposal'] >=5 
                                    && $proposal['danaRekomendasiSKPD'] >= $proposal['danaEvaluasiTAPD'] 
                                    && $proposal['danaEvaluasiTAPD'] != 0                                     
                                    ?rupiah($proposal['danaEvaluasiTAPD']):"-"}}</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <blockquote class="blockquote bg-white">
                                <p class="bq-title">Latar belakang</p>
                                <p>
                                    {{$proposal['latarBelakang']}}
                                </p>
                            </blockquote>
                            <blockquote class="blockquote bg-white">
                                <p class="bq-title">Maksud dan tujuan</p>
                                <p>
                                    {{$proposal['maksudTujuan']}}
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection