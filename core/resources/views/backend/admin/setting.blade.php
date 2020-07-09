@extends("layouts.backend.admin.app")

@section("title", "Site Setting")

@section('breadcomb', 'Site Setting')

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <h1>Site Setting</h1>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.site.setting.update', $setting->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="review-content-section">
                            <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                                                    </span>
                                <input type="text" name="site_name" class="form-control"
                                       placeholder="Site name" value="{{ $setting->site_name ?? old('site_name') }}">
                            </div>
                            <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                </span>
                                <input type="number" min="0" step="any" name="fixed_charge" class="form-control" value="{{ number_format($setting->fixed_charge, 2) ?? old('fixed_charge') }}" placeholder="Fixed Charge">
                            </div>

                            <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                </span>
                                <input type="number" name="percent_charge" class="form-control" value="{{ $setting->percent_charge ?? old('percent_charge') }}" placeholder="Percent Charge">
                            </div>

                            <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                </span>
                                <input type="number" min="0" step="any" name="join_bonus" value="{{ number_format($setting->join_bonus, 2) ?? old('join_bonus') }}" class="form-control" placeholder="Join Bonus">
                            </div>

                            <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                </span>
                                <input type="number" min="0" name="refer_bonus" value="{{ $setting->refer_bonus ?? old('refer_bonus') }}" class="form-control" placeholder="Refer Bonus">
                            </div>

                            <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                </span>
                                <input type="number" min="0" name="transfer_bonus" value="{{ $setting->transfer_bonus ?? old('transfer_bonus') }}" class="form-control" placeholder="Transfer Bonus">
                            </div>

                            <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon">
                                    <i class="fa fa-dollar" aria-hidden="true"></i>
                                </span>
                                <input type="text" name="currency" value="{{ $setting->currency ?? old('currency') }}" class="form-control" placeholder="Join Bonus">
                            </div>

                            <div class="row">
                                <div
                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="text-center custom-pro-edt-ds">
                                        <button type="submit"
                                                class="btn btn-ctl-bt waves-effect waves-light m-r-10">
                                            Update
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
@stop
