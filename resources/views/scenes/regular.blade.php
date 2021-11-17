@extends('layouts.app')

@section('title')
    Home
@endsection

@section('headContent')
    <link rel="stylesheet" href="/css/regular.css">
@endsection

@section('content')

    <div id="content">
        {{-- QR code --}}
        <div class="w-50 float-start text-center">
            
            <img src="{{ $data['key'] }}" class="w-75 p-5">
        </div>
        {{-- Actions --}}
        <div class="w-50 float-end">
            <button disabled="disabled">test</button><br><br>
            <button disabled="disabled">test</button><br><br>
            <button disabled="disabled">test</button><br><br>
            <button disabled="disabled">test</button><br><br>
            
        </div>
    
        @foreach ($data['devices'] as $device)
            {{ $device }}
        @endforeach
        {{-- <img src="/images/meme.jpg"> --}}
    </div>
    
@endsection