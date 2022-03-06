@extends('layouts.app')

@section('headContent')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
@endsection

@section('title')
    Home
@endsection

@section('content')

<div class="row flex-grow-1">
    <div class="qrCode p-2" style="display: none;">
        <img src="{{ $data['key'] }}" class="img-fluid" alt="The qr code">
    </div>
    <div class="col-md-8 d-flex h-100 flex-column">
        <div class="row locations">
            <div class="col h-100">
                


                {{-- <div class="col-8 h-100"> --}}
                    <div class="container-fluid h-100 d-flex overflow-auto">
                        <div class="row flex-grow-1 flex-nowrap overflow-auto zoom-zoom">
    
                            @foreach ($data['devices'] as $device)
                            <div class="col-card p-3 ps-2 pe-2 card-zoom">
                                <div class="card h-100 card-block bg-dark">
                                    <div class="card-body overflow-auto">
                                        <h4 class="card-title text-white pb-2">{{$device->device_name}}</h4>
                                        <p class="card-text text-white">
                                            {{-- Check if there are users waiting to be approved --}}
                                            @if ($data['awaitingUsers']->contains('device_id' ,$device->id))
                                                <span class="text-danger">There are users awaiting approval</span> <br>
                                            @endif
                                            {{-- if the user is not approved tell him to waiting --}}
                                            @if (!$device->approved)
                                                <span class="text-danger">Access pending</span> <br>
                                            @endif
                                            {{ $device->device_description }}
                                        </p>
                                        
                                        
                                    </div>
                                    <div class="card-footer">
                                        {{-- if the device is managed by the authenticated user show the manage button --}}
                                        @if ($data['manager']->contains('device_id' , $device->id))
                                            <a class="btn btn-primary" style="float: right" href='/manage/{{$device->uuid}}'>Manage</a>
                                        @else
                                        {{-- if not, show the abandon button --}}
                                            @if (!$device->approved && $device->invited_by)
                                                
                                                <form action="/user/decline/{{ $device->uuid }}" method="post">
                                                    @csrf
                                                    <input class="btn btn-danger" style="float: right" type="submit" value="Decline">
                                                </form>
                                                <form action="/user/accept/{{ $device->uuid }}" method="post">
                                                    @csrf
                                                    <input class="btn btn-success" style="float: right" type="submit" value="Accept">
                                                </form>
                                            @else
                                                <form action="/user/decline/{{ $device->uuid }}" method="post">
                                                    @csrf
                                                    <input class="btn btn-danger" style="float: right" type="submit" value="Abandon">
                                                </form>
                                            @endif
                                            {{-- F
                                            I
                                            X

                                            |
                                            * --}}
                                            
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                            <br>
                    </div>
    
    
                {{-- </div> --}}
{{--                 
                <button type="submit" class="me-2 btn btn-primary btn-lg join">+</button> --}}

            </div>
        </div>
        <div class="row flex-grow-1 bg-blue mapFlex">
            <div class="col">
                {{-- <div class=""> --}}
                    <div id="map"></div>                
                {{-- </div> --}}
            </div>
        </div>
    </div>
    
    <div class="col-md-4 position-relative">

        <div class="w-95 position-absolute top-50 start-50 translate-middle flexHis">

            <h3 class="text-center">History</h3>
            <ul class="list-group m-1 hover-hover">
            @if (count($data['history']))

                @php
                    $i = 0
                @endphp
                
                    @foreach ($data['history'] as $log)
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        {{$log->device_name}} {{-- get the device name --}}
                        <span class="badge bg-primary rounded-pill">{{$log->created_at->diffForHumans()}}</span> {{-- get the date --}}
                    </li>
                    @php
                        $i++
                    @endphp
                    @if ($i > 10)
                        @break
                    @endif
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover"><a href="/history">View full history</a></li>
                    
                    
            @else
                <li class="list-group-item d-flex justify-content-between align-items-center">No history yet</li>
            @endif
            </ul>
                
            
        </div>

    </div>
</div>

<script src="js/map.js"></script>

<script>
    let devices_js = JSON.parse({!!$data['deviceCoords']!!});
    console.log(devices_js);
</script>


@if (session('status'))
    <script>
    alert( '{{ Session::get('status') }}' )
    </script>
@endif
@error('device_key')
    <script>alert("The code is invalid")</script>
@enderror

@endsection