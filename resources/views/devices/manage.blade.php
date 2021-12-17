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
            
            
        </td>
        <td id="td_m_members" class="col-5" rowspan="2">
            
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
                                {{$log->device_id}} {{-- get the device name --}}
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