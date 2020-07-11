@extends('layouts.backend.user.auth.app')

@section('content')
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
                                    <img src="{{ asset('assets/backend/img/password.svg') }}" alt="login"
                                         class="img-responsive w-25">
                                </p>
                                <h1 class="card-title text-center text-white text-bold">
                                    {{ __("Sign in to continue") }}
                                </h1>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="form-group form-group-sm">
                                        <input type="text"
                                               class="form-control form-control-lg mt-5 @error('username') is-invalid @enderror"
                                               placeholder="Enter username" name="username" required autocomplete="username"
                                               autofocus value="{{ old('username') }}">

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="password" name="password"
                                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                                               placeholder="Enter password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="remember" class="form-check-input"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __("Remember me") }}
                                        </label>
                                        @if(Route::has('password.request'))
                                            <div class="text-right mt-n4">
                                                <span>{{ __("Forgot") }}</span><a title="Click to forgot password!" href="{{ route('password.request') }}" class="btn btn-link text-success text-decoration-none">{{ __("Password?") }}</a>
                                            </div>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-success btn-lg btn-block rounded mt-3">
                                        {{ __("SIGN IN") }}
                                    </button>
                                </form>

                                <div class="text-center mt-5">
                                    <p class="text-dark">{{ __("Don't have an account?") }}</p>
                                    <a title="Click to sign up!" href="{{ route('register') }}"
                                       class="btn btn-link text-success mt-n4 text-decoration-none">
                                        {{ __("SIGN UP NOW") }}
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
