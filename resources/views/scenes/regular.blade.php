@extends('layouts.app')

@section('headContent')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<link rel="stylesheet" href="/css/regular.css">
@endsection

@section('title')
    Home
@endsection

@section('content')

<table id="regular" class="col-12">
    <tr>
        <td id="td_locations" class="col-8">
            <div id="locations" class="col-7">
                <br>
                <div class="container-fluid overflow-auto">
                    <div class="row flex-nowrap">

                        @foreach ($data['devices'] as $device)
                        <div class="col-3">
                            <div class="card h-100 card-block bg-dark">
                                <div class="card-body">
                                    <h5 class="card-title text-white">{{$device->device_name}}</h5>
                                    <p class="card-text text-white">
                                        {{ $device->device_description }}
                                    </p>
                                    {{-- @if ()
                                        
                                    @endif --}}
                                    <form action="/abandon" method="post">
                                        @csrf
                                        <input type="hidden" name="device_id" value="{{ $device->id }}">
                                        <input class="btn btn-danger" style="float: right" type="submit" value="Abandon">
                                    </form>
                                </div>
                            </div>
                        </div>  
                        <div class="col-3">
                            <div class="card h-100 card-block bg-dark">
                                <div class="card-body">
                                    <h5 class="card-title text-white">{{$device->device_name}}</h5>
                                    <p class="card-text text-white">
                                        {{ $device->device_description }}
                                    </p>
                                    {{-- @if ()
                                        
                                    @endif --}}
                                    <form action="/abandon" method="post">
                                        @csrf
                                        <input type="hidden" name="device_id" value="{{ $device->id }}">
                                        <input class="btn btn-danger" style="float: right" type="submit" value="Abandon">
                                    </form>
                                </div>
                            </div>
                        </div>                            
                        @endforeach

                        
                    </div>
                </div>


            </div>
            
        </td>
        <td class="col-4" rowspan="2">
            
            <div id="history">
                {{-- <table class="list-group">
                    
                        <tr class="list-group-item">
                            <td></td>
                            <td></td>
                        </tr>
                    
                </table> --}}

                <h3 class="text-center">History</h3>
                @php
                  $i = 0
                @endphp
                <ul class="list-group m-1">
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
                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="/history">View full history</a>
                  </ul>

            
                  {{-- @foreach ($data['history'] as $item)
                      <tr>
                          <td class="w-50 pt-3 text-center">{{$item->device_name}}</td>
                          <td class="w-50 pt-3 text-center">{{$item->created_at->diffForHumans()}}</td>
                      </tr>
                      @php
                          $i++
                      @endphp
                      @if ($i > 15)
                          @break
                      @endif
                  @endforeach
                  <tr><td colspan="2" class="text-center"><a href="/hisory">View full history</a></td></tr> --}}
                    
                    
                
            </div>
        </td>
    </tr>
    <tr>
        <td id="td_map">
            <div id="map"></div>
        </td>
    </tr>
</table>

<script src="js/map.js"></script>


@endsection