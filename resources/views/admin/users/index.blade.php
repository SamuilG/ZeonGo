@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')
{{-- <div class="col-10 bg-light" style="height: 100vh; overflow-x: hidden;"> --}}
    <div class="bg-light row">
        <h1 class="mx-4 my-3 col-4 titlesAdmin"><i class="fa fa-user"></i><span>Users</span></h1>
        <a class="btn btn-success  col-3 my-4 ms-auto me-4" href="/admin/users/create">Create User</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success mx-auto col-4" role="alert">
            {{session()->get('success')}}
        </div>
    @endif
    <table class="table table-striped">
        <tr>
            <th class="col-1">Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Email Verified</th>
            <th>Registered on</th>
            <th># of passes</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tr>
            <form action="/admin/users" method="GET">
                <td><input type="text" name="search_id" value='{{request()->get('search_id')}}' placeholder="Search by id" class="form-control"></td>
                <td><input type="text" name="search_name" value='{{request()->get('search_name')}}' placeholder="Search by name" class="form-control "></td>
                <td><input type="text" name="search_email" value='{{request()->get('search_email')}}' placeholder="Search by email" class="form-control "></td>
                <td>
                    <select name="email_verified" class="form-select">
                        <option value="yes">Yes</option>
                        <option value="no" @if (request()->get('email_verified') == 'no') selected @endif>No</option>
                    </select>
                </td>
                <td><input type="date" name="search_registered_on" value="{{request()->get('search_registered_on')}}" class="form-control "></td>
                <td></td>
                <td><input type="submit" value="Search" class="btn btn-primary w-100"></td>
                <td><a href="/admin/users" class="btn btn-danger w-100">Reset</a></td>
            </form>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@if ($user->email_verified == 1) Yes @else No @endif</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->devices->count()}}</td>
                <td><a class="btn btn-success w-100" href="/admin/users/edit/{{$user->uuid}}">Edit</a></td>
                <td>
                    @if ($user->isAdmin())
                        
                    @else
                        <form action="/admin/users/destroy/{{$user->uuid}}" method="POST" onsubmit="return confirm('Do you really want to delete {{$user->name}}?');">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger w-100">
                        </form>
                    @endif
                    
                </td>
            </tr>
        @endforeach
        
    </table>
    <div class="w-100">
        <div class="mx-auto">
            {{ $users->appends(app('request')->all())->links() }}
            {{-- {{$users->links()}} --}}
        </div>
    </div>

{{-- </div> --}}
    
@endsection