
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
                                <h4 class="card-title">Profile Settings</h4>
                            </div>
                            <form action="{{ route('saveProfile') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $profile->id }}" style="display: none">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <label class="form-lable"> Name</label>
                                            <input class="form-control" type="text" name="name" value="{{ $profile->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <label class="form-lable"> Email (Login Email) </label>
                                            <input class="form-control" type="text" name="email" value="{{ $profile->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <label class="form-label">Password</label>
                                            <input class="form-control" type="password" id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <label class="form-label">Confirm Password</label>
                                            <input class="form-control" type="password" id="conf-password" name="conf-password">
                                            <small id="password-error" class="text-danger" style="display: none;">Passwords do not match</small>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" id="submit-btn">Submit</button>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('conf-password');
            const submitButton = document.getElementById('submit-btn');
            const errorText = document.getElementById('password-error');

            function validatePasswords() {
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                if (password || confirmPassword) {
                    // If either password field is filled, perform validation
                    if (password !== confirmPassword) {
                        errorText.style.display = 'block';
                        submitButton.disabled = true;
                    } else {
                        errorText.style.display = 'none';
                        submitButton.disabled = false;
                    }
                } else {
                    // If both password fields are empty, allow form submission
                    errorText.style.display = 'none';
                    submitButton.disabled = false;
                }
            }

            passwordInput.addEventListener('input', validatePasswords);
            confirmPasswordInput.addEventListener('input', validatePasswords);
        });
    </script>

@endsection
