@extends("layouts.backend.admin.app")


@section('breadcomb', $title)

@section("content")
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Interest List</h4>
                        <div class="add-product">
                            <a title="Add interest" href="{{ route('admin.interest.create') }}">Add Interest</a>
                        </div>
                        <table>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Percent</th>
                                <th>Created AT</th>
                                <th>Updated AT</th>
                                <th>Action</th>
                            </tr>
                            @forelse($interests as $key => $interest)
                                <tr>

                                    <td>{{ $interests->firstItem()+$key }}</td>
                                    <td>{{ $interest->name }}</td>
                                    <td>{{ $interest->percent }}</td>
                                    <td>{{ $interest->created_at->diffForHumans() }}</td>
                                    <td>{{ $interest->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <button title="Click to give interest to all users" onclick="giveInterest({{ $interest->id }})" class="btn btn-sm btn-warning waves-effect" type="button">
                                            <i style="font-size: 15px;" class="fa fa-check"></i>
                                            <form id="interest-form-{{ $interest->id }}" action="{{ route('admin.interest.give', $interest->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                        </button>

                                        <a title="Edit interest" class="btn btn-sm btn-info" href="{{ route('admin.interest.edit', $interest->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <button title="Delete interest" onclick="deleteItem({{ $interest->id }})" class="btn btn-danger waves-effect" type="button">
                                            <i style="font-size: 15px;" class="fa fa-trash"></i>
                                            <form id="delete-form-{{ $interest->id }}" action="{{ route('admin.interest.destroy', $interest->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </button>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <h1 class="text-center">
                                            <span class="text-danger">{{ __('No interest found!!!') }}</span>
                                        </h1>
                                    </td>
                                </tr>
                            @endforelse

                        </table>
                        <div class="custom-pagination">
                            <ul class="pagination">
                                {{ $interests->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
