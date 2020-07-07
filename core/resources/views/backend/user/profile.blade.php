@extends('layouts.backend.user.app')

@section('title', 'User Profile')

@section('breadcrumb', "Profile")

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action {{ (Request::is('profile')) ?  'active' : '' }}"
                   id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                <a class="list-group-item list-group-item-action" id="list-avatar-list" data-toggle="list"
                   href="#list-avatar" role="tab" aria-controls="avatar">Avatar</a>
                <a class="list-group-item list-group-item-action" id="list-password-list" data-toggle="list"
                   href="#list-password" role="tab" aria-controls="password">Password</a>
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade {{ (Request::is('profile')) ?  'show active' : '' }}" id="list-profile"
                     role="tabpanel" aria-labelledby="list-profile-list">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">
                                User Info
                            </h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" aria-describedby="name" name="name" required
                                           placeholder="Enter name"
                                           value="{{ Auth::user()->name ?? old('name') }}">
                                </div>

                                <div class="form-group">
                                    <label for="username">User Name</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                           id="username" aria-describedby="username" name="username" disabled
                                           value="{{ Auth::user()->username }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" aria-describedby="email" name="email" required
                                           placeholder="Enter email" value="{{ Auth::user()->email ?? old('email') }}">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                           id="phone" aria-describedby="phone" name="phone" required
                                           placeholder="Enter phone number"
                                           value="{{ Auth::user()->phone ?? old('phone') }}">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                           id="address" aria-describedby="address" name="address" required
                                           placeholder="Enter adress one"
                                           value="{{ Auth::user()->address ?? old('address') }}">
                                </div>


                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                           id="city" aria-describedby="city" name="city" required
                                           placeholder="Enter city"
                                           value="{{ Auth::user()->city ?? old('city') }}">
                                </div>

                                <div class="form-group">
                                    <label for="postcode">Postal Code</label>
                                    <input type="text" class="form-control @error('postcode') is-invalid @enderror"
                                           id="postcode" aria-describedby="postcode" name="postcode" required
                                           placeholder="Enter postcode"
                                           value="{{ Auth::user()->postcode ?? old('postcode') }}">
                                </div>


                                <button type="submit" class="btn btn-primary">Update</button>

                            </form>

                            <div class="form-group mt-5">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="postcode">{{ __("Referral Link") }}</label>
                                        <input readonly title="Referral Link" type="text" value="{{ route('refer', Auth::user()->username) }}" class="form-control" id="refer">

                                    </div>
                                    <div class="col-md-3 ml-n3" style="margin-top: 27px;">
                                        <button title="Click to copy referral link" class="btn btn-info mt-1" type="button" id="copyText" data-clipboard-target="#refer">
                                            {{ __('Copy Referral Link') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('user.referral.link.send') }}" method="POST">
                                @csrf
                                <div class="form-group mt-5">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="refer_link">Send Referral Link By Email</label>
                                            <input type="email" class="form-control @error('refer_link') is-invalid @enderror"
                                                   id="refer_link" aria-describedby="refer_link" name="refer_link" required
                                                   placeholder="Enter email"
                                                   value="{{ old('refer_link') }}">

                                        </div>
                                        <div class="col-md-3 ml-n3" style="margin-top: 27px;">
                                            <button title="Click to send referral link" class="btn btn-info mt-1" type="submit">
                                                {{ __('Send') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="list-avatar" role="tabpanel" aria-labelledby="list-avatar-list">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">
                                Profile Image
                            </h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.profile.image.update') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="image">Select Image</label>
                                    <input name="image" type="file" class="form-control" id="dropify" data-default-file="{{ asset('assets/uploads/profile/'.Auth::user()->image) ?? old("image") }}">
                                </div>


                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-password" role="tabpanel" aria-labelledby="list-password-list">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">
                                Update Password
                            </h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.password.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="old_password">Old Password</label>
                                    <input type="password"
                                           class="form-control @error('old_password') is-invalid @enderror"
                                           id="old_password" aria-describedby="old_password" name="old_password"
                                           required
                                           placeholder="Enter old password">
                                </div>

                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" aria-describedby="password" name="password" required
                                           placeholder="Enter new password">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirm">New Password</label>
                                    <input type="password"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           id="password_confirm" aria-describedby="password_confirm"
                                           name="password_confirmation" required
                                           placeholder="Confirm new password">
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
