@extends('layouts.app')

@section('headContent')
    <link rel="stylesheet" href="/css/auth.css">
@endsection

@section('content')
    <div id="bg-img">
        <div class="container-fluid object-fit" >
            <div class="row align-items-center">
                <div class="col-4">
                    @yield('left-side')
                </div>
                <div class="col-8">
                    @yield('right-side')
                </div>
            </div>
        </div>
    </div>    
@endsection

