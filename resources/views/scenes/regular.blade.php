@extends('layouts.app')

@section('content')
        <div class="bg-primary">
            {{-- <h5>{{ session('key') }}</h5> --}}
            {{-- <h5>{{ $key }}</h5> --}}
            <img src="{{ $data['key'] }}" class="img-fluid">
        </div>
        {{ $data['devices'] }}
        @foreach ($data['devices'] as $device)
            {{$device->device_name}}
        @endforeach
        <br>
        {{ $data['history'] }}
        @foreach ($data['history'] as $item)
        <br>
            {{$item->created_at}} {{-- get the date --}}
            {{$item->device_name}} {{-- get the device name --}}
        @endforeach
    {{-- <img src="/images/meme.jpg"> --}}
@endsection