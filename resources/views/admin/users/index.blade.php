@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')
    <div class="bg-light">
        <h1 class="mx-4 float-start my-3"><i class="fa fa-user"></i> Users</h1>
        <a class="btn btn-success float-end my-4 mx-4" href="/admin/users/create">Create User</a>
    </div>
    <table class="table table-striped">
        <th>
            <td>Name</td>
            <td>Email</td>
            <td>Email Verified</td>
            <td>Registered on</td>
            <td>Edit</td>
            <td>Delete</td>
        </th>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@if ($user->email_verified == 1) Yes @else No @endif</td>
                <td>{{$user->created_at}}</td>
                <td><a class="btn btn-success" href="/admin/users/edit/{{$user->uuid}}">Edit</a></td>
                <td><a class="btn btn-danger" href="/admin/users/destroy/{{$user->uuid}}">Delete</a></td>
            </tr>
        @endforeach
        
    </table>
    <div class="w-100">
        <div class="mx-auto">
            {{$users->links()}}
        </div>
    </div>
@endsection