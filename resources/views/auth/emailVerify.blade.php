@extends('layouts.email')

@section('emailBody')
    <a href="http://127.0.0.1:8000/verifyEmail?key=$data['verifyKey']"">Verify your email</a>
@endsection