@foreach ($list as $notif)
    @if ($notif['is_revisi'] == 1)
        <blockquote class="blockquote bq-warning">
            <p class="mb-0"> Segera upload revisi proposal anda : <span class="font-small">{{$notif['judulKegiatan']}}</span><br/>
                <a target="_blank" href="{{base_url('proposal/detail/'.$notif['idHibahBansos'])}}" class="badge p-2 badge-warning">
                    <i class="fas fa-info-circle"></i>
                    Detail</a></p>
        </blockquote>
    @elseif ($notif['acc'] == 1 && $notif['progres'] == 0)
        <blockquote class="blockquote bq-primary">
            <p class="mb-0"> Segera upload progress kegiatan anda : <span class="font-small">{{$notif['judulKegiatan']}}</span> <br/>
                <a target="_blank" href="{{base_url('proposal/detail/'.$notif['idHibahBansos'])}}" class="badge p-2 badge-primary ">
                    <i class="fas fa-info-circle"></i>
                    Detail</a></p>
        </blockquote>
    @elseif ($notif['monitoring'] == 1 && $notif['lpj'] == 0)
        <blockquote class="blockquote bq-primary">
            <p class="mb-0"> Segera upload lpj kegiatan anda : <span class="font-small">{{$notif['judulKegiatan']}}</span><br/>
                <a target="_blank" href="{{base_url('proposal/detail/'.$notif['idHibahBansos'])}}" class="badge p-2 badge-primary">
                    <i class="fas fa-info-circle"></i>
                    Detail</a></p>
        </blockquote>
    @endif
@endforeach