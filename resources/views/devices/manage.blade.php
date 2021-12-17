@extends('layouts.app')

@section('content')
    <b>Device info</b>
    <br>
    {{$data['device']}}

    <br><br>
    <b>History</b>
    <br>
    {{$data['history']}}

    <br><br>
    <b>Members</b>
    <br>
    {{$data['members']}}
@endsection