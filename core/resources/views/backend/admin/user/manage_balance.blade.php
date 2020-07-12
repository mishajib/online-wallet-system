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
                                    <a href="#profile"><i class="fa fa-plus"
                                                          aria-hidden="true"></i> {{ $title }}</a>
                                </li>
                            </ul>

                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="profile">

                                    <form action="{{ route('admin.user.balance.operation') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3">
                                                <div class="review-content-section">

                                                        <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-user-md" aria-hidden="true"></i>
                                                                    </span>
                                                            <input type="text" name="username"
                                                                   class="form-control"
                                                                   placeholder="Enter username"
                                                                   value="{{ old('username') }}">
                                                        </div>

                                                        <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon">
                                                                        ৳
                                                                    </span>
                                                            <input type="number" min="0" step="any" name="amount"
                                                                   class="form-control"
                                                                   placeholder="Enter amount"
                                                                   value="{{ old('amount') }}">
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div
                                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="text-center custom-pro-edt-ds">
                                                        <button name="op" value="add" type="submit"
                                                                class="btn btn-ctl-bt waves-effect waves-light m-r-10">
                                                            Add Balance
                                                        </button>

                                                        <button name="op" value="sub" type="submit"
                                                                class="btn btn-ctl-bt waves-effect waves-light m-r-10">
                                                            Subtract Balance
                                                        </button>
                                                        <button type="button" onclick="window.history.back()"
                                                                class="btn btn-ctl-bt waves-effect waves-light"
                                                                style="margin-top: 0;">
                                                            Discard
                                                        </button>
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
@stop

