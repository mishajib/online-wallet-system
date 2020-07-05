@extends("layouts.backend.user.app")

@section('title', 'User Dashboard')


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
                    <th>Sender</th>
                    <th>TRX Type</th>
                    <th>Amount</th>
                    <th>Remaining Balance</th>
                    <th>Details</th>
                </tr>
                </thead>
                <tbody>
                @forelse($transactions as $key => $transaction)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $transaction->trx_num }}</td>
                        <td>
                            @if(empty($transaction->user))
                                <span class="text-danger">{{ __("No data found!!!") }}</span>
                            @else
                                {{ $transaction->user->username }}
                            @endif
                        </td>
                        <td>{{ $transaction->trx_type }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->remaining_balance }}</td>
                        <td>{{ $transaction->details }}</td>
                    </tr>
                @empty
                    <h2>
                        <span class="text-danger">{{ __("No data found!!!") }}</span>
                    </h2>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop



