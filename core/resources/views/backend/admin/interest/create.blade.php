@extends("layouts.backend.admin.app")

@section("title", "Give Interest")

@section('breadcomb', 'Give Interest')

@section("content")
    <div class="single-product-tab-area mg-b-30">

        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h1>Give Interest</h1>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-lg-offset-3">
                                            <form method="POST" action="{{ route('admin.interest.store') }}">
                                                @csrf
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-usd" aria-hidden="true"></i>
                                                        </span>
                                                        <input id="name" type="text" name="name"
                                                               class="form-control"
                                                               placeholder="Enter interest name" value="{{ old('name') }}">
                                                    </div>

                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                                        </span>
                                                        <input type="text" name="percent"
                                                               class="form-control"
                                                               placeholder="Enter interest percent" value="{{ old('percent') }}">
                                                    </div>

                                                    <div class="row">
                                                        <div
                                                            class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button title="Click to submit" type="submit"
                                                                        class="btn btn-ctl-bt waves-effect waves-light m-r-10">
                                                                    Save
                                                                </button>
                                                                <button title="Click to go previous page" type="button" onclick="window.history.back();"
                                                                   class="btn btn-ctl-bt waves-effect waves-light"
                                                                   style="margin-top: 0;">
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
