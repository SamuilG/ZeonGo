@extends('layouts.app')

@section('headContent')
    <link rel="stylesheet" href="/css/auth.css">
@endsection

@section('content')
    <div id="container" class="card position-absolute top-50 start-50 translate-middle text-white bg-dark border-light p-4 col-4">
        
        <div style="text-align: center">
            @yield('form')
        
        </div>
    </div>
@endsection

