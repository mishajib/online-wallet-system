<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
    <button class="btn btn-dark" id="menu-toggle">
        <i class="fa fa-navicon"></i>
    </button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link text-white" href="javascript:void(0);">
                    {{ number_format(Auth::user()->balance, 2) . " " . $setting->currency }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.transfer') }}">Transfer Money</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">{{ __("Logout") }}</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
