@extends('layouts.admin')

@section('title')
    @if ($device->device_name) 
    Editing 
    @else
    Creating
    @endif Device    
@endsection

@section('content')
<div class="col-10 bg-light" style="height: 100vh; overflow: hidden">
    <div class="bg-light row">
        <h1 class="mx-4 my-3 col-4"><i class="fa fa-video"></i>
            @if ($device->device_name) 
                Editing 
            @else
                Creating
            @endif Device</h1>
    </div>
    <br><br><br>
    <div class="card col-11 mx-auto py-4">
        <form action="@if ($device->device_name) /admin/devices/update/{{$device->uuid}} @else store @endif" method="POST">
            @if ($device->device_name)
                @method('put')
            @endif
            @csrf
            <div class="row">
                <div class="col-6 px-4">
                    <div class="form-group">
                        <label class="col-form-label">
                            Name
                            <span class="required">*</span>
                        </label>
                        <input type="text" name="device_name"
                            class="form-control @error('device_name') is-invalid @enderror"
                            value="{{ old('device_name', $device->device_name) }}"
                        >
                        @error('device_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        
                    </div>
                </div>
                <div class="col-6 px-4">
                    <div class="form-group">
                        <label class="col-form-label">
                            Coordinates
                            <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            name="coordinates"
                            class="form-control @error('coordinates') is-invalid @enderror"
                            value="{{ old('coordinates', $device->coordinates) }}"
                        >
                        @error('coordinates')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-4">
                    <div class="form-group">
                        <label class="col-form-label">
                            Description
                            <span class="required">*</span>
                        </label>
                        <textarea
                            type="text"
                            name="device_description"
                            rows="3"
                            class="form-control @error('device_description') is-invalid @enderror"
                            value="{{ old('device_description') }}"
                        >{{ old('device_description', $device->device_description) }}</textarea>
                        @error('device_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 ms-auto mt-4">
                    <input class="btn btn-success float-end mx-4" type="submit" value="Save">
                    <a href="/admin/devices" class="btn btn-danger float-end mx-4">Back</a>
                </div>
            </div>
        </form>
    </div>

    @if ($device->device_name)
        <div class="card col-11 mx-auto px-4 py-4 my-4">
            
            <div id="containAccordion" class="row">

                <h5 id="message"></h5>
                <br>
                <div class="accordion" id="accordion">
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Managers
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            
                            <table class="col-12 table table-striped">
                                <th>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Remove</td>
                                </th>
                                @foreach ($device->managersFullData as $manager)
                                    <tr>
                                        <td>{{$manager->user->id}}</td>
                                        <td>{{$manager->user->name}}</td>
                                        <td>{{$manager->user->email}}</td>
                                        <td>remove button</td>
                                    </tr>
                                @endforeach    
                            </table>     
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif
    
</div>
    
@endsection