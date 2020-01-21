@php
    $checktolak = $acc == 0;
    $checksetuju = $tahapanProposal > 3;
    $bolehperiksa = ($tahapanProposal == 3||$tahapanProposal == 4) &&( $role == 4 || $role == 1);
@endphp
@if($checktolak && !$checksetuju)
    <td class="bg-danger font-weight-bold"> Di tolak </td>
@elseif ($checksetuju)
    <td class="bg-success font-weight-bold"> Di Setujui </td>
@elseif (!$checktolak && !$checksetuju && $is_revisi == 1)
    <td class="bg-warning font-weight-bold"> Menunggu revisi </td>
@elseif($bolehperiksa)
    <td class="bg-info font-weight-bold">
        <a class="" href="{{base_url('periksa/skpd/'.$idHibahBansos)}}">Periksa</a>
    </td>
@else
    <td class=""> Proses </td>
@endif