<div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card border-dark">
        <div class="card-header bg-info">
            <div class="card-img">
                <p class="text-center">
                    <img src="{{ asset('assets/uploads/profile/' .Auth::user()->image) }}"
                         class="w-50 h-50 img-responsive rounded-circle border border-primary img-thumbnail" alt="">
                </p>
            </div>
            <h1 class="text-white card-title text-center border pb-2 border-white rounded">
                {{ Auth::user()->name }}
            </h1>
            <h4 class="text-white card-title text-center border pb-2 pt-2 border-white rounded">Remaining Balance: {{ number_format(Auth::user()->balance, 2) }}</h4>
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
