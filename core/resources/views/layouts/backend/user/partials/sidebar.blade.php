<div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card border-dark">
        <div class="card-header">
            <div class="card-img">
                <p class="text-center">
                    <img src="{{ asset('assets/backend/user.png') }}"
                         class="w-50 h-50 img-responsive img-thumbnail" alt="">
                </p>
            </div>
            <h1 class="card-title text-center border pb-2 border-dark rounded">
                {{ Auth::user()->username }}
            </h1>
        </div>
        <div class="card-body">
            <ul class="list-group text-center font-weight-bold">
                <li class="list-group-item h4 mb-3 border-info rounded">
                    <a class="text-dark text-decoration-none" href="#">{{ __("Balance") }}</a>
                </li>

                <li class="list-group-item h4 mb-3 border-info rounded">
                    <a class="text-dark text-decoration-none" href="#">{{ __("Transaction Log") }}</a>
                </li>

                <li class="list-group-item h4 mb-3 border-info rounded">
                    <a class="text-dark text-decoration-none" href="#">{{ __("Account Info") }}</a>
                </li>

                <li class="list-group-item h4 mb-3 border-info rounded">
                    <a class="text-dark text-decoration-none" href="#">{{ __("Money Transfer") }}</a>
                </li>

            </ul>
        </div>
    </div>
</div>
