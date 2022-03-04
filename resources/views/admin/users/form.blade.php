@extends('layouts.admin')

@section('title')
    Creating User    
@endsection

@section('content')
    <div class="bg-light">
        <h1 class="mx-4 float-start my-3"><i class="fa fa-user"></i>
            @if ($user->email) 
                Editing 
            @else
                Creating
            @endif User</h1>
        <a class="btn btn-success float-end my-4 mx-4" href="/admin/users/create">Create User</a>
    </div>
    <br><br><br>
    <div class="">
        <form action="/admin/users/store">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="form--testimonials--user-id" class="col-form-label">
                                Email
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                name="author"
                                id="form--testimonials--author"
                                class="form-control @error('author') is-invalid @enderror"
                                value="{{ old('author', $user->author) }}"
                            >
                            @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="form--testimonials--user-id" class="col-form-label">
                                Author
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                name="author"
                                id="form--testimonials--author"
                                class="form-control @error('author') is-invalid @enderror"
                                value="{{ old('author', $user->author) }}"
                            >
                            @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection