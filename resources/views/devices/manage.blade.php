{{-- @extends('layouts.app')

@section('content')
    <b>Device info</b>
    <br>
    {{$data['device']}}

    <br><br>
    <b>History</b>
    <br>
    {{$data['history']}}

    <br><br>
    <b>Members</b>
    <br>
    {{$data['members']}}
@endsection --}}


@extends('layouts.app')

@section('headContent')

<link rel="stylesheet" href="/css/use.css">
@endsection

@section('title')
    Home /device/
@endsection

@section('content')

<table id="regular" class="col-12">
    <tr>
        <td id="td_m_about" class="col-7">
        <p>Device Key: {{ $data['device']->first()->device_key }}</p>
        <form action="/saveChanges" method="POST">

            <div class="form-group changeDeviceGroup"> 
                <label for="device_name" class="form-label">Device name</label>
                <input type="text" class="form-control" id="device_name" name="device_name" value="{{$data['device']->first()->device_name}}">
            </div>

            <div class="form-group changeDeviceGroup">
                <label for="device_description">Device description</label>
                <textarea class="form-control" rows="5" id="device_description" name="device_description">{{$data['device']->first()->device_description}}</textarea>
            </div>

            <div class="form-group changeDeviceGroup">
                <label for="coordinates">Device coordinates</label>
                <input type="text" class="form-control" id="coordinates" name="coordinates" value="{{$data['device']->first()->coordinate_x.", ".$data['device']->first()->coordinate_y}}">
            </div>
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
            
        </td>
        {{-- load the members --}}
        <td id="td_m_members" class="col-5" rowspan="2">
            {{$data['members']}}
            <ul class="list-group m-1">
                @foreach ($data['members'] as $member)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{$member->email}}
                        {{$member->name}}
                        {{-- show if the member is approved and if not let the manager decide --}}
                        @if ($member->approved == true)
                            <input class="btn btn-danger" type="submit" value="Abandon">
                        @else
                            <input class="btn btn-success" type="submit" value="Approve">
                            <input class="btn btn-danger" type="submit" value="Decline">
                        @endif
                    </li>
                @endforeach
            </ul>
        </td>
    </tr>
    <tr>
        <td id="td_m_history">
            <div>
                <ul class="list-group m-1">
                    @if (count($data['history']))
    
                        @php
                            $i = 0
                        @endphp
                        
                            @foreach ($data['history'] as $log)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{$log->email}} {{-- get the device name --}}
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
            
        </td>
    </tr>
</table>



@endsection