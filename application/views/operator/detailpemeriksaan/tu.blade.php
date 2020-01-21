<?php
$checkTolak = $proposal["acc"] == 0 ;
$checkSetuju = $proposal["tahapanProposal"] >= 2;
$_datapemeriksaan =array_values (array_filter($datapemeriksaan, function ($val) use ($proposal){
    return $val["tahapan"] <= $proposal["tahapanProposal"] && $val != null;
}));
$checkUser = ($user->role_id == 1 || $user->role_id == 2);
?>
@if (!$checkTolak && !$checkSetuju )
    <td colspan="3" class="text-center">-</td>
@else
    @if ($checkSetuju)
        <?php
        $carbon = new \Carbon\Carbon($_datapemeriksaan[count($_datapemeriksaan) -1 ]["pemeriksaan"]['waktu']);
        $waktu = $carbon->formatLocalized('%A, %d  %B  %Y');
        ?>
        <td>{{$carbon->formatLocalized('%A, %d  %B  %Y')}}</td>
        <td class="bg-success">
        Di setujui
        </td>
    @elseif ($checkTolak)
        <?php
        $carbon = new \Carbon\Carbon($_datapemeriksaan[ 0 ] ["pemeriksaan"]['waktu']);
        $waktu = $carbon->formatLocalized('%A, %d  %B  %Y');
        $class= "bg-danger white-text";
        ?>
        <td class="">{{$carbon->formatLocalized('%A, %d  %B  %Y')}}</td>
        <td class="{{$class}}">
            Di tolak
        </td>
    @endif
    @if ($checkUser && $datapemeriksaan["setda"]["pemeriksaan"] == null && $datapemeriksaan["skpd"]["pemeriksaan"] == null)
        <td>
            <a class="btn btn-sm btn-info" href="{{base_url('periksa/tu/'.$proposal['idHibahBansos'])}}">Periksa lagi</a>
        </td>
    @else
        <td>
            -
        </td>
    @endif
@endif