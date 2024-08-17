
@extends('admin.master')

@section('title')
   Services
@endsection

@section('content')


    <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Services</a></li>
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
                                <h4 class="card-title">Services</h4>
                                <a class="btn btn-primary text-white" data-toggle="modal" data-target="#AddNew" data-whatever="@getbootstrap">Add New</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Show on Home?</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                        <tr>
                                            <td>{{  $loop->iteration }}</td>
                                            <td><img src="{{  asset($service->image) }}" width="50px" height="50px"></td>
                                            <td>{{  $service->title }}</td>
                                            <td>{{  Str::limit($service->short_desc, 50)}}</td>
                                            <td>{{ $service->showHome == 1 ? 'Yes' : 'No' }}</td>
                                            <td>
                                                @if ($service->status == 1)
                                                    <a class="btn btn-sm btn-success w-100">Active</a>
                                                @else
                                                    <a class="btn btn-sm btn-danger w-100"> Inactive </a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center column-gap-2">
                                                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#EditserviceModal_{{ $service->id }}"><i class="bi bi-pen-fill"></i> Edit</a>
                                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Service?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" id="recipient-name" placeholder="Service Title">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="short_desc" id="recipient-name" placeholder="Service Short Description">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="desc" id="message-text"> Service Description </textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="icon" id="recipient-name" placeholder="Service Icon">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Upload Service Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Service Show On Home ?</label>
                                    <select class="form-control" name="showHome">
                                        <option value="1"> Yes </option>
                                        <option value="2"> No </option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

     {{--    Edit Category Model--}}
     @if(isset($service))
     @foreach($services as $service)
         <div class="modal fade" id="EditserviceModal_{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <!-- Modal content goes here, make sure to customize it for each category -->
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         Edit Service
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             @method('PUT')
                                <div class="form-group">
                                    <label class="col-form-label">Service Name</label>
                                    <input type="text" class="form-control" name="title" id="recipient-name" value="{{  $service->title }}">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Service Site Link</label>
                                    <input type="text" class="form-control" name="short_desc" id="recipient-name" value="{{ $service->short_desc }}">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Service Description</label>
                                    <textarea class="form-control" name="desc" id="message-text"> {{ $service->desc }} </textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Service Icon</label>
                                    <input type="text" class="form-control" name="icon" id="recipient-name" value="{{ $service->icon }}">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Upload Service Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                    <p class="mb-2 mt-2">Previous Image: </p>
                                    <img src="{{ asset($service->image) }}" class="mt-2" width="100px" height="100px">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Service Show On Home?</label>
                                    <select class="form-control" name="showHome">
                                        <option value="1" {{ $service->showHome == 1 ? 'selected' : '' }}> Yes </option>
                                        <option value="2" {{ $service->showHome == 2 ? 'selected' : '' }}> No </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Service Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1" {{ $service->status == 1 ? 'selected' : '' }}> Active </option>
                                        <option value="2" {{ $service->status == 2 ? 'selected' : '' }}> Inactive </option>
                                    </select>
                                </div>

                             <button type="submit" class="btn btn-primary">Update</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     @endforeach
    @endif

@endsection

@section('customJs')

    <script src="{{ asset('admin-assets') }}/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-assets') }}/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin-assets') }}/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

@endsection
