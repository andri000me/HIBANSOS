@extends('public.monitoring 1')
@section('monitoring2')
    <tr>
        <th>
            7
        </th>
        <td>
            Bukti Serah Terima Barang Berupa Berita Acara Serah Terima Barang
        </td>
        @component('public.monitoring.info',['progres'=>$progresPoin7,'point'=>$poin7])@endcomponent
    </tr>
    <tr>
        <th rowspan="7">
            8
        </th>
        <td colspan="4">
            Laporan Penggunaan Hibah
        </td>
    </tr>
    <tr>
        <td>
            a. Satu Tahap Pencairan/Sekaligus
        </td>
        @component('public.monitoring.info',['progres'=>$progresPoin8a,'point'=>$poin8a])@endcomponent
    </tr>
    <tr>
        <td>
            b. Beberapa Tahap Pencairan, dibagi :
        </td>
        @component('public.monitoring.info',['progres'=>$progresPoin8b,'point'=>$poin8b])@endcomponent
    </tr>
    <tr>
        <td>
            Laporan Tahap I
        </td>
        @component('public.monitoring.info',['progres'=>$progresPoin8b1,'point'=>$poin8b1])@endcomponent
    </tr>
    <tr>
        <td>
            Laporan Tahap II
        </td>
        @component('public.monitoring.info',['progres'=>$progresPoin8b2,'point'=>$poin8b2])@endcomponent
    </tr>
    <tr>
        <td>
            Laporan Tahap III
        </td>
        @component('public.monitoring.info',['progres'=>$progresPoin8b3,'point'=>$poin8b3])@endcomponent
    </tr>
    <tr>
        <td>
            Laporan Tahap IV
        </td>
        @component('public.monitoring.info',['progres'=>$progresPoin8b4,'point'=>$poin8b4])@endcomponent
    </tr>
    <tr>
        <th>
            9
        </th>
        <td>
            Dokumentasi Hasil kegiatan
        </td>
        @component('public.monitoring.info',['progres'=>$progresPoin9,'point'=>$poin9])@endcomponent
    </tr>
    <tr>
        <th>
            10
        </th>
        <td>
            Sisa Hibah/Bansos
        </td>
        @component('public.monitoring.info',['progres'=>$progresPoin10,'point'=>$poin10])@endcomponent
    </tr>
@stop