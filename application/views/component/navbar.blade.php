<nav class="navbar animated fadeInDown fixed-top pb-0 pt-2 pl-3 pr-3 navbar-expand-lg mdb-color darken-3 navbar-dark">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{base_url()}}"><i class="fas fa-home"></i> HIBANSOS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse pr-5" id="basicExampleNav">
            <ul class="navbar-nav mr-auto">
                @if (isset($role))
                    @component('component.nav.'.$role)@endcomponent
                @else
                    @component('component.nav.public')@endcomponent
                @endif
            </ul>
            <ul class="navbar-nav">
                @if (isset($role))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                            {{$username}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pr-3 dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            @if ($role == 'administrator')
                                <a class="dropdown-item" href="{{base_url('pemeriksaan')}}">Pemeriksaan</a>
                                <a class="dropdown-item" href="{{base_url('daftarMonitoring')}}">Monitoring Evaluasi</a>
                                <a class="dropdown-item" href="{{base_url('log')}}">Log</a>
                            @endif
                                <a class="dropdown-item" href="{{base_url('logout')}}">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-capitalize {{uri_string() == 'daftar' ? "active" :""}}" href="{{base_url('daftar')}}">
                            <i class="fas fa-user-plus"></i>
                            Daftar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize {{uri_string() == 'login' ? "active" :""}}" href="{{base_url('login')}}">
                            <i class="fas fa-user"></i>
                            Login
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>