@extends("layouts.backend.admin.app")

@section('breadcomb', $title)

@section("content")
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>User IP Logs</h4>
                        <table>
                            <tr>
                                <th>Serial No</th>
                                <th>User ID</th>
                                <th>IP Address</th>
                                <th>Location</th>
                                <th>Machine Name</th>
                            </tr>
                            @forelse($logs as $key => $log)
                                <tr>

                                    <td>{{ $logs->firstItem()+$key }}</td>
                                    <td>{{ $log->user->name }}</td>
                                    <td>{{ $log->ip }}</td>
                                    <td>
                                        @if(\Location::get($log->ip))
                                            {{ \Location::get($log->ip)->countryName }}
                                        @else
                                            <span class="text-danger">Not found !!!</span>
                                        @endif
                                    </td>
                                    <td>{{ $log->machine_name }}</td>
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
                                {{ $logs->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
