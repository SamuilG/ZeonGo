@extends('layouts.app')

@section('headContent')
    <link rel="stylesheet" href="/css/use.css">
@endsection

@section('title')
    Create Device
@endsection

@section('content')

    
<div class="">
    <div class="w-50 position-absolute top-50 start-50 translate-middle">
        
        <h3 class="text-center">Creating Device</h3>

        <form action="" method="POST">
            @csrf
            
            <div class="form-group changeDeviceGroup"> 
                <label for="device_name" class="form-label">Device name</label>
                <input type="text" class="form-control" id="device_name" name="device_name" value="">
            </div>

            <div class="form-group changeDeviceGroup"> 
                <label for="device_name" class="form-label">Manager email</label>
                <input type="email" class="form-control" id="device_name" name="device_name" value="">
            </div>


            {{-- optional for admin --}}
            <div class="form-group changeDeviceGroup">
                <label class="form-label" for="device_description">Device description</label>
                <textarea class="form-control" rows="3" maxlength="600" id="device_description" name="device_description">Devide description will appear here.</textarea>
            </div>

            
            {{-- optional for admin --}}
            <div class="form-group changeDeviceGroup">
                <label class="form-label" for="coordinates">Device coordinates</label>
                <input type="text" class="form-control" id="coordinates" name="coordinates" value="Devide coordinates will appear here.">
            </div>
            <input type="submit" value="Create" class="btn btn-primary float-end">
        </form>

    </div>
</div>





@endsection