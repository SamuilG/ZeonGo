@extends('layouts.app')

@section('headContent')
    <link rel="stylesheet" href="/css/use.css">
@endsection

@section('title')
    {{ $data['device']->device_name }}
@endsection

@section('content')

<div class="row flex-grow-1">
    
    <div class="col-md-6 d-flex h-100 flex-column">
        <div class="row info p-2">
            <div class="col h-100">
                
                {{-- <h3>Device: {{ $data['device']->device_key }}</h3> --}}
                <form action="/manage/{{ $data['device']->uuid }}" method="POST">
                    @csrf
                    <div class="form-group changeDeviceGroup"> 
                        <label for="device_name" class="form-label">Device name ({{ $data['device']->device_key }})</label>
                        <input type="text" class="form-control" id="device_name" name="device_name" value="{{$data['device']->device_name}}">
                    </div>

                    <div class="form-group changeDeviceGroup">
                        <label class="form-label" for="device_description">Device description</label>
                        <textarea class="form-control" rows="3" maxlength="600" id="device_description" name="device_description">{{$data['device']->device_description}}</textarea>
                    </div>

                    <div class="form-group changeDeviceGroup">
                        <label class="form-label" for="coordinates">Device coordinates</label>
                        <input type="text" class="form-control" id="coordinates" name="coordinates" value="{{$data['device']->coordinates}}">
                    </div>
                    <input type="submit" value="Update" class="btn btn-primary float-end">
                </form>

            </div>
        </div>
        <div class="row flex-grow-1 p-2 bg-blue">
            <div class="col">
                {{-- history --}}
            <h3>History</h3>
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
                        @if ($i > 5)
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
    
    <div class="col-md-6">
        <div class="">
            
            <h3 class="text-center">Members</h3>
                
                {{-- members --}}
                <ul class="list-group m-1">
                    @foreach ($data['members'] as $member)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="w-75">
                                <p class="float-start m-0">{{$member->name}}</p>                            
                                <p class="float-end m-0">{{$member->email}}</p>
                            </div>
                            {{-- show if the member is approved and if not let the manager decide --}}
                            @if (auth()->id() != $member->id)
                                @if ($member->approved == true)
                                    <input class="btn btn-danger btn-sm" type="submit" value="Evict">
                                @else
                                    <input class="btn btn-success btn-sm" type="submit" value="Approve">
                                    <input class="btn btn-danger btn-sm" type="submit" value="Decline">
                                @endif
                            @endif
                        </li>
                    @endforeach
                </ul>

        </div>
    </div>
</div>



@endsection