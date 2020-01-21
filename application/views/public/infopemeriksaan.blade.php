@php $i = 1 @endphp
@php $last_tolak = null; @endphp
@foreach($arr as $nama_operator => $pemeriksaan)
 @php 
 $class = "bg-success";
 $text = "Di setujui";
 $waktu = null;

 if( $i >= $proposal["tahapanProposal"]){
    $text = "Dalam proses";
     $class = "bg-light";
     }
 if($pemeriksaan === null && $proposal["tahapanProposal"] >= $i ){
    switch($nama_operator){
    case"tu":{
        if( ($arr["tu"] == null && $proposal["kategoriPemeriksaanTUSETDA"] == -1)){
            $text = "Dilanjutkan ke SETDA";
        }
        if($arr["setda"]!== null){
            $carbon = new \Carbon\Carbon($arr["setda"]['waktu']);
            $waktu = $carbon->formatLocalized('%A, %d  %B  %Y');     
        }
        break;
        }
        case"setda":{
            if($arr["tu"]!= null){
                $carbon = new \Carbon\Carbon($arr["tu"]['waktu']);
            $waktu = $carbon->formatLocalized('%A, %d  %B  %Y');     
            }
        }
 }
 }

if($pemeriksaan !== null){
    $carbon = new \Carbon\Carbon($pemeriksaan['waktu']);
    $waktu = $carbon->formatLocalized('%A, %d  %B  %Y');
    if($proposal["acc"] == 0){
        $last_tolak = $waktu;
    }
}

if($proposal["tahapanProposal"] <= $i && $proposal["acc"] == 0){
    $class = "bg-danger";
    $text = "Di tolak";
}
if ($proposal["is_revisi"] == "1" && $i == 3 && $pemeriksaan!== null){
     $text = "Revisi";
     $class = "bg-warning";
}

 @endphp
    <tr class="{{$class}}">
    <td class="text-uppercase font-weight-bold"> 
    {{$nama_operator}}
    </td>
    <td colspan={{ ($last_tolak && $proposal["acc"] == 0 ) || $waktu ?1:2 }}>
    {{$text}}
    </td>
    @if($last_tolak)
    <td>{{$last_tolak}}</td>
    @endif
    @if($waktu && !$last_tolak)
    <td>{{$waktu}}</td>
    @endif
    </tr>
    @php $i++ @endphp
@endforeach