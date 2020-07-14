@extends("layouts.backend.user.app")

@section('breadcrumb', 'Refer a friend')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header bg-info">
                        <h1 class="card-title text-white text-center">
                            Refer a friend
                        </h1>
                    </div>
                    <div class="card-body">
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
        </div>
    </div>
@stop



