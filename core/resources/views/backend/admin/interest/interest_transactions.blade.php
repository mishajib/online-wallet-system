@extends("layouts.backend.admin.app")

@section('breadcomb', $title)

@section("content")
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>{{ $title }}</h4>
                        <form action="{{ route('admin.user.search.transaction') }}" method="GET"
                              class="navbar-form navbar-right">
                            <div class="form-group">
                                <input type="text" name="query" class="form-control" placeholder="Search by trx num">
                            </div>
                        </form>
                        <table>
                            <tr>
                                <th>Serial No</th>
                                <th>TRX Num</th>
                                <th>Receiver</th>
                                <th>TRX Type</th>
                                <th>Amount</th>
                                <th>Remaining Balance</th>
                                <th>Interest</th>
                                <th>Details</th>
                            </tr>
                            @forelse($trxs as $key => $transaction)
                                <tr>

                                    <td>{{ $trxs->firstItem()+$key }}</td>
                                    <td>{{ $transaction->trx_num }}</td>
                                    <td>
                                        {{ $transaction->user->username }}
                                    </td>
                                    <td>{{ $transaction->trx_type }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->remaining_balance }}</td>
                                    <td>
                                        @if($transaction->interest == true)
                                            <span class="badge badge-success">Received</span>
                                        @else
                                            <span class="badge badge-danger">Not Received</span>
                                        @endif
                                    </td>
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
                                {{ $trxs->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
