<tr>
    <td>{{$nama}}</td>
    <td>{{$noKtp}}</td>
    <td>{{$email}}</td>
    <td>{{$telepon}}</td>
    <td>{{$username}}</td>
    <td class="text-uppercase">{{tipe_operator((int)$role_id)}}</td>
    <td>
        <a href="{{base_url('editOperator/'.$id)}}" class="btn btn-warning mr-1 btn-sm">
           <span class="text-dark"><i class="fas fa-edit"></i>        <span class="text-dark">Edit</span></span>
        </a>
        <button  data-action="{{base_url('hapusPengguna')}}"  data-userid="{{$id}}" data-username="{{$username}}" class="btn-action btn btn-danger btn-sm">
            <span class="text-dark">
                <i class="fas fa-user-minus"></i>
            Hapus
            </span>
        </button>
    </td>
</tr>