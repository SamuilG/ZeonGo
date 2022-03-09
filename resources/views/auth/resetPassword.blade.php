@extends('layouts.auth')

@section('title')
    Reset Password
@endsection


@section('form')


@if (session('status'))
<div class="text-danger">
    <h5>{{ session('status') }}</h5>
</div>

@endif
<form action="/resetPassword" method="POST">
    @csrf
    <div class="form-group">
        <label for="password" class="text-white" style="float: left">New Password</label>
        <input type="password" class="form-control @error('password') border border-danger @enderror" id="password" name="password" placeholder="Password">
        @error('password')
            <div class="text-danger"> {{$message}} </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password_confirmation" class="text-white" style="float: left">Confirm New Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat password">
    </div>
    <button type="submit" id="create" class="btn btn-primary mt-3 float-end">Reset password</button>
</form>
        
@endsection