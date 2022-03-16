@extends('layouts.email')

@section('emailBody')
    
    <a href="https://zeongo.online/verifyEmail?key={{ $data['verifyKey'] }}" aria-disabled="true">Verify your email</a>
@endsection