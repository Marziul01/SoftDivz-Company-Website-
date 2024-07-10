
@extends('admin.master')

@section('title')
    Site Settings
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.auth.message')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="alert-ul">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-6 offset-md-3">
                <form method="post" action="{{ route('settingsUpdate') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-black text-center">Site Settings</h4>
                        </div>
                        <div class="card-body" style="display: flex; flex-direction: column; justify-content: center; align-items: center">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Logo: </label>
                                    <input type="file" class="form-control" name="logo" accept="image/*">
                                    <p style="margin-bottom: -5px !important;">Previous Logo:</p>
                                    <img class="mt-2" src="{{ asset($settings->logo) }}" width="50%">
                                </div>
                                <div class="col-md-6">
                                    <label>Favicon: </label>
                                    <input type="file" class="form-control" name="favicon" accept="image/*" >
                                    <p style="margin-bottom: -5px !important;">Previous Favicon:</p>
                                    <img class="mt-2" src="{{ asset($settings->favicon) }}" width="50%">
                                </div>
                                <div class="col-md-6 py-2">
                                    <label>Title: </label>
                                    <input type="text" class="form-control" name="title" value="{{$settings->title}}">
                                </div>
                                <div class="col-md-6 py-2">
                                    <label>Agent List Link: </label>
                                    <input type="text" class="form-control" name="agent_list_link" value="{{$settings->agent_list_link}}">
                                </div>
                                <div class="col-md-6">
                                    <label>Registration System Link: </label>
                                    <input type="text" class="form-control" name="registration_system_link" value="{{$settings->registration_system_link}}">
                                </div>
                                <div class="col-md-6">
                                    <label>Footer Text: </label>
                                    <input type="text" class="form-control" name="footer_text" value="{{$settings->footer_text}}">
                                </div>
                                <div class="col-md-6 py-2">
                                    <label>Footer Link: </label>
                                    <input type="text" class="form-control" name="footer_link" value="{{$settings->footer_link}}">
                                </div>

                                <button type="submit" class="btn btn-primary mt-5" style="margin-top: 20px">Save Settings</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
