@extends("layouts.backend.admin.app")

@section("title", "All Transactions")

@section('breadcomb', 'All User')

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
                                <th>Receiver</th>
                                <th>TRX Type</th>
                                <th>Amount</th>
                                <th>Remaining Balance</th>
                                <th>Details</th>
                            </tr>
                            @forelse($transactions as $key => $transaction)
                                <tr>

                                    <td>{{ $transactions->firstItem()+$key }}</td>
                                    <td>{{ $transaction->trx_num }}</td>
                                    <td>
                                        {{ $transaction->user->username }}
                                    </td>
                                    <td>{{ $transaction->trx_type }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->remaining_balance }}</td>
                                    <td>{{ $transaction->details }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info"
                                           href="{{ route('admin.user.specific.transaction', $transaction->user->slug) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
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
                                {{ $transactions->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
