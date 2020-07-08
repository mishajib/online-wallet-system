@extends('layouts.backend.admin.app')

@section('title', 'Dashboard')
@section('breadcomb', 'Dashboard')

@section('content')
    <div class="section-admin container-fluid">
        <div class="row admin text-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                            <h4 class="text-left text-uppercase"><b>Total Transactions</b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet">
                                <div class="col-xs-3 mar-bot-15 text-left">
                                    <label class="label bg-green"><i class="fa fa-exchange" aria-hidden="true"></i></label>
                                </div>
                                <div class="col-xs-9 cus-gh-hd-pro">
                                    <h2 class="text-right no-margin">{{ number_format($total_transactions, 2) . " " . $setting->currency }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                        <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                            <h4 class="text-left text-uppercase"><b>Total Users</b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet">
                                <div class="text-left col-xs-3 mar-bot-15">
                                    <label class="label bg-red"><i class="fa fa-users" aria-hidden="true"></i></label>
                                </div>
                                <div class="col-xs-9 cus-gh-hd-pro">
                                    <h2 class="text-right no-margin">{{ $total_users }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                            <h4 class="text-left text-uppercase"><b>Revenue</b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet">
                                <div class="text-left col-xs-3 mar-bot-15">
                                    <label class="label bg-blue"><i class="fa fa-money" aria-hidden="true"></i></label>
                                </div>
                                <div class="col-xs-9 cus-gh-hd-pro">
                                    <h2 class="text-right no-margin">{{ number_format($revenue, 2) . " " . $setting->currency }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                            <h4 class="text-left text-uppercase"><b>Total Referred Users</b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet">
                                <div class="text-left col-xs-3 mar-bot-15">
                                    <label class="label bg-purple"><i class="fa fa-paper-plane" aria-hidden="true"></i></label>
                                </div>
                                <div class="col-xs-9 cus-gh-hd-pro">
                                    <h2 class="text-right no-margin">{{ $total_referred_users }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-status mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Latest Transactions</h4>
                        <table>
                            <tr>
                                <th>Serial No</th>
                                <th>TRX Num</th>
                                <th>Receiver</th>
                                <th>TRX Type</th>
                                <th>Amount</th>
                                <th>Remaining Balance</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                            @forelse($transactions as $key => $transaction)
                                <tr>

                                    <td>{{ ++$key }}</td>
                                    <td>{{ $transaction->trx_num }}</td>
                                    <td>
                                        {{ $transaction->user->username }}
                                    </td>
                                    <td>{{ $transaction->trx_type }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->remaining_balance }}</td>
                                    <td>{{ $transaction->details }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <h1 class="text-center">
                                            <span class="text-danger">{{ __('No transaction found!!!') }}</span>
                                        </h1>
                                    </td>
                                </tr>
                            @endforelse

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
