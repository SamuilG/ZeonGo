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
<table class="col-12" style="border: 1px solid black">
    <tr>
        <td class="col-9">
            <h1>Locations</h1>
        </td>
        <td class="col-3" rowspan="2">
            <h1>History</h1>
        </td>
    </tr>
    <tr>
        <td>
            <div style="height: 500px;" id="map"></div>
            {{-- <div id='map' style='margin: 20px; height: 85%;'></div> --}}
        </td>
    </tr>
</table>

<script>
    var map = L.map('map').setView([51.505, -0.09], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([51.5, -0.09]).addTo(map)
    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
    .openPopup();
</script>

{{-- <script src="js/map.js"></script> --}}


@endsection