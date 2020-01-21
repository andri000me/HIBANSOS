@extends('layout')
@section('content')
    <section class="mt-5">
        <div class="container py-5">
            @component('operator.modaltolak')
            @endcomponent
            <div class="row">
                <div class="col-12">
                    @component('.operator.form.inforproposal',$proposal)
                        @yield('customtd')
                    @endcomponent
                </div>
                <div class="col-6 my-3 mx-auto">
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header mdb-color darken-3" style="color: var(--main2)">
                            <h1 class="h1-responsive text-uppercase">
                                @if ($operator == 'tapd')
                                    Verifikasi
                                @else
                                    Pemeriksaan
                                @endif  {{$operator}}
                            </h1>
                        </div>
                        <div class="card-body">
                            @yield('form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop