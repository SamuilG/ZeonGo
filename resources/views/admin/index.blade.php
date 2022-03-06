@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="col-10 bg-light" style="height: 100vh; overflow-x: hidden">
    <div class="bg-light row">
        <h1 class="mx-4 my-3 col-4"><i class="fa fa-chart-line"></i>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-6 p-4">
            <div class="card">
                <div class="card-body">
                    <h5>Statistics</h5>
                    <table class="table table-striped">
                        <tr>
                            <td>Total Users:</td>
                            <td>{{$users->count()}}</td>
                        </tr>
                        <tr>
                            <td>Total Devices</td>
                            <td>{{$devices->count()}}</td>
                        </tr>
                        <tr>
                            <td>All time usage:</td>
                            <td>{{$history->count()}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6 p-4">
            <div class="card">
                Chart go here someday
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.js"></script>
@endsection