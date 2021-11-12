@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('form')
            @if (session('status'))
                <div class="text-danger">
                    <h5>{{ session('status') }}</h5>
                </div>
                
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="text-white float-start">Email address</label>
                    <input type="email" class="form-control @error('email') border border-danger @enderror" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger"> {{$message}} </div>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="password" class="text-white float-start">Password</label>
                    <input type="password" class="form-control @error('password') border border-danger @enderror" id="password" name="password" placeholder="Password">
                    @error('password')
                        <div class="text-danger"> {{$message}} </div>
                    @enderror
                </div>
                <div class="form-check pt-3 pb-4">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label float-start" for="remember" role="button">
                        Remember me
                    </label>
                    <label class="form-check-label float-end" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Forgotten password
                    </label>
                </div>
                <button type="submit" class="btn btn-primary col-7 mt-3">Log in</button>
            </form>



    
@endsection


@section('modal')
    


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
@endsection