@extends('layouts.app')

@section('content')
        <div class="bg-primary">
            {{-- <h5>{{ session('key') }}</h5> --}}
            {{-- <h5>{{ $key }}</h5> --}}
            <img src="{{ $key }}" class="img-fluid">
        </div>
    {{-- <img src="/images/meme.jpg"> --}}
@endsection