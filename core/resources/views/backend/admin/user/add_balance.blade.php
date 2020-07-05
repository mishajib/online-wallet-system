@extends("layouts.backend.admin.app")

@section("title", "Add Balance")

@section('breadcomb', 'Add Balance')

@section("content")
    <div class="single-product-tab-area mg-b-30">

        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h1>Add balance</h1>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-lg-offset-3">
                                            <form method="POST" action="{{ route('admin.user.store.balance') }}">
                                                @csrf
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-user-md" aria-hidden="true"></i>
                                                                    </span>
                                                        <select data-placeholder="Select user" class="form-control pro-edt-select form-control-primary" name="username" id="select2-single">
                                                            <option value=""></option>
                                                            @forelse($users as $user)
                                                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                                                            @empty
                                                                <span class="text-danger">{{ __("No user found!!!") }}</span>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-money" aria-hidden="true"></i>
                                                                    </span>
                                                        <input type="number" min="0" step="any" name="amount"
                                                               class="form-control"
                                                               placeholder="Enter amount">
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
                                                                   class="btn btn-ctl-bt waves-effect waves-light" style="margin-top: 0;">
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
@stop
