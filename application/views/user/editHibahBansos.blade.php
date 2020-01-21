@php $common_field =
['field'=>[
['name'=> 'judulKegiatan','label'=>'Nama kegiatan',],
['name'=> 'nama','label'=>'Nama pengaju (Individu / Organisasi)',],
['name'=> 'deskripsiDana','label'=>'Deskripsi penggunaan dana'],
['name'=> 'dana','type'=>'number','label'=>'Dana di ajukan (Rp.)', 'parsley'=>'min=0'],
['name'=> 'alamat','label'=>'Alamat',],
],
'textarea'=>
[
['name'=>'latarBelakang', 'label'=>'Latar belakang'],
['name'=>'maksudTujuan', 'label'=>'Maksud & Tujuan'],
]
];
@endphp
@extends('layout')
@section('title','Edit proposal')
@section('script')
    <script type="application/javascript" src="{{base_url('assets/js/addons/datepicker.min.js')}}"></script>
    <script src="{{base_url('assets/js/addons/id.js')}}"></script>
    <script type="application/javascript" src="{{base_url('assets/js/tambahproposal.js')}}"></script>
@stop
@section('css')
    <link rel="stylesheet" href="{{(base_url('assets/css/addons/datepicker.css'))}}">
@stop
@section('content')
    <section class="mt-5">
        <div class="container py-5">
            <div class="card">
                <h1 class="card-header h1-responsive bg-transparent border-0">
                    Edit proposal
                </h1>
                <div class="card-body">
                    <form novalidate class="mt-3" action="{{current_url()}}" method="post" enctype="multipart/form-data">
                        <h5 class="h5-responsive mb-0">
                            Informasi umum
                        </h5>
                        <div class="row">
                            @foreach($common_field['field'] as $field)
                                <div class="col-6">
                                    @component('component.field', array_merge($field, [
                                    'error'=>$formerror[$field['name']] ?? null,
                                    'preval'=>$preval[$field['name']] ?? null
                                    ]))
                                    @endcomponent
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <h5 class="h5-responsive mt-3 mb-0">
                            Informasi proposal
                        </h5>
                        <div class="row">
                            @foreach($common_field['textarea'] as $field)
                                @php $_txid = uniqid() @endphp
                                <div class="col-6">
                                    <div class="md-form shadow-textarea position-relative mt-5">
                                        <label for="{{$_txid}}" class="{{isset($formerror[$field['name']])?'text-danger':'text-muted'}}text-muted">{{isset($formerror[$field['name']])?$formerror[$field['name']] :"Wajib di isi"}}</label>
                                        <textarea
                                                name="{{$field['name']}}"
                                                class="form-control md-textarea @if (!isset($formerror[$field['name']])&&!$preval[$field['name']]) initial @elseif ($preval[$field['name']] && !isset($formerror[$field['name']])) is-valid @else is-invalid @endif"
                                                style="border-radius: 0" id="{{$_txid}}" rows="3" placeholder="{{$field['label']}}">{{$preval[$field['name']] ?? ''}}</textarea>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="md-form">
                                    <label for="datepicker"
                                           class="{{isset($formerror['tglKegiatan']) ? "text-danger":"text-muted"}} font-smaller">
                                        {{$formerror['tglKegiatan'] ?? "Wajib di isi"}}
                                    </label>
                                    <input id="datepicker"
                                           name="tglKegiatan"
                                           type="text"
                                           @if (isset($preval['tglKegiatan']))
                                           value="{{$preval['tglKegiatan']}}"
                                           @endif
                                           class="form-control @if (!isset($formerror['tglKegiatan'])&&!$preval['tglKegiatan']) initial @elseif ($preval['tglKegiatan'] && !isset($formerror['tglKegiatan'])) is-valid @else is-invalid @endif"
                                           placeholder="Tanggal kegiatan">
                                </div>
                            </div>
                        </div>
                        <h5 class="h5-responsive mt-3 mb-0">
                            Dokumen
                        </h5>
                        <div class="row">
                            <div class="col-6 mt-5">
                                <small class="{{isset($formerror['fileProposal']) ? "text-danger":"text-muted"}} font-smaller">
                                    {{isset($formerror['fileProposal']) ? $formerror['fileProposal'] : "Wajib di isi"}}
                                </small>
                                <div class="custom-file">
                                    <input name="fileProposal" accept="application/pdf" type="file" class="custom-file-input" id="proposal" lang="in">
                                    <label class="custom-file-label " for="proposal">File proposal</label>
                                </div>
                            </div>
                            <div class="col-6 mt-5">
                                <small class="{{isset($formerror['foto']) ? "text-danger":"text-muted"}} font-smaller">
                                    {{isset($formerror['foto'])?$formerror['foto'] : "Wajib di isi"}}
                                </small>
                                <div class="custom-file">
                                    <input name="foto" type="file" class="custom-file-input" id="foto" lang="in">
                                    <label class="custom-file-label " for="foto">Foto proposal </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-5 mx-auto">
                                <button id="form-btn" class="btn bg-primary w-100">
                                    <i class="fas fa-edit"></i>
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@stop