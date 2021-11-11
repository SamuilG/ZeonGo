@extends('layouts.app')

@section('content')
        <div class="text-danger">
            {{-- <h5>{{ session('key') }}</h5> --}}
            <h5>{{ $key }}</h5>
            <img src="{{ $key }}">
        </div>
    {{-- <img src="/images/meme.jpg"> --}}
@endsection