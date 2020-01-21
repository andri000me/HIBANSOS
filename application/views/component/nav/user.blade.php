@component('component.nav.public')@endcomponent
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle {{uri_string() == "proposalsaya" || uri_string() == 'tambahHibahBansos'?'active':''}} " id="navbarDropdownMenuLink" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">Proposal</a>
    <div class="dropdown-menu pr-3 dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{base_url('proposalsaya')}}"><i class="fas fa-list-ul mr-1"></i>Proposal saya</a>
        <a class="dropdown-item" href="{{base_url('tambahHibahBansos')}}"><i class="fas fa-plus mr-1"></i>Tambah proposal</a>
    </div>
</li>
