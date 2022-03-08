@extends('layouts.admin')

@section('title')
    @if ($device->device_name) 
    Editing 
    @else
    Creating
    @endif Device    
@endsection

@section('content')
{{-- <div class="col-10 bg-light" style="height: 100vh; overflow-x: hidden;"> --}}
    <div class="bg-light row">
        <h1 class="mx-4 my-3 col-4"><i class="fa fa-video"></i>
            @if ($device->device_name) 
                Editing 
            @else
                Creating
            @endif Device</h1>
    </div>
    <br><br><br>
    @if (session()->has('success'))
        <div class="alert alert-success mx-auto col-4" role="alert">
            {{session()->get('success')}}
        </div>
    @endif
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

                <h5 id="message">Device Info</h5>
                <br>
                <div class="accordion" id="accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#users" aria-expanded="false" aria-controls="collapseOne">
                            Users
                        </button>
                        </h2>
                        <div id="users" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            
                            <table class="col-12 table table-striped">
                                <tr>
                                    <th>User id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Since</th>
                                    <th>Entries</th>
                                    <th>Remove</th>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: center"><a class="btn btn-primary col-4" href="/admin/devices/{{$device->uuid}}/passes/create/">Add a new user</a></td>
                                </tr>
                                @foreach ($device->users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$device->history->where('email', $user->email)->count()}}</td>
                                        <td>
                                            <form action="/admin/devices/{{$device->uuid}}/passes/destroy/{{$user->uuid}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Remove user">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>     
                            
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#managers" aria-expanded="false" aria-controls="collapseOne">
                            Managers
                        </button>
                        </h2>
                        <div id="managers" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            
                            <table class="col-12 table table-striped">
                                <tr>
                                    <th>User id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Since</th>
                                    <th>Remove</th>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: center"><a class="btn btn-primary col-4" href="/admin/devices/{{$device->uuid}}/managers/create/">Add a new manager</a></td>
                                </tr> 
                                @foreach ($device->managersFullData as $manager)
                                    <tr>
                                        <td>{{$manager->user->id}}</td>
                                        <td>{{$manager->user->name}}</td>
                                        <td>{{$manager->user->email}}</td>
                                        <td>{{$manager->created_at}}</td>
                                        <td>
                                            <form action="/admin/devices/{{$device->uuid}}/managers/destroy/{{$manager->user_id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Remove manager">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>     
                            
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#history" aria-expanded="false" aria-controls="collapseOne">
                            Access history
                        </button>
                        </h2>
                        <div id="history" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            
                            <table class="col-12 table table-striped">
                                <tr>
                                    <th>Log id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Remove</th>
                                </tr>
                                @foreach ($device->history as $log)
                                    <tr>
                                        <td>{{$log->id}}</td>
                                        <td>{{$log->name}}</td>
                                        <td>{{$log->email}}</td>
                                        <td>{{$log->created_at}}</td>
                                        <td>
                                            <form action="/admin/devices/{{$device->uuid}}/history/destroy/{{$log->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Remove log">
                                            </form>
                                        </td>
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
    
{{-- </div> --}}
    
@endsection