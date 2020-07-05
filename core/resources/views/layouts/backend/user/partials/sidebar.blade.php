<div class="bg-dark border-right" id="sidebar-wrapper">
    <img src="{{ asset('assets/backend/logo.png') }}" class="sidebar-heading img-responsive" alt="">

    <p class="text-center pt-5">
        <img class="rounded-circle" style="width: 35%; height: 100px;" src="{{ asset('assets/uploads/profile/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
        <h2 class="text-white text-center">{{ Auth::user()->name }}</h2>
    </p>

    <div class="list-group ml-3 list-group-flush pt-5">
        <a href="{{ route('user.dashboard') }}"
           class="bg-dark text-white list-group-item list-group-item-action bg-light">{{ __("Dashboard") }}</a>
        <a href="#" class="bg-dark text-white list-group-item list-group-item-action bg-light">Shortcuts</a>
        <a href="#" class="bg-dark text-white list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="bg-dark text-white list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="bg-dark text-white list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="bg-dark text-white list-group-item list-group-item-action bg-light">Status</a>
    </div>
</div>
