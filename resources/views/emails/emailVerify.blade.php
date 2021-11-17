@extends('layouts.email')

@section('emailBody')
    
    <a class="button" role="button" href="http://127.0.0.1:8000/verifyEmail?key={{ $data['verifyKey'] }}" aria-disabled="true">Verify your email</a>
@endsection