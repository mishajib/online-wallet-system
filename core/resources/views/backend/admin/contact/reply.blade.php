@extends("layouts.backend.admin.app")

@section('breadcomb', $title)

@section("content")
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h1 class="text-center">Reply to {{
                                    $contact->email
                                    }}</h1>
                                </div>
                                <div class="panel-body text-justify">
                                    <form action="{{ route('admin.reply.message', $contact->id) }}" method="POST">
                                        @csrf
                                        <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope-o"
                                                           aria-hidden="true"></i>
                                                    </span>
                                            <textarea style="width: 100%;"
                                                      name="body"
                                                      id="body"
                                                      rows="10">
                                                {{ old('body') }}
                                            </textarea>
                                        </div>

                                        <div class="text-center custom-pro-edt-ds">
                                            <button title="Click to submit" type="submit"
                                                    class="btn btn-ctl-bt
                                                    waves-effect waves-light
                                                    m-r-10">Reply
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
