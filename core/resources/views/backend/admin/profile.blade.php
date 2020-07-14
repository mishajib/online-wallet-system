@extends("layouts.backend.admin.app")


@section('breadcomb', $title)

@section("content")
    <div class="single-product-tab-area mg-b-30">

        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active">
                                    <a href="#profile"><i class="fa fa-edit"
                                                          aria-hidden="true"></i> User Profile Edit</a>
                                </li>

                                <li>
                                    <a href="#avatar"><i class="fa fa-image"
                                                         aria-hidden="true"></i> User Profile Edit</a>
                                </li>

                                <li>
                                    <a href="#password"><i class="fa fa-user-secret" aria-hidden="true"></i> User
                                        Password Update</a>
                                </li>
                            </ul>

                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="profile">

                                    <form action="{{ route('admin.profile.update') }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3">
                                                <div class="review-content-section">

                                                    <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                    </span>
                                                        <input type="text" class="form-control" placeholder="Name"
                                                               name="name"
                                                               value="{{ Auth::user()->name ?? old('name') }}">
                                                    </div>

                                                    <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user-md" aria-hidden="true"></i>
                                                    </span>
                                                        <input type="text" name="username"
                                                               value="{{ Auth::user()->username ?? old('username') }}"
                                                               class="form-control" placeholder="Username">
                                                    </div>

                                                    <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    </span>
                                                        <input type="email" name="email"
                                                               value="{{ Auth::user()->email ?? old('email') }}"
                                                               class="form-control" placeholder="Email">
                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button title="Click to submit" type="submit"
                                                            class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
                                                    </button>
                                                    <a title="Click to go previous page"
                                                       href="{{ route('admin.user.index') }}"
                                                       class="btn btn-ctl-bt waves-effect waves-light">
                                                        Discard
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>


                                <div class="product-tab-list tab-pane fade" id="avatar">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-6 col-lg-offset-3">
                                                        <form method="POST" action="{{ route('admin.profile.image.update') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="review-content-section">
                                                                <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                                                    </span>
                                                                    <input type="file" name="image"
                                                                           class="form-control" id="dropify" data-default-file="{{ asset('assets/uploads/profile/'.Auth::user()->image) ?? old("image") }}">
                                                                </div>

                                                                <div class="row">
                                                                    <div
                                                                        class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="text-center custom-pro-edt-ds">
                                                                            <button type="submit"
                                                                                    class="btn btn-ctl-bt waves-effect waves-light m-r-10">
                                                                                Save
                                                                            </button>
                                                                            <a href="{{ route('admin.profile') }}"
                                                                               class="btn btn-ctl-bt waves-effect waves-light">
                                                                                Discard
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="product-tab-list tab-pane fade" id="password">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-6 col-lg-offset-3">
                                                        <form method="POST" action="{{ route('admin.password.update') }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="review-content-section">
                                                                <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-key" aria-hidden="true"></i>
                                                                    </span>
                                                                    <input type="password" name="old_password"
                                                                           class="form-control"
                                                                           placeholder="Old password">
                                                                </div>

                                                                <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-key" aria-hidden="true"></i>
                                                                    </span>
                                                                    <input type="password" name="password"
                                                                           class="form-control"
                                                                           placeholder="New password">
                                                                </div>

                                                                <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-key" aria-hidden="true"></i>
                                                                    </span>
                                                                    <input type="password" name="password_confirmation"
                                                                           class="form-control"
                                                                           placeholder="Confirm new password">
                                                                </div>

                                                                <div class="row">
                                                                    <div
                                                                        class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="text-center custom-pro-edt-ds">
                                                                            <button type="submit"
                                                                                    class="btn btn-ctl-bt waves-effect waves-light m-r-10">
                                                                                Save
                                                                            </button>
                                                                            <a href="{{ route('admin.user.index') }}"
                                                                               class="btn btn-ctl-bt waves-effect waves-light">
                                                                                Discard
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
