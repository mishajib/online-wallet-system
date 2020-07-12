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
                                    <a href="#profile"><i class="fa fa-refresh"
                                                          aria-hidden="true"></i> {{ $title }}</a>
                                </li>
                            </ul>

                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="profile">

                                    <form action="{{ route('admin.site.setting.update', $setting->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3">
                                                <div class="review-content-section">


                                                        <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                                                    </span>
                                                            <input type="text" name="site_name" class="form-control"
                                                                   placeholder="Site name"
                                                                   value="{{ $setting->site_name ?? old('site_name') }}">
                                                        </div>
                                                        <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon">
                                    ৳
                                </span>
                                                            <input type="number" min="0" step="any" name="fixed_charge"
                                                                   class="form-control"
                                                                   value="{{ number_format($setting->fixed_charge, 2) ?? old('fixed_charge') }}"
                                                                   placeholder="Fixed Charge">
                                                        </div>

                                                        <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon">
                                    <i class="fa fa-percent" aria-hidden="true"></i>
                                </span>
                                                            <input type="number" name="percent_charge"
                                                                   class="form-control"
                                                                   value="{{ $setting->percent_charge ?? old('percent_charge') }}"
                                                                   placeholder="Percent Charge">
                                                        </div>

                                                        <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon">
                                    ৳
                                </span>
                                                            <input type="number" min="0" step="any" name="join_bonus"
                                                                   value="{{ number_format($setting->join_bonus, 2) ?? old('join_bonus') }}"
                                                                   class="form-control" placeholder="Join Bonus">
                                                        </div>

                                                        <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon">
                                    <i class="fa fa-percent" aria-hidden="true"></i>
                                </span>
                                                            <input type="number" min="0" name="refer_bonus"
                                                                   value="{{ $setting->refer_bonus ?? old('refer_bonus') }}"
                                                                   class="form-control" placeholder="Refer Bonus">
                                                        </div>

                                                        <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon">
                                    <i class="fa fa-percent" aria-hidden="true"></i>
                                </span>
                                                            <input type="number" min="0" name="transfer_bonus"
                                                                   value="{{ $setting->transfer_bonus ?? old('transfer_bonus') }}"
                                                                   class="form-control" placeholder="Transfer Bonus">
                                                        </div>

                                                        <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon">
                                    ৳
                                </span>
                                                            <input type="text" name="currency"
                                                                   value="{{ $setting->currency ?? old('currency') }}"
                                                                   class="form-control" placeholder="Join Bonus">
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







