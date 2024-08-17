@extends('admin.master')

@section('title')
Pricing
@endsection

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Pricing</a></li>
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
                        <h4 class="card-title">Pricing</h4>
                        <a class="btn btn-primary text-white" data-toggle="modal" data-target="#AddNew"
                            data-whatever="@getbootstrap">Add New</a>
                    </div>
                    <div class="row">
                        @foreach ($pricings as $pricing)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        @if ($pricing->status == 1)
                                        <a class="btn btn-sm btn-success w-100">Active</a>
                                        @else
                                        <a class="btn btn-sm btn-danger w-100"> Inactive </a>
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center column-gap-2">
                                        <a class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#EditpricingModal_{{ $pricing->id }}">
                                            <i class="bi bi-pen-fill"></i> Edit
                                        </a>
                                        <form action="{{ route('pricings.destroy', $pricing->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this Pricing?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="bi bi-trash-fill"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-center">{{  $pricing->title }}</h4>
                                    <h2 class="text-center">{{  $pricing->price }}</h2>
                                    <p class="text-center">{{  $pricing->desc}}</p>
                                    @if ($pricing->services)
                                        <div class="mt-3">
                                            <ul class="list-unstyled">
                                                @foreach(explode(',', $pricing->services) as $service)
                                                    <li class="text-center border-bottom-1">{{ trim($service) }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                <h5 class="modal-title" id="exampleModalLabel">Add New Pricing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pricings.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="recipient-name"
                            placeholder="Pricing Title">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="price" id="recipient-name"
                            placeholder="Pricing Price">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="desc" id="message-text"> Pricing Description </textarea>
                    </div>
                    <div class="card mb-3">
                        <h4>Pricing Services</h4>
                        <div id="additionalInfoContainer" class="mb-2"></div>
                        <button type="button" class="btn btn-primary w-100" onclick="addNewInfo()">Add New Pricing Services</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($pricings as $pricing)
<div class="modal fade" id="EditpricingModal_{{ $pricing->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pricing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pricings.update', $pricing->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-form-label">Pricing Title</label>
                        <input type="text" class="form-control" name="title" id="recipient-name"
                            value="{{  $pricing->title }}">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Pricing Price</label>
                        <input type="text" class="form-control" name="price" id="recipient-name"
                            value="{{ $pricing->price }}">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Pricing Description</label>
                        <textarea class="form-control" name="desc" id="message-text"> {{ $pricing->desc }} </textarea>
                    </div>
                    <div class="card mb-3">
                        <h4>Pricing Services</h4>
                        <div id="additionalEditInfoContainer_{{ $pricing->id }}" class="mb-2"></div>
                        <button type="button" class="btn btn-primary w-100" onclick="addEditInfo({{ $pricing->id }})">Add New Pricing Services</button>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Pricing Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{ $pricing->status == 1 ? 'selected' : '' }}> Active </option>
                            <option value="2" {{ $pricing->status == 2 ? 'selected' : '' }}> Inactive </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('customJs')

<script src="{{ asset('admin-assets') }}/plugins/tables/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin-assets') }}/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('admin-assets') }}/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

<script>
function addNewInfo() {
    var container = document.getElementById("additionalInfoContainer");

    var input = createInput("text", "services[]", "Service", "form-control w-100");
    var closeButton = createCloseButton();

    var infoContainer = document.createElement("div");
    infoContainer.className = "additional-info d-flex mb-2";
    infoContainer.appendChild(input);
    infoContainer.appendChild(closeButton);

    container.appendChild(infoContainer);

    closeButton.addEventListener("click", function() {
        container.removeChild(infoContainer);
    });
}

function addEditInfo(pricingId) {
    var container = document.getElementById("additionalEditInfoContainer_" + pricingId);

    var input = createInput("text", "services[]", "Service", "form-control w-100");
    var closeButton = createCloseButton();

    var infoContainer = document.createElement("div");
    infoContainer.className = "additional-info d-flex mb-2";
    infoContainer.appendChild(input);
    infoContainer.appendChild(closeButton);

    container.appendChild(infoContainer);

    closeButton.addEventListener("click", function() {
        container.removeChild(infoContainer);
    });
}

function createInput(type, name, placeholder, className) {
    var input = document.createElement("input");
    input.type = type;
    input.name = name;
    input.placeholder = placeholder;
    input.className = className;
    return input;
}

function createCloseButton() {
    var closeButton = document.createElement("button");
    closeButton.type = "button";
    closeButton.className = "btn btn-danger ml-2";
    closeButton.innerHTML = "Remove";
    return closeButton;
}
document.addEventListener("DOMContentLoaded", function() {
    @foreach($pricings as $pricing)
        $('#EditpricingModal_{{ $pricing->id }}').on('show.bs.modal', function (event) {
            var container = document.getElementById("additionalEditInfoContainer_{{ $pricing->id }}");
            container.innerHTML = ""; // Clear existing contents

            var services = "{{ $pricing->services }}";
            console.log('Services for Pricing ID {{ $pricing->id }}:', services);

            if (services) {
                services.split(',').forEach(function(service) {
                    var trimmedService = service.trim();
                    console.log('Service:', trimmedService);

                    var input = document.createElement("input");
                    input.type = "text";
                    input.name = "services[]";
                    input.placeholder = "Service";
                    input.className = "form-control w-100";
                    input.value = trimmedService; // Assign the value to the input field

                    var closeButton = document.createElement("button");
                    closeButton.type = "button";
                    closeButton.innerHTML = "x";
                    closeButton.className = "btn btn-danger ml-2";

                    var infoContainer = document.createElement("div");
                    infoContainer.className = "additional-info d-flex mb-2";
                    infoContainer.appendChild(input);
                    infoContainer.appendChild(closeButton);

                    container.appendChild(infoContainer);

                    closeButton.addEventListener("click", function() {
                        container.removeChild(infoContainer);
                    });
                });
            }
        });
    @endforeach
});



</script>
@endsection
