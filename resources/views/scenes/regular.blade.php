@extends('layouts.app')

@section('content')
        <div class="bg-primary">
            {{-- <h5>{{ session('key') }}</h5> --}}
            {{-- <h5>{{ $key }}</h5> --}}
            <img src="{{ $data['key'] }}" class="img-fluid">
        </div>

        @foreach ($data['devices'] as $device)
            {{ $device }}
        @endforeach
    {{-- <img src="/images/meme.jpg"> --}}
@endsection