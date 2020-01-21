@extends('layout')
@section('title','Tambah operator')
@section('script')
    <script type="application/javascript" src="{{base_url('assets/js/global.js')}}"></script>
    <script type="application/javascript" src="{{base_url('assets/js/validator.js')}}"></script>
@stop
@section('content')
    <section class="my-5 py-5">
        <div class="container mb-5">
            @component('component.big-card', ['title'=>'Tambah operator'])
                <div class="col-md-10 mx-auto">
                    @component('component.addedituser',['action'=>uri_string(),'errors'=>$formerror,'preval'=>$preval])
                        @slot('formbutton')
                            <div class="col-md-6">
                                @if (isset($preval['id']))
                                    <input type="hidden" id="id" name="id" value="{{$preval['id']}}">
                                @endif
                                <button class="btn btn-lg mx-0 w-100 btn-main-2">
                                    {{uri_string() === 'tambahOperator'?'Tambah operator':'Simpan'}}
                                </button>
                            </div>
                        @endslot
                        @slot('radios')
                            <div class="col-md-12 mb-3">
                                <p class="form-text">Pilih operator
                                    @if (isset($formerror['role_id']))
                                        <small class="text-danger"> *Harus di pilih salah satu</small>
                                    @endif
                                </p>
                                @foreach(tipe_operator() as $operator=>$text)
                                    @if ($operator!= 1)
                                        @php $_rid = uniqid() @endphp
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input
                                                    required
                                                    value="{{$operator}}"
                                                    @if (isset($preval['role_id']))
                                                    @if ($preval['role_id'] == $operator)
                                                    checked
                                                    @endif
                                                    @endif
                                                    type="radio" class="custom-control-input" id="{{$_rid}}" name="role_id">
                                            <label class="custom-control-label text-uppercase" for="{{$_rid}}">{{$text}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endslot
                    @endcomponent
                </div>
            @endcomponent
        </div>
    </section>
@endsection