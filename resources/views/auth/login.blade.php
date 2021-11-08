@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('form')
        <div style="text-align: center">
            @if (session('status'))
                <div class="text-danger">
                    <h5>{{ session('status') }}</h5>
                </div>
                
            @endif
            <form action="{{ route('login') }}" method="POST">
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
                    <label for="password" class="text-white" style="float: left">Password</label>
                    <input type="password" class="form-control @error('password') border border-danger @enderror" id="password" name="password" placeholder="Password">
                    @error('password')
                        <div class="text-danger"> {{$message}} </div>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary col-8">Log in</button>
            </form>
        </div>  



    
@endsection