@extends('layouts.admin')

@section('title')
    Adding Manager 
@endsection

@section('content')
{{-- <div class="col-10 bg-light" style="height: 100vh; overflow: hidden"> --}}
    <div class="bg-light row">
        <h1 class="mx-4 my-3 col-4">Adding Manager</h1>
    </div>
    <br><br><br>
    @if (session()->has('info'))
        <div class="alert alert-info mx-auto col-4" role="alert">
            {{session()->get('info')}}
        </div>
    @endif
    <div class="card col-11 mx-auto py-4">
        <form action="/admin/users/{{$user->uuid}}/managers/store" method="POST">
            @csrf
            <div class="row">
                <div class="col-6 px-4">
                    <div class="form-group">
                        <label class="col-form-label">
                            Device Key
                            <span class="required">*</span>
                        </label>
                        <input type="text" name="device_key"
                            class="form-control @error('device_key') is-invalid @enderror"
                            value="{{ old('device_key') }}"
                        >
                        @error('device_key')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        
                    </div>
                </div>
                <div class="col-6 px-4">
                    <div class="form-group">
                        <label class="col-form-label">
                            User email
                            <span class="required">*</span>
                        </label>
                        <input type="email" name="email" disabled
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ $user->email }}"
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row float-end">
                <div class="col-4 mt-4 d-flex flex-row">
                    <a href="/admin/users/edit/{{$user->uuid}}" class="btn btn-danger mx-4">Back</a>
                    <input class="btn btn-success mx-4" type="submit" value="Save">
                </div>
            </div>
            
        </form>
    </div>
    
{{-- </div> --}}
    
@endsection