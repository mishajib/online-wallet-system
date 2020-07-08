<!doctype html>
<html lang="en">

<head>
    <title>Mighty &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ asset('assets/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


<div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>



    <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center position-relative">

                <div class="col-3 ">
                    <div class="site-logo">
                        <a href="index.html" class="font-weight-bold">
                            <img class="img-responsive w-75" src="{{ asset('assets/frontend/images/logo.png') }}" alt="ows">
                        </a>
                    </div>
                </div>

                <div class="col-9  text-right">


            <span class="d-inline-block d-lg-block"><a href="#"
                                                       class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span
                        class="icon-menu h3 text-white"></span></a></span>



                    <nav class="site-navigation text-right ml-auto d-none d-lg-none" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav ml-auto ">
                            <li class="active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                            <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                            <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        </ul>
                    </nav>
                </div>


            </div>
        </div>

    </header>

    <div class="ftco-blocks-cover-1">
        <div class="site-section-cover overlay" style="background-image: url('{{ asset('assets/frontend/images/bg_wallet.jpg') }}')">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 text-center">
                        <h1 class="mb-4 text-white">
                            E-WALLET is <span class="typer" data-delay="50" data-words="online transaction system, a money transfer system, a digital wallet" data-colors="lightblue,orange,cyan"></span>
                        </h1>
                        <p class="mb-4">ONLINE WALLET SYSTEM</p>
                        <p><a href="{{ route('login') }}" class="btn btn-primary btn-outline-white py-3 px-5">GET STARTED</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<script src="{{ asset('assets/frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script async src="https://unpkg.com/typer-dot-js@0.1.0/typer.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

<script>
    particlesJS();
</script>

</body>
</html>
