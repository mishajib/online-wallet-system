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
                    <h3 style="color: white;">{{ __('Admin Reset Password') }}</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="{{ route('admin.update.password') }}" id="loginForm" method="POST">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input style="background: #152036;" type="email" title="Please enter your email"
                                       placeholder="Enter your email" readonly required name="email" id="email"
                                       class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password"
                                       placeholder="Enter your password" required name="password" id="password"
                                       class="form-control @error('password') is-invalid @enderror">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="password-confirm">Confrim Password</label>
                                <input type="password" title="Please enter your password confirmation"
                                       placeholder="Enter your confirm password" required name="password_confirmation" id="password-confirm"
                                       class="form-control @error('password_confirmation') is-invalid @enderror">

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button title="Click to login"
                                    class="btn btn-success btn-block loginbtn">{{ __("RESET PASSWORD") }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
@stop
