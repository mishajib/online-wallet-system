@extends('layouts.backend.admin.auth.app')

@section('content')
    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="{{ route('admin.login.page') }}" class="btn btn-primary">{{ __('Back to Login Page') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3 style="color: white;">{{ __('Admin Forgot Password') }}</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="{{ route('admin.password.email') }}" id="loginForm" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input type="email" placeholder="EX - example@example.com" title="Please enter your email" required value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button title="Click to send password reset link" class="btn btn-success btn-block loginbtn">{{ __("Send Password Reset Link") }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
@stop
