@extends('layouts.app')

@section('headContent')
    <link rel="stylesheet" href="/css/use.css">
@endsection

@section('title')
    {{$user->name}}
@endsection

@section('content')

<div class="row flex-grow-1">
    
    <div>

        <h2 class="text-center pt-3">{{$user->name}}</h2>

        <h5 id="message"></h5>
        <br>
            
        <form action="/admin/updateUser/{{$user->uuid}}" method="POST">
            @csrf
            
            <div class="form-group changeDeviceGroup"> 
                <label for="device_name" class="form-label">Change name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
            </div>

            <div class="form-group changeDeviceGroup"> 
                <label for="device_name" class="form-label">Change email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
            </div>

            
            {{-- optional for admin --}}
            <div class="form-group changeDeviceGroup">
                <label class="form-label" for="coordinates">Change password</label>
                <input type="text" class="form-control" id="password" name="password" value="">
            </div>

            <input type="submit" value="Update user" class="btn btn-primary">
        </form>
        <br>

        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Delete account
            </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">
            <div class="accordion-body">
            
        
                <div id="buttons">
                    <a type='button' class='btn btn-primary' href="/admin/deleteUser/{{$user->uuid}}">Delete now</a>
                </div>


            </div>
            </div>
        </div>
        <br><br>

        <h3>Passes</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Device key</th>
                <th scope="col">Device name</th>
                <th scope="col">Coordinates</th>
                <th scope="col">Approved</th>
                <th scope="col">Revoke pass</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($user->devices as $pass)
                    <tr>
                        <th scope="row">{{$pass->device_key}}</th>
                        <td>{{$pass->device_name}}</td>
                        <td>{{$pass->coordinates}}</td>
                        <td>@if ($pass->approved)
                            Yes
                        @else
                            No
                        @endif</td>
                        <td><a href="/admin/revoke/{{$pass->uuid}}/{{$user->uuid}}" class="btn btn-danger">Revoke</a></td>
                    </tr>
                @endforeach
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
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0
                    @endphp
                    @foreach ($user->history as $history)
                        @php
                            $i++;
                            if($i > 10)
                            {
                                break;
                            }
                        @endphp
                        <tr>
                            <td>{{$history->device_name}}</td>
                            <td>{{$history->coordinates}}</td>
                            <td>{{$history->created_at}}</td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
      
        </div>


</div>



@endsection