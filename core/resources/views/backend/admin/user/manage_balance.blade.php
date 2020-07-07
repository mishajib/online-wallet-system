@extends("layouts.backend.admin.app")

@section("title", "Add / Subtract Balance")

@section('breadcomb', 'Add / Subtract Balance')

@section("content")
    <div class="single-product-tab-area mg-b-30">

        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h1>Add / Subtract balance</h1>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-lg-offset-3">
                                            <form method="POST" action="{{ route('admin.user.balance.operation') }}">
                                                @csrf
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-user-md" aria-hidden="true"></i>
                                                                    </span>
                                                        <input type="text" name="username"
                                                               class="form-control"
                                                               placeholder="Enter username" value="{{ old('username') }}">
                                                    </div>

                                                    <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-money" aria-hidden="true"></i>
                                                                    </span>
                                                        <input type="number" min="0" step="any" name="amount"
                                                               class="form-control"
                                                               placeholder="Enter amount" value="{{ old('amount') }}">
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
                                                                   class="btn btn-ctl-bt waves-effect waves-light" style="margin-top: 0;">
                                                                    Discard
                                                                </button>
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
@stop
