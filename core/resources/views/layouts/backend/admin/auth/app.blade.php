@include('layouts.backend.admin.partials.header')

<body>
@yield('content')

<div class="row">
    <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 text-center mt-5">
        <p style="color: white;">Copyright © {{now()->year}} <a title="The Soft King" href="https://thesoftking.com/">TSK</a> All rights reserved.</p>
    </div>
</div>
</div>

@include('layouts.backend.admin.partials.scripts')
</body>
</html>
