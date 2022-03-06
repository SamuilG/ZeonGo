@extends('layouts.app')

@section('headContent')
    <link rel="stylesheet" href="/css/use.css">
@endsection

@section('title')
    {{ $data['device']->device_name }}
@endsection

@section('content')

<div class="row flex-grow-1">
    
    <div class="col-md-6 d-flex h-100 flex-column h-resp">
        <div class="row info p-2">
            <div class="col h-100 h-resp">
                
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
                        <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                            {{$log->email}} {{-- get the device name --}}
                            <span class="badge bg-primary rounded-pill">{{$log->created_at->diffForHumans()}}</span> {{-- get the date --}}
                        </li>
                        @php
                            $i++
                        @endphp
                        @if ($i > 4)
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
    
    <div class="col-md-6 overflow-auto">
        <div class="">
            
            <h3 class="text-center">Members</h3>
                
                {{-- members --}}
                <ul class="list-group m-1 overF">
                    <li class="list-group-item d-flex justify-content-between align-items-center this-hover">
                        <form class="w-100" action="/addUser/{{ $data['device']->uuid }}" method="POST">
                            @csrf
                            {{-- <div class="w-75"> --}}
                                <input class="btn btn-success float-end" type="submit" value="Add">
                                <input name="email" type="email" placeholder="@error('email'){{$message}}@enderror" class="w-50 form-control @error('email') border border-danger @enderror">
                                
                                @if (session('status'))
                                    <div class="text-danger">User with this email doesn't exist</div>
                                @endif
                            {{-- </div> --}}
                            
                        </form>
                    </li>
                    @foreach ($data['members'] as $member)
                        <li class="list-group-item d-flex justify-content-between align-items-center @if ($data['managers']->contains('user_id' ,(int) $member->id) ) bg-light @endif this-hover membersLi">
                            {{-- <div class="w-75"> --}}
                                <div class="w-37">
                                    <p class="m-0">{{$member->name}}</p>                            
                                    <p class="m-0">{{$member->email}}</p>
                                </div>

                                {{-- <div class="w-37 float-end">
                                    <p class="m-0">
                                        @if (!$member->invited_by == NULL)
                                            Invited by {{ $member->invitedBy() }}
                                        @else
                                            Invited himself
                                        @endif
                                    </p>
                                    @if ($member->approved)
                                        <p class="m-0">Approved by {{ $member->approvedBy() }}</p>
                                    @endif
                                </div> --}}
                                
                                

                            {{-- </div> --}}
                            {{-- show if the member is approved and if not let the manager decide --}}
                            @if (!$data['managers']->contains('user_id' ,(int) $member->id) )
                                @if ($member->approved == true)
                                    {{-- Evict user --}}
                                    <form action="/decline/{{ $data['device']->uuid }}/{{ $member->uuid }}" method="post">
                                        @csrf
                                        <input class="btn btn-danger" type="submit" value="Evict">
                                    </form>
                                @else
                                    @if ($member->invited_by)
                                        <p class="btn btn-success">Wait for the user to decide</p>
                                    @else
                                        {{-- Approve user --}}
                                        <form action="/approve/{{ $data['device']->uuid }}/{{ $member->uuid }}" method="post">
                                            @csrf
                                            <input class="btn btn-success" type="submit" value="Approve">
                                        </form>
                                        {{-- Decline user  --}}
                                        <form action="/decline/{{ $data['device']->uuid }}/{{ $member->uuid }}" method="post">
                                            @csrf
                                            <input class="btn btn-danger" type="submit" value="Decline">
                                        </form>
                                    @endif
                                    
                                @endif  
                            @endif
                        </li>
                    @endforeach
                    @foreach ($data['members'] as $member)
                        <li class="list-group-item d-flex justify-content-between align-items-center @if ($data['managers']->contains('user_id' ,(int) $member->id) ) bg-light @endif this-hover membersLi">
                            {{-- <div class="w-75"> --}}
                                <div class="w-37">
                                    <p class="m-0">{{$member->name}}</p>                            
                                    <p class="m-0">{{$member->email}}</p>
                                </div>

                                {{-- <div class="w-37 float-end">
                                    <p class="m-0">
                                        @if (!$member->invited_by == NULL)
                                            Invited by {{ $member->invitedBy() }}
                                        @else
                                            Invited himself
                                        @endif
                                    </p>
                                    @if ($member->approved)
                                        <p class="m-0">Approved by {{ $member->approvedBy() }}</p>
                                    @endif
                                </div> --}}
                                
                                

                            {{-- </div> --}}
                            {{-- show if the member is approved and if not let the manager decide --}}
                            @if (!$data['managers']->contains('user_id' ,(int) $member->id) )
                                @if ($member->approved == true)
                                    {{-- Evict user --}}
                                    <form action="/decline/{{ $data['device']->uuid }}/{{ $member->uuid }}" method="post">
                                        @csrf
                                        <input class="btn btn-danger" type="submit" value="Evict">
                                    </form>
                                @else
                                    @if ($member->invited_by)
                                        <p class="btn btn-success">Wait for the user to decide</p>
                                    @else
                                        {{-- Approve user --}}
                                        <form action="/approve/{{ $data['device']->uuid }}/{{ $member->uuid }}" method="post">
                                            @csrf
                                            <input class="btn btn-success" type="submit" value="Approve">
                                        </form>
                                        {{-- Decline user  --}}
                                        <form action="/decline/{{ $data['device']->uuid }}/{{ $member->uuid }}" method="post">
                                            @csrf
                                            <input class="btn btn-danger" type="submit" value="Decline">
                                        </form>
                                    @endif
                                    
                                @endif  
                            @endif
                        </li>
                    @endforeach
                </ul>

        </div>
    </div>
</div>



@endsection