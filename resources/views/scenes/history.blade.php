@extends('layouts.app')
@section('content')
<table class="table table-striped">
    <tr>
        <th>Location Name</th>
        <th>Date</th>
        <th class="col-3">Search</th>
    </tr>
    <tr>
        <form action="/history/user" method="GET">
            <td>
                <select name="search_device_name" class="form-control">
                    @foreach (auth()->user()->devices as $device)
                        <option value="{{$device->id}}" @if ($device->id == request()->get('search_device_name'))
                            selected
                        @endif>{{$device->device_name}}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="date" name="search_date" value='{{request()->get('search_date')}}' placeholder="Search by date" class="form-control"></td>
            <td>
                <input type="submit" value="Search" class="btn btn-primary">
                <a href="/history/user" class="btn btn-danger ">Reset</a>
            </td>
        </form>
    </tr>
    @foreach ($history as $log)
        <tr>
            <td>{{$log->device->device_name}}</td>
            <td><span class="float-end">{{$log->created_at}}</span></td>
            <td></td>
        </tr>
    @endforeach
    
</table>
<div class="w-100">
    <div class="mx-auto">
        {{ $history->appends(app('request')->all())->links() }}
        {{-- {{$history->links()}} --}}
    </div>
</div>
@endsection