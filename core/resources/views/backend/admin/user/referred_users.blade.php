@extends("layouts.backend.admin.app")

@section('breadcomb', $title)

@section("content")
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Referred User List</h4>
                        <form action="{{ route('admin.user.search.referred') }}" method="GET" class="navbar-form navbar-right">
                            <div class="form-group">
                                <input type="text" name="query" class="form-control" placeholder="Search User">
                            </div>
                        </form>
                        <table>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Balance</th>
                                <th>Ref By</th>
                                <th>Joined</th>
                                <th>Action</th>
                            </tr>
                            @forelse($users as $key => $user)
                                <tr>
                                    <td>{{ $users->firstItem()+$key }}</td>
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
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>
                                        <img class="img-circle img-responsive" src="{{ asset('assets/uploads/profile/' . $user->image) }}" alt="{{ $user->slug }}">
                                    </td>
                                    <td>
                                        <a title="Click to edit user" class="btn btn-warning btn-sm" href="{{ route('admin.user.edit', $user->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a title="Click to show user information" class="btn btn-sm btn-info" href="{{ route('admin.user.show', $user->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <h3><span class="text-danger">{{ __('No user found!!!') }}</span></h3>
                            @endforelse

                        </table>
                        <div class="custom-pagination">
                            <ul class="pagination">
                                {{ $users->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
