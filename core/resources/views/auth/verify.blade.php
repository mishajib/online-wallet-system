@extends('layouts.backend.user.auth.app')

@section("title", "Verify Email")

@section('color', "bg-secondary")

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-header bg-success p-5 rounded">
                    <p class="text-center text-white">
                        <img src="{{ asset('assets/backend/img/mail.svg') }}" alt="verify-email"
                             class="img-responsive w-25">
                    </p>
                    <h1 class="card-title text-center text-white">
                        {{ __('Verify Your Email Address') }}
                    </h1>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
