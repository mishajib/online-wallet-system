@extends("layouts.backend.user.app")

@section('breadcrumb', $title)


@section('content')
    <div class="card">
        <div class="card-header bg-info">
            <h1 class="card-title">
                {{ $title . ' ' . count(Auth::user()->unreadNotifications) }}
            </h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th>Message</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @forelse(Auth::user()->notifications as $key => $notification)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>
                            {{ $notification->data['body'] }}
                        </td>
                        <td>{{ $notification->created_at->diffForHumans() }}</td>
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

        </div>
    </div>
@stop



