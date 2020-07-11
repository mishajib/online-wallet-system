@extends('layouts.backend.admin.auth.app')

@section('content')
    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="{{ route('welcome') }}" class="btn btn-primary">{{ __('Back to Home') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3 style="color: white;">{{ __('PLEASE LOGIN TO ADMIN') }}</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="{{ route('admin.login') }}" id="loginForm" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="EX - john123" title="Please enter your username" required value="{{ old('username') }}" name="username" id="username" class="form-control @error('username') is-invalid @enderror">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="Enter your password" required name="password" id="password" class="form-control @error('password') is-invalid @enderror">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="checkbox login-checkbox" style="margin-left: 20px;">
                                <label>
                                    <input type="checkbox" class="i-checks" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __("Remember me") }}
                                </label>
                                <p class="help-block small">{{ __("(if this is a private computer)") }}</p>
                                <p class="text-right"><a href="{{ route('admin.password.request') }}" class="btn btn-link" style="margin-top: -80px;">Forgot Password?</a></p>
                            </div>
                            <button title="Click to login" class="btn btn-success btn-block loginbtn">{{ __("Login") }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
@stop
