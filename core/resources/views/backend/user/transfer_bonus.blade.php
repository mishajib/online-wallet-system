@extends("layouts.backend.user.app")

@section('breadcrumb', 'Transfer Bonus')


@section('content')
    <div class="card">
        <div class="card-header bg-info">
            <h1 class="card-title">
                Transfer Bonus <span></span>
            </h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th>Amount</th>
                    <th>Received Time</th>
                    <th>Details</th>
                </tr>
                </thead>
                <tbody>
                @forelse($bonuses as $key => $bonus)
                    <tr>
                        <th scope="row">{{ $bonuses->firstItem()+$key }}</th>
                        <td>{{ $bonus->transfer_bonus }}</td>
                        <td>{{ $bonus->created_at->diffForHumans() }}</td>
                        <td>{{ $bonus->detail }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
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
                    {{ $bonuses->links() }}
                </ul>
            </nav>
        </div>
    </div>
@stop



