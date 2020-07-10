@extends("layouts.backend.admin.app")

@section("title", $contact->subject)

@section('breadcomb', $contact->subject)

@section("content")
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h1 class="text-center">Name: {{
                                    $contact->name
                                    }}</h1>
                                    <h2 class="text-center">Email: {{
                                    $contact->email }}</h2>
                                    <p class="text-center">
                                        <a class="btn btn-primary" href="{{
                                        route('admin.send.reply.message',
                                        $contact->id) }}">Reply</a>
                                    </p>
                                </div>
                                <div class="panel-body text-justify">
                                    <h3>Subject: {{ $contact->subject }}</h3>
                                    <p>
                                        {{ $contact->body }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
