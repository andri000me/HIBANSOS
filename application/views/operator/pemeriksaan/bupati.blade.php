@if ($acc == 0)
    <td class="bg-danger font-weight-bold"> Di tolak </td>
@elseif ($tahapanProposal == 5 && ($role == 6|| $role == 1))
    <td class="bg-info font-weight-bold">
        <a class="" href="{{base_url('periksa/bupati/'.$idHibahBansos)}}">Periksa</a>
    </td>
@elseif ($acc == 1)
    <td class="bg-success font-weight-bold"> Di Setujui </td>
@else
    <td class=""> Proses </td>
@endif