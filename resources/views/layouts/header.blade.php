<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="/">Pocetna</a>
            </li>

            @if(Auth::user())

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Profil</a>
                </li>

                @can('manage-roles', User::class)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">Uloge</a>
                </li>
                @endcan
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Odjava</a>
                </li>

            @else
                          
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Prijava</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registracija</a>
                </li>

            @endif



        </ul>
    </div>

</nav>