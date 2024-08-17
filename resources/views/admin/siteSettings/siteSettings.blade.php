
@extends('admin.master')

@section('title')
   Site Settings
@endsection

@section('content')


    <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Site Settings</a></li>
                </ol>
            </div>
        </div>

    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
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
                            <div class="d-flex justify-content-between align-items-center px-4">
                                <h4 class="card-title">Site Settings</h4>
                            </div>
                            <form action="{{ route('saveSettings') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $siteSettings->id }}" style="display: none">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <img src="{{ asset($siteSettings->logo) }}" height="100px" width="200px">
                                            <input class="form-control" type="file" name="logo" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <img src="{{ asset($siteSettings->favicon) }}" height="100px" width="100px">
                                            <input class="form-control" type="file" name="favicon" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <label class="form-lable"> Site Title </label>
                                            <input class="form-control" type="text" name="site_title" value="{{ $siteSettings->site_title }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <label class="form-lable"> Company Email </label>
                                            <input class="form-control" type="text" name="email" value="{{ $siteSettings->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <label class="form-lable"> Company Phone </label>
                                            <input class="form-control" type="text" name="phone" value="{{ $siteSettings->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <label class="form-lable"> Company Address </label>
                                            <input class="form-control" type="text" name="address" value="{{ $siteSettings->address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <label class="form-lable"> Company Facebook  </label>
                                            <input class="form-control" type="text" name="facebook" value="{{ $siteSettings->facebook }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <label class="form-lable"> Company Whatsapp </label>
                                            <input class="form-control" type="text" name="whatsapp" value="{{ $siteSettings->whatsapp }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <label class="form-lable"> Company Linkdin </label>
                                            <input class="form-control" type="text" name="linkdin" value="{{ $siteSettings->linkdin }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <label class="form-lable"> Company Github </label>
                                            <input class="form-control" type="text" name="github" value="{{ $siteSettings->github }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection

@section('customJs')

    <script src="{{ asset('admin-assets') }}/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-assets') }}/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin-assets') }}/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

@endsection
