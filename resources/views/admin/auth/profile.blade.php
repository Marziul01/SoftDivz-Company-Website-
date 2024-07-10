
@extends('admin.master')

@section('title')
    Profile Settings
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
                <form method="post" action="{{ route('profileUpdate') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $admin->id }}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-black text-center">Profile Details</h4>
                        </div>
                        <div class="card-body" style="display: flex; flex-direction: column; justify-content: center; align-items: center">
                            <div class="w-75">
                                <label>Username: </label>
                                <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
                            </div>
                            <div class="w-75 py-3">
                                <label>E-mail: </label>
                                <input type="email" class="form-control" name="email" value="{{ $admin->email }}">
                            </div>
                            <div class="w-75">
                                <label>Password: </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter 8 digit password">
                            </div>

                            <div class="w-75 py-3">
                                <label>Confirm Password: </label>
                                <input type="password" class="form-control" name="confirm-pass" id="confirm-pass" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px">Save Settings</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
