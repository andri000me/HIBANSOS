@php
    $common_field =
    [[
    ['name'=> 'nama','label'=>'Nama individu/organisasi','placeholder'=>'Nama lengkap sesuai KTP',],
    ['name'=> 'noKtp','label'=>'Nomor KTP','placeholder'=>'Nomor KTP dari nama / Ketua organisasi','parsley'=>'data-parsley-type=digits minlength=16 maxlength=16'],
    ['name'=> 'telepon','label'=>'Nomor Telepon','placeholder'=>'Nomor telepon yang masih aktif','parsley'=>'data-parsley-type=digits minlength=9 maxlength=12'],
    ['name'=> 'email','type'=>'email','label'=>'Email', 'placeholder'=>'contoh@domain.com']
    ],
    [
    ['name'=> 'alamat','label'=>'alamat','placeholder'=>'Alamat sesuai KTP / Organisasi'],
    ['name'=> 'username','label'=>'Username','placeholder'=>'Username untuk login','parsley'=>'minlength=6'],
    ['name'=> 'password','type'=>'password','placeholder'=>'password untuk login','label'=>'Password','parsley'=>'minlength=6'],
    ['name'=> 'k-password','type'=>'password','placeholder'=>'Konfirmasi password anda','label'=>'Konfirmasi password','parsley'=>'minlength=6']]
    ];
@endphp
<form action="{{base_url($action)}}" method="post" novalidate	>
    <div class="row p-0">
        @foreach($fields ?? $common_field as $field_group)
            <div class="col-md-6">
                @foreach($field_group as $field)
                    @component('component.field', array_merge(
                    $field, ['error'=>$errors[$field['name']] ?? null,'preval'=>$preval[$field['name']] ?? null]))
                    @endcomponent
                @endforeach
            </div>
        @endforeach
        {{$radios ?? ''}}
        {{$formbutton}}
    </div>
</form>