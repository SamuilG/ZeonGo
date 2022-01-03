@extends('layouts.app')

@section('headContent')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<link rel="stylesheet" href="/css/use.css">
@endsection

@section('title')
    Home
@endsection

@section('content')

<div class="row flex-grow-1">
    
    <div class="col-md-8 d-flex h-100 flex-column">
        <div class="row">
            <div class="col">
                
                <div id="locations" class="col-8">
                    <br>
                    <div class="container-fluid overflow-auto">
                        <div class="row flex-nowrap">
    
                            @foreach ($data['devices'] as $device)
                            <div class="col-5">
                                <div class="card h-100 card-block bg-dark">
                                    <div class="card-body">
                                        <h4 class="card-title text-white pb-2">{{$device->device_name}}</h4>
                                        <p class="card-text text-white overflow-auto">
                                            {{ $device->device_description }}
                                            {{-- {{ $device->device_description }}
                                            {{ $device->device_description }}
                                            {{ $device->device_description }}
                                            {{ $device->device_description }}
                                            {{ $device->device_description }} --}}
                                        </p>
                                        
                                        
                                    </div>
                                    <div class="card-footer">
                                        @if (count($data['manager']))
                                                
                                            @foreach ($data['manager'] as $manager_device)
                                                @if ($manager_device->device_id == $device->id)
                                                    <form action="/manage" method="post">
                                                        @csrf
                                                        <input type="hidden" name="device_id" value="{{ $device->id }}">
                                                        <input class="btn btn-primary" style="float: right" type="submit" value="Manage">
                                                    </form>
                                                @else
                                                
                                                    <form action="/abandon" method="post">
                                                        @csrf
                                                        <input type="hidden" name="device_id" value="{{ $device->id }}">
                                                        <input class="btn btn-danger" style="float: right" type="submit" value="Abandon">
                                                    </form>
                                                @endif
                                            @endforeach
                                        @else
                                            <form action="/abandon" method="post">
                                                @csrf
                                                <input type="hidden" name="device_id" value="{{ $device->id }}">
                                                <input class="btn btn-danger" style="float: right" type="submit" value="Abandon">
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                                    <br>
                    </div>
    
    
                </div>

            </div>
        </div>
        <div class="row flex-grow-1 bg-blue">
            <div class="col">
                {{-- <div class=""> --}}
                    <div id="map"></div>                
                {{-- </div> --}}
            </div>
        </div>
    </div>
    
    <div class="col-md-4">

        <div id="history">

            <h3 class="text-center">History</h3>
            <ul class="list-group m-1">
            @if (count($data['history']))

                @php
                    $i = 0
                @endphp
                
                    @foreach ($data['history'] as $log)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
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
                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="/history">View full history</a></li>
                    
                    
            @else
                <li class="list-group-item d-flex justify-content-between align-items-center">No history yet</li>
            @endif
            </ul>
                
            
        </div>

    </div>
</div>

<script src="js/map.js"></script>


@endsection