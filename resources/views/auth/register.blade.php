@extends('layouts.auth')

@section('title')
    Register
@endsection


@section('form')
    <div class="card bg-light ">
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                {{-- Email --}}
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control @error('email') border border-danger @enderror" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger"> {{$message}} </div>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') border border-danger @enderror" id="name" name="name" placeholder="Enter your first and last name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger"> {{$message}} </div>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') border border-danger @enderror" id="password" name="password" placeholder="Password">
                    @error('password')
                        <div class="text-danger"> {{$message}} </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat password">
                </div>
                <br>
                <button type="submit" class="btn btn-primary col-8">Create an account</button>
            </form>
        </div>
    </div>



    
@endsection