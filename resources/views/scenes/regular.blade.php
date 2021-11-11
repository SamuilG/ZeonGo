@extends('layouts.app')

@section('content')
    @if (session('key'))
        <div class="text-danger">
            <h5>{{ session('key') }}</h5>
        </div>

    @endif
    {{-- <img src="/images/meme.jpg"> --}}
@endsection