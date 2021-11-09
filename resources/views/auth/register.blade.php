@extends('layouts.auth')

@section('title')
    Register
@endsection


@section('form')
        <form action="{{ route('register') }}" method="POST">
            @csrf
            {{-- Email --}}
            <div class="form-group">
                <label for="email" class="text-white" style="float: left">Email address</label>
                <input type="email" class="form-control @error('email') border border-danger @enderror" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger"> {{$message}} </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name" class="text-white" style="float: left">Name</label>
                <input type="text" class="form-control @error('name') border border-danger @enderror" id="name" name="name" placeholder="Enter your first and last name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger"> {{$message}} </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="text-white" style="float: left">Password</label>
                <input type="password" class="form-control @error('password') border border-danger @enderror" id="password" name="password" placeholder="Password">
                @error('password')
                    <div class="text-danger"> {{$message}} </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="text-white" style="float: left">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat password">
            </div>
            <button type="submit" id="create" class="btn btn-primary col-7 mt-3">Create an account</button>
        </form>
@endsection