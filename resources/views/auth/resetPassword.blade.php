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
    {{-- Email --}}
    <div class="form-group">
        <input type="email" class="form-control @error('email') border border-danger @enderror" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
        @error('email')
            <div class="text-danger"> {{$message}} </div>
        @enderror
    </div>
    <button type="submit" id="create" class="btn btn-primary mt-3 float-end">Reset password</button>
</form>
        
@endsection