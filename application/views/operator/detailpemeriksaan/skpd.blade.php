<?php
$checkTolak = $proposal["acc"] == 0 ;
$checkRevisi = in_array($proposal["is_revisi"] , ["1","2", ]);
$checkSetuju = $proposal["tahapanProposal"] >= 4 && !$checkRevisi;
$_datapemeriksaan =array_values (array_filter($datapemeriksaan, function ($val) use ($proposal){
    return $val["tahapan"] <= 4 && $val["pemeriksaan"] != null;
}));
$checkRevisi = $proposal["is_revisi"] == 1;
?>
@if (!$checkTolak && !$checkSetuju && !$checkRevisi)
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
    @elseif ($proposal["is_revisi"] == 1)
        <?php
        $carbon = new \Carbon\Carbon($_datapemeriksaan[count($_datapemeriksaan) -1] ["pemeriksaan"]['waktu']);
        $waktu = $carbon->formatLocalized('%A, %d  %B  %Y');
        ?>
        <td>{{$carbon->formatLocalized('%A, %d  %B  %Y')}}</td>
        <td class="bg-warning">
            Revisi
        </td>
    @endif
    @if (
        $datapemeriksaan["skpd"]["pemeriksaan"] != null
        &&
        $datapemeriksaan["tapd"]["pemeriksaan"] == null
        )
        @if ($proposal["is_revisi"] !== 2)
            <td>
                <a class="btn btn-sm btn-info" href="{{base_url('periksa/skpd/'.$proposal['idHibahBansos'])}}">Periksa lagi</a>
            </td>
        @endif
    @else
        <td>
            -
        </td>
    @endif
@endif
