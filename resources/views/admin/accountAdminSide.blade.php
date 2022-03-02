@extends('layouts.app')

@section('headContent')
    <link rel="stylesheet" href="/css/use.css">
@endsection

@section('title')
    User{{-- тук име на потребителя --}}
@endsection

@section('content')

<div class="row flex-grow-1">
    
    <div>

        <h2 class="text-center pt-3">USER NAME HERE</h2>
            {{-- като зареди страницата да му зареди сегашните данни в полетата --}}

        <h5 id="message"></h5>
        <br>
        {{-- <div class="accordion" id="accordion"> --}}
            
            <div class="accordion-item">
                <p class="accordion-header ps-4 pt-2">
                    Chanage email
                </p>
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
            <div class="accordion-item">
                <p class="accordion-header ps-4 pt-2">
                    Change password
                </p>
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
            <div class="accordion-item">
                <p class="accordion-header ps-4 pt-2">
                    Change name
                </p>
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
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Delete account
                </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">
                <div class="accordion-body">
                
            
                    <div id="buttons">
                        <button type='button' class='btn btn-primary' onclick='delete_user()'>Delete now</button>
                    </div>
    
    
                </div>
                </div>
            </div>
        {{-- </div> --}}
        <br><br>

        <h3>Passes</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Device key</th>
                <th scope="col">Device name</th>
                <th scope="col">Coordinates</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">dfgdsf</th>
                <td>MQSTO</td>
                <td>33.23232. 32.67767</td>
              </tr>
              <tr>
                <th scope="row">fdgddfg</th>
                <td>PMG VAZOV</td>
                <td>22.42324, 56.2452</td>
              </tr>
              <tr>
                <th scope="row">dfgdfg</th>
                <td>EG GEO MILEV</td>
                <td>53.5453, 24.52332</td>
              </tr>
            </tbody>
          </table>
          <br><br>
  
          <h3>History</h3>
          <table class="table">
              <thead>
                <tr>
                    <th scope="col">Device key</th>
                    <th scope="col">Device name</th>
                    <th scope="col">Coordinates</th>
                    <th scope="col">Timestamp</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">dfgdsf</th>
                    <td>MQSTO</td>
                    <td>33.23232. 32.67767</td>
                    <td>23.02.2022 11:45</td>
                  </tr>
                  <tr>
                    <th scope="row">fdgddfg</th>
                    <td>PMG VAZOV</td>
                    <td>22.42324, 56.2452</td>
                    <td>23.02.2022 11:45</td>
                  </tr>
                  <tr>
                    <th scope="row">dfgdfg</th>
                    <td>EG GEO MILEV</td>
                    <td>53.5453, 24.52332</td>
                    <td>23.02.2022 11:45</td>
                  </tr>
              </tbody>
            </table>
      
        </div>


</div>



@endsection