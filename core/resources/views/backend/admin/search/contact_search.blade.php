@extends("layouts.backend.admin.app")

@section('breadcomb', $title)

@section("content")
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Search Result for:  {{ $title }}</h4>
                        <table>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Sent Time</th>
                                <th>Action</th>
                            </tr>
                            @forelse($contacts as $key => $contact)
                                <tr class="unread">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>
                                        {{
                                        $contact->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info"
                                           title="Click to show details"
                                           href="{{ route('admin.show.message', $contact->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <a class="btn btn-sm btn-primary"
                                           title="Click to reply"
                                           href="{{ route('admin.send.reply.message', $contact->id)
                                           }}">
                                            <i class="fa fa-mail-reply"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <h1 class="text-center">
                                            <span
                                                class="text-danger">{{ __('No
                                                 contact found!!!') }}</span>
                                        </h1>
                                    </td>
                                </tr>
                            @endforelse

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
