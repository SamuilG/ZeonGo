@extends('layouts.app')

@section('headContent')
    <link rel="stylesheet" href="/css/auth.css">
@endsection

@section('content')
    <div id="bg-img">
        <div class="h-100 container-fluid object-fit">
            <div class="h-75 row d-flex justify-content-center align-items-center">
                <div id="container" class="card text-white bg-dark border-light p-4 col-4">
                    
                    <div style="text-align: center">
                        @yield('form')
                    
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection

