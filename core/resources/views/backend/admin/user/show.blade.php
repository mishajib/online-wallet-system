@extends("layouts.backend.admin.app")

@section("title", $user->name. " Information")

@section('breadcomb', $user->name. " Information")

@section("content")
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <p class="text-center">
                                        <img style="width: 20%" class="img-thumbnail img-responsive img-circle"
                                             src="{{ asset('assets/uploads/profile/'.$user->image) }}"
                                             alt="{{ $user->username }}">
                                    </p>
                                    <h1 class="text-center">{{ $user->name }}</h1>
                                    <h3 class="text-center"> {{ $user->username }}</h3>
                                    <h4 class="text-center">
                                        Remaining Balance: {{ number_format($user->balance, 2) }}
                                    </h4>
                                    <p class="text-center">
                                        <a class="btn btn-primary" href="{{ route('admin.user.balance.manage.page') }}">Manage Balance</a>
                                        <button title="Login to this user" onclick="loginUser({{ $user->id }})" class="btn btn-info waves-effect" type="button">
                                            Login as user
                                            <i style="font-size: 15px;" class="fa fa-arrow-right"></i>
                                            <form id="login-form-{{ $user->id }}" action="{{ route('admin.login.using.id', $user->id) }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </button>
                                    </p>
                                </div>
                                <div class="panel-body text-justify">
                                    <h3 class="well">Email: {{ $user->email }}</h3>
                                    <h3 class="well">Phone Number: {{ $user->phone }}</h3>
                                    <h3 class="well">Address: {{ $user->address }}</h3>
                                    <h3 class="well">City: {{ $user->city }}</h3>
                                    <h3 class="well">Postal Code: {{ $user->postcode }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1>
                                Transactions
                            </h1>
                        </div>
                        <div class="panel-body">
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
                                @forelse($transactions as $key => $transaction)
                                    <tr>

                                        <td>{{ $transactions->firstItem()+$key }}</td>
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
                                    {{ $transactions->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h1>Referred Users</h1>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Phone</th>
                                    <th>Balance</th>
                                    <th>Ref By</th>
                                    <th>Action</th>
                                </tr>
                                @forelse($referredUsers as $key => $user)
                                    <tr>
                                        <td>{{ $referredUsers->firstItem()+$key }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ number_format($user->balance, 2) }}</td>
                                        <td>
                                            @if(empty($user->user->name))
                                                <span class="text-danger">{{ __("Not found!!!") }}</span>
                                            @else
                                                {{ $user->user->name }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                               href="{{ route('admin.user.edit', $user->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-sm btn-info"
                                               href="{{ route('admin.user.show', $user->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">
                                            <h1 class="text-center">
                                                <span class="text-danger">{{ __('No user found!!!') }}</span>
                                            </h1>
                                        </td>
                                    </tr>
                                @endforelse

                            </table>
                            <div class="custom-pagination">
                                <ul class="pagination">
                                    {{ $referredUsers->links() }}
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
