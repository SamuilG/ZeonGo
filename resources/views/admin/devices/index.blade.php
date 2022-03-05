@extends('layouts.admin')

@section('title')
    Devices
@endsection

@section('content')
<div class="col-10 bg-light" style="height: 100vh; overflow-x: hidden;">
    <div class="bg-light row">
        <h1 class="mx-4 my-3 col-4"><i class="fa fa-video"></i> Devices</h1>
        <a class="btn btn-success  col-2 my-4 ms-auto me-4" href="/admin/devices/create">Create Device</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success mx-auto col-4" role="alert">
            {{session()->get('success')}}
        </div>
    @endif
    <table class="table table-striped">
        <th>
            <td>Name</td>
            <td>Location</td>
            <td>Users with pass</td>
            <td>Managers</td>
            <td>Edit</td>
            <td>Delete</td>
        </th>
        @foreach ($devices as $device)
            <tr>
                <td>{{$device->device_key}}</td>
                <td>{{$device->device_name}}</td>
                <td>{{$device->coordinates}}</td>
                <td>{{$device->users->count()}}</td>
                <td>{{$device->managers->count()}}</td>
                <td><a class="btn btn-success" href="/admin/devices/edit/{{$device->uuid}}">Edit</a></td>
                <td>
                    <form action="/admin/devices/destroy/{{$device->uuid}}" method="POST">
                        @method('delete')
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-danger">
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
</div>
    
@endsection