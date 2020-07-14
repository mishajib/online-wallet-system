@include("layouts.backend.user.partials.header")

<div class="d-flex" id="wrapper">

    {{--    Sidebar--}}
        @include("layouts.backend.user.partials.sidebar")
    {{--    sidebar--}}

    {{--     Page Content --}}
    <div id="page-content-wrapper">

{{--        navbar--}}
        @include('layouts.backend.user.partials.navbar')
{{--        navbar end--}}

        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <h1>@yield('breadcrumb')</h1>
                            </li>
                        </ol>
                    </nav>

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</div>

@include('layouts.backend.user.partials.footer')
