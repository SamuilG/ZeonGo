@extends('layouts.app')

@section('title')
    Admin Dashboard
@endsection

@section('content')

{{-- 

admin/device
admin/user
admin/pass
admin/manager

    
--}}


<div class="row flex-grow-1">
    
    <div class="col-md-6 d-flex h-100 flex-column h-resp">
        <div class="row info p-2">
            <div class="col">
                {{-- Users --}}
                <h3>Search Users</h3>
                <ul class="list-group m-1">
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        {{-- <form class="w-100" action="/addUser/{{ $data['device']->uuid }}" method="POST"> --}}
                        <form class="w-100" method="POST">
                            @csrf
                            {{-- <div class="w-75"> --}}
                                <input class="btn btn-primary float-end" type="submit" value="Search">
                                <input name="email" type="email" placeholder="@error('email'){{$message}}@enderror" class="w-50 form-control @error('email') border border-danger @enderror">
                                
                                @if (session('status'))
                                    <div class="text-danger">User with this email doesn't exist</div>
                                @endif
                            {{-- </div> --}}
                            
                        </form>
                    </li>

                    {{-- това ще е search result --}}
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        <div class="w-37">
                            <p class="m-0">Samuil Georgiev</p>                            
                            <p class="m-0">samuil@zeongo.online</p>
                        </div>

                        <form method="POST">
                            @csrf
                            <input class="btn btn-dark" type="submit" value="More">
                        </form>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        <div class="w-37">
                            <p class="m-0">Samuil Georgiev</p>                            
                            <p class="m-0">samuil@zeongo.online</p>
                        </div>

                        <form method="POST">
                            @csrf
                            <input class="btn btn-dark" type="submit" value="More">
                        </form>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        <div class="w-37">
                            <p class="m-0">Samuil Georgiev</p>                            
                            <p class="m-0">samuil@zeongo.online</p>
                        </div>

                        <form method="POST">
                            @csrf
                            <input class="btn btn-dark" type="submit" value="More">
                        </form>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover"><a href="">View all results</a><a class="text-end" href="">View all users</a></li>
                </ul>

                

            </div>
        </div>
        <div class="row flex-grow-1 p-2 bg-blue">
            <div class="col">
                {{-- Stats --}}
                <h3>Stats</h3>
                <ul class="list-group m-1">
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        Number of users: <p class="m-0 text-end">216 218</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        Number of access points: <p class="m-0 text-end">52 000</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        Successful entries <p class="m-0 text-end">500 043</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        Denied entries <p class="m-0 text-end">379 992</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        User satisfaction: <p class="m-0 text-end">99%</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover"><a href="">View full access history</a></li>
                </ul>

                

            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="">
            
            <h3 class="text-center">Devices</h3>
                
                {{-- Devices --}}
                <ul class="list-group m-1">
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        {{-- <form class="w-100" action="/addUser/{{ $data['device']->uuid }}" method="POST"> --}}
                        <form class="w-100" method="POST">
                            @csrf
                            {{-- <div class="w-75"> --}}
                                <input class="btn btn-primary float-end" type="submit" value="Search">
                                <input name="email" type="email" placeholder="@error('email'){{$message}}@enderror" class="w-50 form-control @error('email') border border-danger @enderror">
                                
                                @if (session('status'))
                                    <div class="text-danger">User with this email doesn't exist</div>
                                @endif
                            {{-- </div> --}}
                            
                        </form>
                    </li>


                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        <div class="w-37">
                            <p class="m-0">deviceNameTuk</p>                            
                            <p class="m-0">managerNameTuk</p>
                        </div>

                        <div class="w-37 float-end">
                            <p class="m-0 text-end">Device Id</p>
                            <p class="m-0 text-end">DeviceIdTuk</p>
                        </div>

                        <form method="POST">
                            @csrf
                            <input class="btn btn-dark" type="submit" value="More">
                        </form>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        <div class="w-37">
                            <p class="m-0">deviceNameTuk</p>                            
                            <p class="m-0">managerNameTuk</p>
                        </div>

                        <div class="w-37 float-end">
                            <p class="m-0 text-end">Device Id</p>
                            <p class="m-0 text-end">DeviceIdTuk</p>
                        </div>

                        <form method="POST">
                            @csrf
                            <input class="btn btn-dark" type="submit" value="More">
                        </form>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        <div class="w-37">
                            <p class="m-0">deviceNameTuk</p>                            
                            <p class="m-0">managerNameTuk</p>
                        </div>

                        <div class="w-37 float-end">
                            <p class="m-0 text-end">Device Id</p>
                            <p class="m-0 text-end">DeviceIdTuk</p>
                        </div>

                        <form method="POST">
                            @csrf
                            <input class="btn btn-dark" type="submit" value="More">
                        </form>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        <div class="w-37">
                            <p class="m-0">deviceNameTuk</p>                            
                            <p class="m-0">managerNameTuk</p>
                        </div>

                        <div class="w-37 float-end">
                            <p class="m-0 text-end">Device Id</p>
                            <p class="m-0 text-end">DeviceIdTuk</p>
                        </div>

                        <form method="POST">
                            @csrf
                            <input class="btn btn-dark" type="submit" value="More">
                        </form>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        <div class="w-37">
                            <p class="m-0">deviceNameTuk</p>                            
                            <p class="m-0">managerNameTuk</p>
                        </div>

                        <div class="w-37 float-end">
                            <p class="m-0 text-end">Device Id</p>
                            <p class="m-0 text-end">DeviceIdTuk</p>
                        </div>

                        <form method="POST">
                            @csrf
                            <input class="btn btn-dark" type="submit" value="More">
                        </form>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        <div class="w-37">
                            <p class="m-0">deviceNameTuk</p>                            
                            <p class="m-0">managerNameTuk</p>
                        </div>

                        <div class="w-37 float-end">
                            <p class="m-0 text-end">Device Id</p>
                            <p class="m-0 text-end">DeviceIdTuk</p>
                        </div>

                        <form method="POST">
                            @csrf
                            <input class="btn btn-dark" type="submit" value="More">
                        </form>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        <div class="w-37">
                            <p class="m-0">deviceNameTuk</p>                            
                            <p class="m-0">managerNameTuk</p>
                        </div>

                        <div class="w-37 float-end">
                            <p class="m-0 text-end">Device Id</p>
                            <p class="m-0 text-end">DeviceIdTuk</p>
                        </div>

                        <form method="POST">
                            @csrf
                            <input class="btn btn-dark" type="submit" value="More">
                        </form>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover"><a href="">View all devices</a></li>
                </ul>

        </div>
    </div>
</div>




@endsection