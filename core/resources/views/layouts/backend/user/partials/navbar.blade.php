<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ml-n1 mr-n1">
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
            <li class="nav-item {{ (Request::is('transfer/money')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.transfer') }}">Send Money</a>
            </li>
            <li class="nav-item dropdown {{ (Request::is('profile')) ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item {{ (Request::is('profile')) ? 'active' : '' }}" href="{{ route('user.profile') }}">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">{{ __("Logout") }}</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
