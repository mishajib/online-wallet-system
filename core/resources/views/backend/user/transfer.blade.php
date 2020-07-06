@extends("layouts.backend.user.app")

@section("title", "Transfer Money")
@section('breadcrumb', "Transfer Money")

@section("content")
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">
                        Transfer money to another
                    </h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.transfer.money') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text"
                                   class="form-control @error('username') is-invalid @enderror"
                                   id="username" aria-describedby="username" name="username"
                                   required
                                   placeholder="Enter username">
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" min="0" step="any" class="form-control @error('amount') is-invalid @enderror"
                                   id="amount" aria-describedby="amount" name="amount" required
                                   placeholder="Enter amount">
                        </div>
                        <button type="submit" class="btn btn-primary">Transfer</button>
                        <button type="button" onclick="window.history.back();" class="btn btn-info">Discard</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
