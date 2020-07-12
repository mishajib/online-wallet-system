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

                                    <form action="{{ route('admin.interest.store') }}" method="POST">
                                        @csrf

                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3">

                                                <div class="review-content-section">

                                                            <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-usd" aria-hidden="true"></i>
                                                        </span>
                                                                <input id="name" type="text" name="name"
                                                                       class="form-control"
                                                                       placeholder="Enter interest name"
                                                                       value="{{ old('name') }}">
                                                            </div>

                                                            <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                                        </span>
                                                                <input type="text" name="percent"
                                                                       class="form-control"
                                                                       placeholder="Enter interest percent"
                                                                       value="{{ old('percent') }}">
                                                            </div>


                                                        </div>

                                                </div>

                                                <div class="row">
                                                    <div
                                                        class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="text-center custom-pro-edt-ds">
                                                            <button title="Click to submit" type="submit"
                                                                    class="btn btn-ctl-bt waves-effect waves-light m-r-10">
                                                                Save
                                                            </button>
                                                            <button title="Click to go previous page" type="button"
                                                                    onclick="window.history.back();"
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
@stop
