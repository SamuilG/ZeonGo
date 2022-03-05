@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')
<div class="col-10 bg-light" style="height: 100vh; overflow-x: hidden;">
    <div class="bg-light row">
        <h1 class="mx-4 my-3 col-4"><i class="fa fa-user"></i> Users</h1>
        <a class="btn btn-success  col-1 my-4 ms-auto me-4" href="/admin/users/create">Create User</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success mx-auto col-4" role="alert">
            {{session()->get('success')}}
        </div>
    @endif
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
                <td>
                    <form action="/admin/users/destroy/{{$user->uuid}}" method="POST">
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
            {{$users->links()}}
        </div>
    </div>
</div>
    
@endsection