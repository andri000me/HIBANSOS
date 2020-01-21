@php
    use Carbon\Carbon;
    $waktu = new Carbon($tglKegiatan) @endphp
<td>{{$judulKegiatan}}</td>
<td>{{$nama}}</td>
<td>{{$waktu->formatLocalized('%A, %d  %B  %Y')}}</td>
<td>{{rupiah($danaEvaluasiTAPD)}}</td>
<td>
    @if ($progres = 1 && $monitoring == 0)
        <a role="button" class="btn btn-sm w-100 btn-link btn-info" href="{{base_url('monitoring1/'.$idHibahBansos)}}">Monitoring 1</a>
    @endif
        @if ($monitoring = 1 && $lpj== 1 && $monitoring2 == 0)
            <a role="button" class="btn btn-sm w-100 btn-link btn-info" href="{{base_url('monitoring2/'.$idHibahBansos)}}">Monitoring 2</a>
        @endif
</td>