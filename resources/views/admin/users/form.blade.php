@extends('layouts.admin')

@section('title')
    Creating User    
@endsection

@section('content')
<div class="col-10 bg-light" style="height: 100vh; overflow: hidden">
    <div class="bg-light row">
        <h1 class="mx-4 my-3 col-4"><i class="fa fa-user"></i>
            @if ($user->email) 
                Editing 
            @else
                Creating
            @endif User</h1>
    </div>
    <br><br><br>
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
            <div class="row">
                <div class="col-4 ms-auto">
                    <input class="btn btn-success float-end mx-4" type="submit" value="Save">
                    <a href="/admin/users" class="btn btn-danger float-end mx-4">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
    
@endsection