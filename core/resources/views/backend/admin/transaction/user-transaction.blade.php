@extends("layouts.backend.admin.app")

@section("title", $user->name. " Transactions")

@section('breadcomb', $user->name. " Transactions")

@section("content")
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Transactions</h4>
                        <table>
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
                            @forelse($transactions as $key => $transaction)
                                <tr>

                                    <td>{{ ++$key }}</td>
                                    <td>{{ $transaction->trx_num }}</td>
                                    <td>{{ $transaction->user->username }}</td>
                                    <td>{{ $transaction->trx_type }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->remaining_balance }}</td>
                                    <td>{{ $transaction->details }}</td>
                                    <td>{{ $transaction->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <h3><span class="text-danger">{{ __('No transaction found!!!') }}</span></h3>
                            @endforelse

                        </table>
                        <div class="custom-pagination">
                            <ul class="pagination">
                                {{ $transactions->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
