@include('layouts.backend.admin.partials.header')

<body>

@include('layouts.backend.admin.partials.sidebar')

@include('layouts.backend.admin.partials.navbar')

        @include('layouts.backend.admin.partials.mobile-menu')


        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="breadcomb-wp">
                                        <div class="breadcomb-ctn">
                                            <h2>
                                                @yield('breadcomb')
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')


{{--    footer area--}}
    @include('layouts.backend.admin.partials.footer')

{{--scripts file--}}
@include('layouts.backend.admin.partials.scripts')

</body>
</html>
