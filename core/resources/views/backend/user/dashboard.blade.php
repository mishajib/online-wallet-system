@extends("layouts.backend.user.app")

@section('title', 'User Dashboard')

@section('breadcrumb', 'Dashboard')


@section('content')
    <div class="card">
        <div class="card-header bg-info">
            <h1 class="card-title">
                Transaction Log
            </h1>
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
                        <td>{{ $transaction->trx_type }}</td>
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



