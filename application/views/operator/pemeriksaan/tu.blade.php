@php
    $checktolak = $acc == 0;
    $checksetuju = $tahapanProposal > 1;
    $bolehperiksa = $tahapanProposal == 1 && ( $role == 2 || $role == 1)
@endphp


@if($checktolak && !$checksetuju)
    <td class="bg-danger font-weight-bold"> Di tolak </td>
@elseif ($checksetuju)
    <td class="bg-success font-weight-bold"> Di Setujui </td>
@elseif($bolehperiksa)
    <td class="bg-info font-weight-bold">
        <a class="" href="{{base_url('periksa/tu/'.$idHibahBansos)}}">Periksa</a>
    </td>
@else
    <td class=""> Proses </td>
@endif