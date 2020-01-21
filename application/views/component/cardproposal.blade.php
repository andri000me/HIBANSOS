<div class="mb-4">
    <div class="view overlay">
        <img class="card-img-top" src="{{base_url($foto)}}" alt="Card image cap">
        <a href="#!">
            <div class="mask rgba-white-slight"></div>
        </a>
    </div>
    <div class="">
        <div class="d-flex">
            <a href="{{base_url('proposal/detail/'.$idHibahBansos)}}" role="button" class="btn btn-sm btn-info w-100 mx-0">
                <i class="fas fa-info-circle"></i>
                Detail proposal
            </a>
        </div>
        <div class="w-100 d-flex">
            @for ($i = 1; $i <= 5; $i++)
                <div style="width: 20%;margin: 0 .1rem 0 .1rem"
                     class="text-center
                            @if ($i == 3 && $is_revisi!=0 && $acc !== 0) bg-warning
                            @elseif ($tahapanProposal>$i) bg-success
                            @elseif ($acc == 0) bg-danger
                            @else bg-light @endif"
                >{{$i}}</div>
            @endfor
        </div>
        <h6 class="mb-1 pt-3">{{$judulKegiatan}}</h6>
        <small class="text-muted">oleh : {{$nama}}</small>
        <table class="table table-borderless">
            <tbody>
            @foreach ([
            'Di ajukan'=>\Carbon\Carbon::instance(\Carbon\Carbon::make($tglPengajuan))->formatLocalized('%d  %B  %Y'),
            'Dana di ajukan'=>rupiah($dana),
            ] as $th => $td)
                <tr><th class="p-0">{{$th}}</th><td class="p-0">{{$td}}</td></tr>
            @endforeach
            <tr><th class="p-0">Kategori : </th></tr>
            <tr>
                <td colspan="2" class="p-0">{{$kategoriPemeriksaanTUSETDA == 0||$kategoriPemeriksaanTUSETDA == -1 ?"Belum di periksa":
                kategori_hibansos($kategoriPemeriksaanTUSETDA-1)}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@php

        @endphp