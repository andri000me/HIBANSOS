<div class="card">
    <div class="card-body">
        <h4 class="h4-responsive">
            Informasi proposal
        </h4>
        <div class="row">
            <div class="col-md-6">
                <p class="text-capitalize border-bottom">pengaju proposal</p>
                <p class="p-1">{{$nama}}</p>
            </div>
            <div class="col-md-6">
                <p class="text-capitalize border-bottom">Judul</p>
                <p class="p-1 text-justify">
                    {{$judulKegiatan}}
                </p>
            </div>
            <div class="col-md-12">
                <p class="text-capitalize border-bottom">Dana diajukan</p>
                <p class="p-1 text-justify">
                    {{rupiah($dana)}}
                </p>
            </div>
            {{$slot ?? ""}}
            <div class="col-md-12">
                <p class="text-capitalize border-bottom">Latar belakang</p>
                <p class="font-weight-normal text-justify">
                    {{$latarBelakang}}
                </p>
            </div>
        </div>
    </div>
</div>