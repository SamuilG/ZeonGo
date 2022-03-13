@extends('layouts.app')

@section('headContent')
    <link rel="stylesheet" href="/css/use.css">
@endsection

@section('title')
    User Settings
@endsection

@section('content')

<div class="row">
    @if (session()->has('success'))
        <div class="alert alert-success mx-auto col-4 mt-2" role="alert">
            {{session()->get('success')}}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger mx-auto col-4 mt-2" role="alert">
            {{session()->get('error')}}
        </div>
    @endif
    <div id="containAccordion">

        <h5 id="message"></h5>
        <br>
        <div class="accordion" id="accordion">
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#changeEmail" aria-expanded="false" aria-controls="collapseOne">
                    Chanage email
                </button>
                </h2>
                <div id="changeEmail" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                <div class="accordion-body">   
                    <form action="/changeEmail" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" value="{{ old('email', auth()->user()->email)}}" class="form-control @error('email') border border-danger @enderror" name="email" id="floatingInputEmail" placeholder="Email address">
                            <label for="floatingInputEmail">Email address</label>
                        </div>
                        @error('email')
                            <script>
                                let changeEmail = new bootstrap.Collapse(document.getElementById('changeEmail'));
                                changeEmail.show();
                            </script> 
                            <p class="text-danger">
                                {{$message}}
                            </p>
                        @enderror
                        <div id="buttons">
                            <input type='submit' class='btn btn-primary' value="Change Email">
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#changePassword" aria-expanded="false" aria-controls="collapseTwo">
                    Change password
                </button>
                </h2>
                <div id="changePassword" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <form action="changePassword" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="password" name="old_password" class="form-control @error('old_password') border border-danger @enderror" id="oldFloatingPassword" placeholder="Old password">
                            <label for="oldFloatingPassword">Old password</label>
                            @error('old_password')
                                <script>
                                    let changePassword = new bootstrap.Collapse(document.getElementById('changePassword'));
                                    changePassword.show();
                                </script> 
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control @error('password') border border-danger @enderror" id="floatingPassword" placeholder="New password">
                            <label for="floatingPassword">New password</label>
                            @error('password')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                            
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmed') border border-danger @enderror" id="floatingRepeatPassword" placeholder="Repeat new password">
                            <label for="floatingRepeatPassword">Repeat new password</label>
                            @error('password_confirmed')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div id="buttons">
                            <input type='submit' class='btn btn-primary' value="Change Password">
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#changeName" aria-expanded="false" aria-controls="collapseThree">
                    Change name
                </button>
                </h2>
                <div id="changeName" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <form action="/changeName" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control @error('name') border border-danger @enderror" id="floatingInputUsername" placeholder="Username">
                            <label for="floatingInputUsername">Name</label>
                            @error('name')
                                <script>
                                    let changeName = new bootstrap.Collapse(document.getElementById('changeName'));
                                    changeName.show();
                                </script> 
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div id="buttons">
                            <input type='submit' class='btn btn-primary' value="Change Name">
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Delete account
                </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <form action="/deleteAccount" method="post">
                        @csrf
                        <div id="buttons">
                            <input type='submit' class='btn btn-danger' value="Delete">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
      
        </div>


</div>



@endsection