@extends('layouts.enlayout')

@section('left-side')
    <form>
        @csrf
        {{-- Email --}}
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email"placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your first and last name">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="password_confirm">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Repeat password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection


@section('right-side')
    <img src="/images/registerpic.jpg"
@endsection