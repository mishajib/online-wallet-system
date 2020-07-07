@extends('layouts.backend.user.auth.app')

@section('title', "Confirm Password")

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-header bg-success p-5 rounded">
                    <p class="text-center text-white">
                        <img src="{{ asset('assets/backend/img/security.svg') }}" alt="verify-email"
                             class="img-responsive w-25">
                    </p>
                    <h1 class="card-title text-white text-center">
                        {{ __('Confirm Password') }}
                    </h1>
                </div>

                <div class="card-body">
                    <h3>{{ __('Please confirm your password before continuing.') }}</h3>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group form-group-sm">
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password to continue">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-decoration-none text-success" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
