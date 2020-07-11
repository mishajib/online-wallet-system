@extends("layouts.backend.admin.app")

@section("content")
    <div class="panel">
        <div class="panel-heading">
            <H1>{{ $title }}</H1>
        </div>

        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Balance</th>
                    <th>Ref By</th>
                    <th>Joined</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                    @if(!empty($user))
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ number_format($user->balance, 2) }}</td>
                        <td>
                            @if(empty($user->user->name))
                                <span
                                    class="text-danger">{{ __("Not found!!!") }}</span>
                            @else
                                {{ $user->user->name }}
                            @endif
                        </td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                            @if($user->status == 1)
                                <span
                                    class="badge badge-success text-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a title="Click to edit user"
                               class="btn btn-warning btn-sm"
                               href="{{ route('admin.user.edit', $user->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a title="Click to show user information"
                               class="btn btn-sm btn-info"
                               href="{{ route('admin.user.show', $user->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @else
                    <h3><span
                            class="text-danger">{{ __('No user found!!!') }}</span>
                    </h3>
                @endif

            </table>
        </div>
    </div>
@stop
