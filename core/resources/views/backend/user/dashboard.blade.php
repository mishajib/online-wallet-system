@extends("layouts.backend.user.app")

@section('breadcrumb', 'Dashboard')


@section('content')
    <div class="row mb-5">
        <div class="col-3">
            <div class="card bg-primary text-center shadow text-white">
                <div class="card-header">
                    <h3>Transactions</h3>
                    <h1><i class="fa fa-exchange"></i> {{ number_format($total_transaction, 2) .' '. $setting->currency }} </h1>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card bg-success text-center shadow text-white">
                <div class="card-header">
                    <h3>Referred Users</h3>
                    <h1><i class="fa fa-user-plus"></i> {{ count(Auth::user()->referredusers) }} </h1>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card bg-dark text-center shadow text-white">
                <div class="card-header">
                    <h3>Received Bonus</h3>
                    <h1><i class="fa fa-get-pocket"></i> {{ number_format($total_bonus, 2) . ' '. $setting->currency }} </h1>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card bg-info text-center shadow text-white">
                <div class="card-header">
                    <h3>Send Money</h3>
                    <h1><i class="fa fa-send-o"></i> {{ number_format($total_send_money, 2) .' '. $setting->currency }} </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-info">
            <h1 class="card-title">
                Transaction Log
            </h1>
            <form action="{{ route('user.search.transaction') }}" method="GET" class="form-inline my-2 my-lg-0 float-right">
                <input name="query" class="form-control mr-sm-2" type="search" placeholder="Search transaction" aria-label="Search">
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th>TRX Num</th>
                    <th>TRX Type</th>
                    <th>Amount</th>
                    <th>Remaining Balance</th>
                    <th>Details</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                @forelse($transactions as $key => $transaction)
                    <tr>
                        <th scope="row">{{ $transactions->firstItem()+$key }}</th>
                        <td>{{ $transaction->trx_num }}</td>
                        <td>
                            @if($transaction->trx_type == true)
                                <span class="badge badge-success">Credited</span>
                            @else
                                <span class="badge badge-danger">Debited</span>
                            @endif
                        </td>
                        <td>{{ number_format($transaction->amount, 2)  }}</td>
                        <td>{{ $transaction->remaining_balance }}</td>
                        <td>{{ $transaction->details }}</td>
                        <td>{{ $transaction->created_at->diffForHumans() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <h1>
                                <span class="text-danger">{{ __("No data found!!!") }}</span>
                            </h1>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <nav aria-label="...">
                <ul class="pagination">
                    {{ $transactions->links() }}
                </ul>
            </nav>
        </div>
    </div>
@stop



