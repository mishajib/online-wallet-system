<!doctype html>
<html lang="en">

<head>
    <title>Home | {{ $setting->site_name }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ asset('assets/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/admin/css/font-awesome.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
        <div class="site-section-cover overlay" data-aos="fade" style="background-image: url('{{ asset('assets/frontend/images/bg_wallet.jpg') }}')">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 text-center fade-up">
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

<section id="about" class="p-5 mt-5" data-aos="fade-up">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-7 col-md-8 col-sm-12">
                <h3 class="h5">WHAT WE DO ?</h3>
                <h1 class="display-4 ml-5">About Us</h1>
                <p class="text-justify text-dark pt-2 mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet autem, cum delectus dolore eaque eligendi, error fuga minus molestiae nobis odio odit, omnis placeat sunt unde. Ab adipisci, amet animi asperiores aspernatur cum deserunt dolore ducimus error eum excepturi harum in maiores officia quasi quisquam repellat, tempore? Accusamus accusantium aliquam debitis eum facilis nostrum provident quas voluptatum. Iure natus placeat tempore tenetur. Assumenda cumque, cupiditate debitis facere id in laudantium natus, nemo obcaecati sed sequi soluta ullam veniam voluptas voluptate. Accusamus aperiam assumenda doloribus eaque minima obcaecati placeat repudiandae! Animi corporis dignissimos dolorem ea eaque, earum eligendi et ipsam itaque laudantium libero magnam, molestiae natus odit porro possimus rem repellat sed sit temporibus totam vero voluptate. Cupiditate distinctio dolor tempore tenetur. Atque et inventore nihil, nostrum pariatur perspiciatis temporibus. Ad at consectetur cumque, deserunt dolorem eaque enim error facilis fugiat fugit molestias neque quam qui quibusdam sapiente sint sit, suscipit?</p>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-12 pt-5">
                <img src="{{ asset('assets/frontend/images/about_wallet.svg') }}" alt="about" class="img-responsive img-fluid mt-5">
            </div>
        </div>
    </div>
</section>

<section id="works" class="p-5" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-title">
                    <h1 class="display-4 text-center">
                        How It Works
                    </h1>
                    <p class="text-center mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consequuntur cupiditate <br> deserunt ducimus explicabo laborum mollitia non optio reprehenderit ullam?
                    </p>
                </div>
                <div class="section-content mt-5">
                    <div class="row text-center text-dark">
                        <div class="col-md-4 p-4">
                            <p>
                                <img class="img-responsive rounded w-25" src="{{ asset('assets/frontend/images/send.svg') }}" alt="send">
                            </p>
                            <h3>Send</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque omnis optio perferendis perspiciatis quisquam, veritatis. At eaque itaque reiciendis?s</p>
                        </div>

                        <div class="col-md-4 p-4">
                            <p>
                                <img class="img-responsive rounded w-25" src="{{ asset('assets/frontend/images/receive.svg') }}" alt="send">
                            </p>
                            <h3>Receive</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque omnis optio perferendis perspiciatis quisquam, veritatis. At eaque itaque reiciendis?s</p>
                        </div>

                        <div class="col-md-4 p-4">
                            <p>
                                <img class="img-responsive rounded w-25" src="{{ asset('assets/frontend/images/dg_wallet.svg') }}" alt="send">
                            </p>
                            <h3>Wallet</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque omnis optio perferendis perspiciatis quisquam, veritatis. At eaque itaque reiciendis?s</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="service" class="p-5" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-title">
                    <h1 class="display-4 text-center">
                        Our Services
                    </h1>
                    <p class="text-center mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consequuntur <br>cupiditate deserunt ducimus explicabo laborum
                    </p>
                </div>
                <div class="section-content mt-5">
                    <div class="row text-center text-dark">
                        <div class="col-md-4 p-4">
                            <p>
                                <img class="img-responsive rounded w-25" src="{{ asset('assets/frontend/images/money-transfer.svg') }}" alt="send">
                            </p>
                            <h3>Money Transaction</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque omnis optio perferendis perspiciatis quisquam, veritatis. At eaque itaque reiciendis?s</p>
                        </div>

                        <div class="col-md-4 p-4">
                            <p>
                                <img class="img-responsive rounded w-25" src="{{ asset('assets/frontend/images/smartphone.svg') }}" alt="send">
                            </p>
                            <h3>Online Shopping</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque omnis optio perferendis perspiciatis quisquam, veritatis. At eaque itaque reiciendis?s</p>
                        </div>

                        <div class="col-md-4 p-4">
                            <p>
                                <img class="img-responsive rounded w-25" src="{{ asset('assets/frontend/images/money.svg') }}" alt="send">
                            </p>
                            <h3>Currency Supported</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque omnis optio perferendis perspiciatis quisquam, veritatis. At eaque itaque reiciendis?s</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="choose" class="p-5" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-title">
                    <h1 class="display-4 text-center">
                        Why Choose Us
                    </h1>
                    <p class="text-center mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consequuntur <br>cupiditate deserunt ducimus explicabo laborum
                    </p>
                </div>
                <div class="section-content mt-5">
                    <div class="row text-center text-dark">
                        <div class="col-md-4 p-4">
                            <p>
                                <img class="img-responsive rounded w-25" src="{{ asset('assets/frontend/images/lock.svg') }}" alt="send">
                            </p>
                            <h3>Secure</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque omnis optio perferendis perspiciatis quisquam, veritatis. At eaque itaque reiciendis?s</p>
                        </div>

                        <div class="col-md-4 p-4">
                            <p>
                                <img class="img-responsive rounded w-25" src="{{ asset('assets/frontend/images/globe.svg') }}" alt="send">
                            </p>
                            <h3>Global</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque omnis optio perferendis perspiciatis quisquam, veritatis. At eaque itaque reiciendis?s</p>
                        </div>

                        <div class="col-md-4 p-4">
                            <p>
                                <img class="img-responsive rounded w-25" src="{{ asset('assets/frontend/images/currency.svg') }}" alt="send">
                            </p>
                            <h3>Multiple Currency</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque omnis optio perferendis perspiciatis quisquam, veritatis. At eaque itaque reiciendis?s</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="contact" class="p-5" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-title">
                    <h1 class="display-4 text-center">
                        Contact Us
                    </h1>
                    <h4 class="text-center">Any Asking To Us?</h4>
                </div>
                <div class="section-content mt-5">
                    <div class="row text-center text-dark">
                        <div class="col-md-8 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationDefault01">Name</label>
                                                <input type="text" class="form-control" id="validationDefault01" required placeholder="Enter full name">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationDefault02">Contact Number</label>
                                                <input type="text" class="form-control" id="validationDefault02" placeholder="Enter contact number" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="validationDefault03">Email</label>
                                                <input type="text" class="form-control" id="validationDefault03" required placeholder="Enter your email">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="validationDefault03">Subject</label>
                                                <input type="text" class="form-control" id="validationDefault03" required placeholder="Enter your subject">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="validationDefault03">Message</label>
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer id="footer" class="border border-top p-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center mt-2 text-bold">&copy; {{ now()->year }} - MI SHAJIB. ALL RIGHTS RESERVED.</p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script async src="https://unpkg.com/typer-dot-js@0.1.0/typer.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
</body>
</html>
