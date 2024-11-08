
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-light">
    <a class="navbar-brand" href="/home">
        ZETA

        <img src="{{ asset('assets')}}/images/ZETA_logo.png" style="width: 50px; height: 50px;">
    </a>
    
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/help">Help</a>
                <a class="dropdown-item" href="/about">About</a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button class="dropdown-item" type="submit">
                        Log Out
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>