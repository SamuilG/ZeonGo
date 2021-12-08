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
                <h3>Locations</h3>
                <div class="container-fluid overflow-auto">
                    <div class="row flex-nowrap">

                        @foreach ($data['devices'] as $device)
                            <div class="col-3">
                                <div class="card card-block">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$device->device_name}}</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
                <h3>History</h3>
                <table>
                    @foreach ($data['history'] as $item)
                        <tr>
                            <td>{{$item->device_name}}</td> {{-- get the device name --}}
                            <td>{{$item->created_at->diffForHumans()}}</td> {{-- get the date --}}
                        </tr>
                    @endforeach
                </table>
                
                    
                    
                
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