@php
    $checktolak = $acc == 0;
    $checksetuju = $tahapanProposal > 4;
    $bolehperiksa = $tahapanProposal == 4 && ($role == 5 || $role == 1) && !$checktolak;
@endphp
@if ($checksetuju)
    <td class="rgba-teal-strong font-weight-bold"> <a class="" href="{{base_url('verifikasi/tapd/'.$idHibahBansos)}}">Lihat form</a></td>
@elseif($checktolak)
    <td class="bg-danger font-weight-bold"> Di tolak </td>
@elseif($bolehperiksa)
    <td class="bg-info font-weight-bold">
        <a class="" href="{{base_url('verifikasi/tapd/'.$idHibahBansos)}}">Periksa</a>
    </td>
@else
    <td class=""> Proses </td>
@endif