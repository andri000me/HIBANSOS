<tr>
    <td>{{$nama}}</td>
    <td>{{$noKtp}}</td>
    <td>{{$email}}</td>
    <td>{{$telepon}}</td>
    <td>{{$username}}</td>
    <td>
        @if ($statusAktif == 0)
            <a data-action="{{base_url('verifikasiAkun')}}" data-userid="{{$id}}" data-username="{{$username}}" class="btn btn-success btn-sm btn-action mr-2">
                <i class="fas fa-check"></i>     Verifikasi
            </a>
        @endif
        <button data-action="{{base_url('hapusPengguna')}}" data-userid="{{$id}}" data-username="{{$username}}" class="btn btn-danger btn-sm btn-action">
            <i class="fas fa-user-minus"></i>      Hapus
        </button>
    </td>
</tr>