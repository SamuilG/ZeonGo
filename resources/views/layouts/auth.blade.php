@extends('layouts.app')

@section('content')
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
@endsection

