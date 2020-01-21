@php
        $pemeriksaan = ['tu','setda','skpd','tapd','bupati']
        @endphp
<table class="table table-borderless">
    <tbody>
    @foreach ([
    'Di ajukan'=>\Carbon\Carbon::instance(\Carbon\Carbon::make($tglPengajuan))->formatLocalized('%d  %B  %Y'),
    'Tanggal pelaksanaan'=>\Carbon\Carbon::instance(\Carbon\Carbon::make($tglKegiatan))->formatLocalized('%d  %B  %Y'),
    'Tahapan'=>$tahapanProposal==6&&$acc==1?"Di setujui": "Pemeriksaan ".strtoupper($pemeriksaan[$tahapanProposal==1?0:$tahapanProposal-1]),
    'Dana di ajukan'=>rupiah($dana),
    'Dana di setujui'=>$danaEvaluasiTAPD == 0 ?"-":rupiah($danaEvaluasiTAPD),
    ] as $th => $td)
        <tr><th class="p-0">{{$th}}</th><td class="p-0">{{$td}}</td></tr>
    @endforeach
    <tr><th class="p-0">Kategori : </th></tr>
    <tr>
        <td colspan="2" class="p-0">{{$kategoriPemeriksaanTUSETDA == 0 ||$kategoriPemeriksaanTUSETDA ==-1 ?"Belum di periksa":kategori_hibansos($kategoriPemeriksaanTUSETDA-1)}}</td>
    </tr>
    </tbody>
</table>