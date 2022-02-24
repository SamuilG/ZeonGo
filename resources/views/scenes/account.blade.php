@extends('layouts.app')

@section('headContent')
    <link rel="stylesheet" href="/css/use.css">
@endsection

@section('title')
    User Settings
@endsection

@section('content')

<div class="row flex-grow-1">
    
    <div id="containAccordion">

        <h5 id="message"></h5>
        <br>
        <div class="accordion" id="accordion">
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Chanage email
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                <div class="accordion-body">
                    
                            
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInputEmail" placeholder="Email address">
                        <label for="floatingInputEmail">Email address</label>
                    </div>
                    <div id="buttons">
                        <button type='button' class='btn btn-primary' onclick='change_email()'>Save</button>
                    </div>
    
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Change password
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                <div class="accordion-body">
                    
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="oldFloatingPassword" placeholder="Old password">
                        <label for="oldFloatingPassword">Old password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="New password">
                        <label for="floatingPassword">New password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingRepeatPassword" placeholder="Repeat new password">
                        <label for="floatingRepeatPassword">Repeat new password</label>
                    </div>
                    <div id="buttons">
                        <button type='button' class='btn btn-primary' onclick='change_password()'>Save</button>
                    </div>
    
                
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Change name
                </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                <div class="accordion-body">
                
                
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputUsername" placeholder="Username">
                        <label for="floatingInputUsername">Username</label>
                    </div>
                    <div id="buttons">
                        <button type='button' class='btn btn-primary' onclick='change_username()'>Save</button>
                    </div>
    
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
                
            
                    <div id="buttons">
                        <button type='button' class='btn btn-primary' onclick='delete_user()'>Delete</button>
                    </div>
    
    
                </div>
                </div>
            </div>
        </div>
      
        </div>


</div>



@endsection