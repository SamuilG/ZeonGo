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
            <div id="locations">
                <h3>Locations</h3>
                @foreach ($data['devices'] as $device)
                    {{$device->device_name}}
                @endforeach
            </div>
            
        </td>
        <td class="col-4" rowspan="2">
            
            <div id="history" class="col-4">
                <h3 class="text-center">History</h3>
                <table class="col-12">
                    @php
                        $i = 0
                    @endphp
                        @foreach ($data['history'] as $item)
                            <tr>
                                <td class="w-50 pt-3 text-center">{{$item->device_name}}</td> {{-- get the device name --}}
                                <td class="w-50 pt-3 text-center">{{$item->created_at->diffForHumans()}}</td> {{-- get the date --}}
                            </tr>
                            @php
                                $i++
                            @endphp
                            @if ($i > 15)
                                @break
                            @endif
                        @endforeach
                        <tr><td colspan="2" class="text-center"><a href="/hisory">View full history</a></td></tr>
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