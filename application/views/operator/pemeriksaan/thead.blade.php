<thead class="text-uppercase ">
<tr>
    <th style="vertical-align: middle" rowspan="2">Judul kegiatan</th>
    <th colspan="3">Besaran Belanja Hibah (Rp)</th>
    <th colspan="5">Status</th>
    <th style="vertical-align: middle" rowspan="2" colspan="1">Detail</th>
</tr>
<tr>
    @foreach (['Permohonan', 'Rekomendasi SKPD','Pertimbangan tapd','Pemeriksaan tu','Pemeriksaan Setda','Pemeriksaan SKPD','Verifikasi TAPD','Persetujuan bupati'] as $th)
        <th>{{$th}}</th>
    @endforeach
</tr>
</thead>
