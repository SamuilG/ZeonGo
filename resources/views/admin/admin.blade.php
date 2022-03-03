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
                        <form class="w-100" method="GET">
                            @csrf
                            {{-- <div class="w-75"> --}}
                                <input class="btn btn-primary float-end" type="submit" value="Search">
                                <input name="user_search" type="email" placeholder="Search for email" class="w-50 form-control @error('user_search') border border-danger @enderror">
                                
                                @if (session('status'))
                                    <div class="text-danger">User with this email doesn't exist</div>
                                @endif
                            {{-- </div> --}}
                            
                        </form>
                        <a class="btn btn-danger float-end mx-1" href="{{route('admin.index')}}">Clear</a>
                    </li>

                    {{-- това ще е search result --}}
                    @php
                        $i = 0;
                    @endphp
                    @if (count($users))
                        @foreach ($users as $user)
                            @php
                                $i++;
                                if($i > 3)
                                {
                                    break;
                                }
                            @endphp
                            <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                                <div class="w-37">
                                    <p class="m-0">{{$user->name}}</p>                            
                                    <p class="m-0">{{$user->email}}</p>
                                </div>

                                <form method="POST">
                                    @csrf
                                    <input class="btn btn-dark" type="submit" value="More">
                                </form>

                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                            There are no results
                        </li>
                    @endif
                    
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover"><a href="">View all users  </a></li>
                </ul>

                

            </div>
        </div>
        <div class="row flex-grow-1 p-2 bg-blue">
            <div class="col">
                {{-- Stats --}}
                <h3>Stats</h3>
                <ul class="list-group m-1">
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        Number of users: <p class="m-0 text-end">{{count($users)}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        Number of devices: <p class="m-0 text-end">{{count($devices)}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        Successful entries <p class="m-0 text-end">{{count($history)}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        Number of passes<p class="m-0 text-end">{{count($passes)}}</p>
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
                        <form class="w-100" method="GET">
                            @csrf
                            {{-- <div class="w-75"> --}}
                                <input class="btn btn-primary float-end" type="submit" value="Search">
                                <input name="device_search" type="text" placeholder="Enter device name" class="w-50 form-control">
                            {{-- </div> --}}
                            
                        </form>
                        <a class="btn btn-danger float-end mx-1" href="{{route('admin.index')}}">Clear</a>
                    </li>
                    @php
                        $i = 0
                    @endphp
                    @foreach ($devices as $device)
                        @php
                            $i++;
                            if($i > 5)
                            {
                                break;
                            }
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                            <div class="w-37">
                                <p class="m-0">{{$device->device_name}}</p>
                                {{-- {{dd($device->managers->first()->user->name)}} --}}
                                <p class="m-0">Manager: {{ $device->managers()->first()->user->name ?? 'Not set' }}</p>
                            </div>

                            <div class="w-37 float-end">
                                <p class="m-0 text-end">Device Id: {{$device->id}}</p>
                            </div>

                            <form method="POST">
                                @csrf
                                <input class="btn btn-dark" type="submit" value="More">
                            </form>

                        </li>
                    @endforeach
                   
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover"><a href="">View all devices</a></li>
                </ul>

        </div>
    </div>
</div>




@endsection