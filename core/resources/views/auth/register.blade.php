@extends("layouts.backend.user.auth.app")

@section('title', 'User Registration')

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/') }}" class="btn btn-lg btn-success mt-4 ml-4 shadow rounded-0">
                    <i class="fa fa-chevron-left"></i>
                    {{ __("BACK") }}
                </a>
                <div class="row">
                    <div class="col-md-5 mx-auto my-3">
                        <div class="card shadow border-success">
                            <div class="card-header bg-success rounded p-5">
                                <p class="text-center text-white">
                                    <img src="{{ asset('assets/backend/img/registration.svg') }}" alt="register"
                                         class="img-responsive w-25">
                                </p>
                                <h1 class="card-title text-center text-white text-bold">
                                    {{ __("SIGN UP NOW") }}
                                </h1>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group form-group-sm mt-4">
                                        <input id="name" type="text"
                                               class="form-control form-control-lg @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <input id="username" type="text"
                                               class="form-control form-control-lg @error('username') is-invalid @enderror"
                                               name="username" value="{{ old('username') }}" required
                                               autocomplete="username" autofocus placeholder="Enter your username">

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <input id="email" type="email"
                                               class="form-control form-control-lg @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <input id="phone" type="text"
                                               class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                               name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Enter your phone number">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <input id="address" type="text"
                                               class="form-control form-control-lg @error('address') is-invalid @enderror"
                                               name="address" value="{{ old('address') }}" required autocomplete="address"
                                               autofocus placeholder="Enter your address">

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <input id="city" type="text"
                                               class="form-control form-control-lg @error('city') is-invalid @enderror"
                                               name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="Enter your city">

                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <input id="postcode" type="text"
                                               class="form-control form-control-lg @error('postcode') is-invalid @enderror"
                                               name="postcode" value="{{ old('postcode') }}" required
                                               autocomplete="postcode" autofocus placeholder="Enter your postal code">

                                        @error('postcode')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    @if($ref_user)
                                        <div class="form-group form-group-sm">
                                            <input id="refer" type="text"
                                                   class="form-control form-control-lg @error('refer') is-invalid @enderror"
                                                   name="refer" readonly value="{{ $ref_user->username ?? old('refer') }}" autocomplete="refer" placeholder="Enter referral username">

                                            @error('refer')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    @endif


                                    <div class="form-group form-group-sm">
                                        <input id="password" type="password"
                                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password" placeholder="Enter your password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <input id="password-confirm" type="password" class="form-control form-control-lg"
                                               name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                                    </div>

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-success btn-block btn-lg">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>

                                <div class="text-center mt-5">
                                    <p class="text-dark">{{ __("Already have an account?") }}</p>
                                    <a title="Click to sign in!" href="{{ route('login') }}"
                                       class="btn btn-link text-success mt-n4 text-decoration-none">
                                        {{ __("SIGN IN") }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
