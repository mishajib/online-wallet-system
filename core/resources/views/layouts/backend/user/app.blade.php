@include('layouts.backend.user.partials.header')

@include('layouts.backend.user.partials.navbar')

<div class="container-fluid mt-4">
    <div class="row">
        @include('layouts.backend.user.partials.sidebar')

        <div class="col-lg-9 col-md-9 col-sm-12">
            @yield('content')
        </div>
    </div>
</div>


@include('layouts.backend.user.partials.footer')
