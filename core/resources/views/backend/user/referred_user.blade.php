@extends("layouts.backend.user.app")

@section('breadcrumb', 'Referred Users')


@section('content')
    <div class="card">
        <div class="card-header bg-info">
            <h1 class="card-title">
                Referred User List
            </h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Phone Number</th>
                    <th>Join Date</th>
                    <th>Ref By</th>
                </tr>
                </thead>
                <tbody>
                @forelse($refUsers as $key => $user)
                    <tr>
                        <th scope="row">{{ $refUsers->firstItem()+$key }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>{{ $user->user->username }}</td>
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
                    {{ $refUsers->links() }}
                </ul>
            </nav>
        </div>
    </div>
@stop



