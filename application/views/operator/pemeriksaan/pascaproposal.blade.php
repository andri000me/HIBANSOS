<table class="table">
    <thead>
    <tr>
        <th>
            Monitoring
        </th>
        <th>Hasil pemeriksaan</th>
        <th>LPJ/Progress</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Monitoring 1</td>
        @if ($monitoring == 1 && $progres == 1)
            <td>
                <a target="_blank" href="{{base_url('lihatMonitoring1/'.$idHibahBansos)}}" class="badge p-2 w-100 badge-secondary">Lihat</a>
            </td>
            <td>
                <a target="_blank" href="{{base_url('proposal/progres/'.$idHibahBansos)}}" class="badge p-2 w-100 badge-primary">Progress</a>
            </td>
        @elseif($monitoring == 0 && $progres == 1)
            <td class='text-center'>-</td>
            <td class="text-center">
                <a target="_blank" href="{{base_url('proposal/progres/'.$idHibahBansos)}}" class="badge p-2 badge-primary">Progress</a>
            </td>
        @elseif ($monitoring == 0 && $progres == 0)
            <td class="text-center">-</td>
            <td class="text-center">-</td>
        @endif
    </tr>
    <tr>
        <td>Monitoring 2</td>
        @if ($monitoring2 == 1 && $lpj == 1)
            <td class="text-center">
                <a target="_blank" href="{{base_url('lihatMonitoring2/'.$idHibahBansos)}}"  class="badge w-100 p-2 badge-danger">Lihat</a>
            </td>
            <td class="text-center">>
                <a target="_blank" href="{{base_url('lihatlpj/'.$idHibahBansos)}}" class="badge w-100 p-2 badge-success">LPJ</a>
            </td>
        @elseif($monitoring2 == 0 && $lpj ==1)
            <td class="text-center">-</td>
            <td class="text-center">
                <a target="_blank" href="{{base_url('lihatlpj/'.$idHibahBansos)}}" class="badge w-100 p-2 badge-success">LPJ</a>
            </td>
        @else
            <td class="text-center">-</td>
            <td class="text-center">-</td>
        @endif
    </tr>
    </tbody>
</table>
@if (isset($hasil_lpj))
    <blockquote  class="blockquote ">
        <p class="bq-title">
            Keterangan hasil monitoring
        </p>
        <p class="font-small">
            {{$hasil_lpj['keterangan']}}
        </p>
    </blockquote>
@endif