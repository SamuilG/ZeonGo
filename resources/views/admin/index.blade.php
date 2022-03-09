@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
{{-- <div class="col-10 bg-light" style="height: 100vh; overflow-x: hidden"> --}}
    <div class="bg-light row">
        <h1 class="mx-4 my-3"><i class="fa fa-chart-line"></i><span>Dashboard</span></h1>
    </div>
    <div class="row">
        <div class="p-4">
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
        <div class="p-4">

            <div class="card">
                <canvas id="myChart" class="w-100" height="400"></canvas>
            </div>
        </div> --}}
    </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.js"></script>
{{-- <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!!$historyKeys!!},
            datasets: [{
                label: '# of Votes',
                data: {!!$historyValues!!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script> --}}
@endsection