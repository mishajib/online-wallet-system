<div class="bg-dark border-right" id="sidebar-wrapper">
    <img src="{{ asset('assets/frontend/images/logo.png') }}" class="sidebar-heading img-responsive" style="width: 200px;" alt="{{ $setting->site_name }}">

    <p class="text-center pt-5">
        <img class="rounded-circle img-responsive" style="height: 100px; width: 100px;" src="{{ asset('assets/uploads/profile/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
        <h2 class="text-white text-center">{{ Auth::user()->name }}</h2>
    </p>

    <div class="list-group ml-3 list-group-flush pt-5">
        <a href="{{ route('user.dashboard') }}"
           class="bg-dark text-white list-group-item list-group-item-action bg-light">{{ __("Dashboard") }}</a>
        <a href="{{ route('user.referred.user') }}" class="bg-dark text-white list-group-item list-group-item-action bg-light mt-4">{{ __('Referred Users') }}</a>
        <a href="{{ route('user.refer.bonus') }}" class="bg-dark text-white
         list-group-item list-group-item-action bg-light mt-4">{{ __('Refer
         Bonus List') }}</a>
        <a href="{{ route('user.transfer.bonus') }}" class="bg-dark text-white
         list-group-item list-group-item-action bg-light mt-4">{{ __('Transfer
         Bonus List') }}</a>
        <a href="{{ route('user.refer.friend') }}" class="bg-dark text-white list-group-item list-group-item-action bg-light mt-4">{{ __('Refer a friend') }}</a>

    </div>
</div>
