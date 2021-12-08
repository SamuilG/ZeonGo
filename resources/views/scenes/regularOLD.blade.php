@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')

    <div id="content">
        {{-- QR code --}}
        <div class="w-35 float-start text-center">
            <img src="{{ $data['key'] }}" class="w-75 p-5">
        </div>
        {{-- Actions --}}
        <div class="w-65 float-end row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100" style="width: 18rem;">
                    <img src="/images/teamwork.jpg" class="card-img-top" alt="Join">
                    <div class="card-body">
                    <h5 class="card-title">Join a network</h5>
                    <p class="card-text">You can as many networks as you want!</p>
                    <a href="#" class="btn btn-primary">Join</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100" style="width: 18rem;">
                    <img src="/images/teamwork.jpg" class="card-img-top" alt="Join">
                    <div class="card-body">
                    <h5 class="card-title">Join a network</h5>
                    <p class="card-text">You can as many networks as you want!</p>
                    <a href="#" class="btn btn-primary">Join</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100" style="width: 18rem;">
                    <img src="/images/teamwork.jpg" class="card-img-top" alt="Join">
                    <div class="card-body">
                    <h5 class="card-title">Join a network</h5>
                    <p class="card-text">You can as many networks as you want!</p>
                    <a href="#" class="btn btn-primary">Join</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100" style="width: 18rem;">
                    <img src="/images/teamwork.jpg" class="card-img-top" alt="Join">
                    <div class="card-body">
                    <h5 class="card-title">Join a network</h5>
                    <p class="card-text">You can as many networks as you want!</p>
                    <a href="#" class="btn btn-primary">Join</a>
                    </div>
                </div>
            </div>
            
        </div>
    
        @foreach ($data['devices'] as $device)
            {{$device->device_name}}
            haha
        @endforeach
        <br>
        @foreach ($data['history'] as $item)
        <br>
            {{$item->created_at}} {{-- get the date --}}
            {{$item->device_name}} {{-- get the device name --}}
        @endforeach
        {{-- <img src="/images/meme.jpg"> --}}
    </div>
    
@endsection