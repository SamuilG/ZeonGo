@extends('layouts.admin')

@section('title')
    Devices
@endsection

@section('content')
{{-- <div class="col-10 bg-light" style="height: 100vh; overflow-x: hidden;"> --}}
    <div class="bg-light row">
        <h1 class="mx-4 my-3 col-4 titlesAdmin"><i class="fa fa-video"></i><span>Devices</span></h1>
        <a class="btn btn-success col-3 my-4 ms-auto me-4" href="/admin/devices/create">Create Device</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success mx-auto col-4" role="alert">
            {{session()->get('success')}}
        </div>
    @endif
    <table class="table table-striped">
        <tr>
            <th>Device key</th>
            <th>Name</th>
            <th>Location</th>
            <th>Users with pass</th>
            <th>Managers</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tr>
            <form action="/admin/devices" method="GET">
                <td><input type="text" name="search_device_key" value='{{request()->get('search_id')}}' placeholder="Search by device key" class="form-control"></td>
                <td><input type="text" name="search_name" value='{{request()->get('search_name')}}' placeholder="Search by name" class="form-control "></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="Search" class="btn btn-primary w-100"></td>
                <td><a href="/admin/devices" class="btn btn-danger w-100">Reset</a></td>
            </form>
        </tr>
        @foreach ($devices as $device)
            <tr>
                <td>{{$device->device_key}}</td>
                <td>{{$device->device_name}}</td>
                <td>{{$device->coordinates}}</td>
                <td>{{$device->users->count()}}</td>
                <td>{{$device->managers->count()}}</td>
                <td><a class="btn btn-success w-100" href="/admin/devices/edit/{{$device->uuid}}">Edit</a></td>
                <td>
                    <form action="/admin/devices/destroy/{{$device->uuid}}" method="POST">
                        @method('delete')
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-danger w-100">
                    </form>
                </td>
            </tr>
        @endforeach
        
    </table>
    <div class="w-100">
        <div class="mx-auto">
            {{$devices->links()}}
        </div>
    </div>
{{-- </div> --}}
    
@endsection