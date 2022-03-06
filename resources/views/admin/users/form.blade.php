@extends('layouts.admin')

@section('title')
    @if ($user->email) 
    Editing 
    @else
    Creating
    @endif User   
@endsection

@section('content')
<div class="col-10 bg-light" style="height: 100vh; overflow-x: hidden;">
    <div class="bg-light row">
        <h1 class="mx-4 my-3 col-4"><i class="fa fa-user"></i>
            @if ($user->email) 
                Editing 
            @else
                Creating
            @endif User</h1>
    </div>
    <br><br><br>
    @if (session()->has('success'))
        <div class="alert alert-success mx-auto col-4" role="alert">
            {{session()->get('success')}}
        </div>
    @endif
    <div class="card col-11 mx-auto py-4">
        <form action="@if ($user->email) /admin/users/update/{{$user->uuid}} @else store @endif" method="POST">
            @if ($user->email)
                @method('put')
            @endif
            @csrf
            <div class="row">
                <div class="col-6 px-4">
                    <div class="form-group">
                        <label class="col-form-label">
                            Email
                            <span class="required">*</span>
                        </label>
                        <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}"
                            @if ($user->email)
                                disabled
                            @endif
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        
                    </div>
                </div>
                <div class="col-6 px-4">
                    <div class="form-group">
                        <label class="col-form-label">
                            Name
                            <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $user->name) }}"
                        >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            @if (!$user->email)
                <div class="row">
                    <div class="col-6 px-4">
                        <div class="form-group">
                            <label class="col-form-label">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}"
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            @endif
            
            <div class="row">
                <div class="col-4 ms-auto mt-4">
                    <input class="btn btn-success float-end mx-4" type="submit" value="Save">
                    <a href="/admin/users" class="btn btn-danger float-end mx-4">Back</a>
                </div>
            </div>
        </form>
    </div>

    @if ($user->email)
        <div class="card col-11 mx-auto px-4 py-4 my-4">
            
            <div id="containAccordion" class="row">

                <h5 id="message">User Info</h5>
                <br>
                <div class="accordion" id="accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#passes" aria-expanded="false" aria-controls="collapseOne">
                            Passes
                        </button>
                        </h2>
                        <div id="passes" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            
                            <table class="col-12 table table-striped">
                                <tr>
                                    <th>Device Name</th>
                                    <th>Device Coordinates</th>
                                    <th>Since</th>
                                    <th>Entries</th>
                                    <th>Remove</th>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: center"><a class="btn btn-primary col-4" href="/admin/users/{{$user->uuid}}/passes/create/">Add a new pass</a></td>
                                </tr>
                                @foreach ($user->devices as $device)
                                    <tr>
                                        <td>{{$device->device_name}}</td>
                                        <td>{{$device->coordinates}}</td>
                                        <td>{{$device->created_at}}</td>
                                        <td>{{$user->history->where('device_id', $device->device_id)->count()}}</td>
                                        <td>
                                            <form action="/admin/users/{{$user->uuid}}/passes/destroy/{{$device->uuid}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Remove pass">
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
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manages" aria-expanded="false" aria-controls="collapseOne">
                            Manages
                        </button>
                        </h2>
                        <div id="manages" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            
                            <table class="col-12 table table-striped">
                                <tr>
                                    <th>Device Name</th>
                                    <th>Device Coordinates</th>
                                    <th>Since</th>
                                    <th>Remove</th>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: center"><a class="btn btn-primary col-4" href="/admin/users/{{$user->uuid}}/managers/create/">Add a new device to manage</a></td>
                                </tr>
                                @foreach ($user->managers as $manager)
                                    <tr>
                                        <td>{{$manager->device->device_name}}</td>
                                        <td>{{$manager->device->coordinates}}</td>
                                        <td>{{$manager->created_at}}</td>
                                        <td>
                                            <form action="/admin/users/{{$user->uuid}}/managers/destroy/{{$manager->device->uuid}}" method="POST">
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
                            History
                        </button>
                        </h2>
                        <div id="history" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            
                            <table class="col-12 table table-striped">
                                <tr>
                                    <th>Device Name</th>
                                    <th>Device Coordinates</th>
                                    <th>Date</th>
                                    <th>Remove</th>
                                </tr>
                                @foreach ($user->history as $log)
                                    <tr>
                                        <td>{{$log->device_name}}</td>
                                        <td>{{$log->coordinates}}</td>
                                        <td>{{$log->created_at}}</td>
                                        <td>
                                            <form action="/admin/users/{{$user->uuid}}/history/destroy/{{$log->history_id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Remove history">
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
</div>
    
@endsection