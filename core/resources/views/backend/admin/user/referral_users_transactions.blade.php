@extends("layouts.backend.admin.app")

@section("title", "Referral Users Transactions")

@section('breadcomb', 'Referral Users Transactions')

@section("content")
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Referral User Transaction List</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Serial No</th>
                                <th>TRX Num</th>
                                <th>Sender</th>
                                <th>TRX Type</th>
                                <th>Amount</th>
                                <th>Remaining Balance</th>
                                <th>Details</th>
                                <th>Time & Date</th>
                            </tr>
                            @forelse($trans as $key => $transaction)
                                    <tr>
                                        <td>{{ $trans->firstItem()+$key }}</td>
                                        <td>{{ $transaction->trx_num }}</td>
                                        <td>{{ $transaction->user->username }}</td>
                                        <td>{{ $transaction->trx_type }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->remaining_balance }}</td>
                                        <td>{{ $transaction->details }}</td>
                                        <td>{{ $transaction->created_at->diffForHumans() }}</td>
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
                        <div class="custom-pagination">
                            <ul class="pagination">
                                {{ $trans->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
