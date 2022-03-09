@extends('layouts.email')

@section('emailBody')
    <a href="http://127.0.0.1:8000/forgottenPasswordRedirect?key={{ $data['token'] }}">Reset password</a>
@endsection