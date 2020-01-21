@component('component.nav.public')@endcomponent
<li class="nav-item dropdown">
    <a class="nav-link {{activenav('menagemenpengguna')}} dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">Menagemen pengguna</a>
    <div class="dropdown-menu pr-3  dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{base_url('menagemenpengguna/pengguna')}}">pengguna</a>
        <a class="dropdown-item" href="{{base_url('menagemenpengguna/operator')}}">operator</a>
    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link {{activenav('pengaturanperaturan')}} {{ activenav('pengaturantentang')}} dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">Pengaturan</a>
    <div class="dropdown-menu pr-3 dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{base_url('pengaturanperaturan')}}">Peraturan</a>
        <a class="dropdown-item" href="{{base_url('pengaturantentang')}}">Tentang</a>
    </div>
</li>