@extends('direksi.template.index')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a class="btn btn-success btn-sm" href="/update-user-direksi/{{$oke}}">Edit Password</a>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-12">
            <canvas id="myChartProdi"></canvas>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <canvas id="myChartJabfung"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('myChartProdi').getContext('2d');
        var labels = @json($prodi->pluck('prodi'));
        var data = @json($mergedData);

        var minValue = Math.min(...data.map(item => item.total_dosen));
        minValue = minValue >= 0 ? 0 : minValue; // Memastikan nilai minimum tidak negatif

        var chartData = {
            labels: labels,
            datasets: [{
                label: 'Total Dosen',
                data: data.map(item => item.total_dosen),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }]
                }
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('myChartJabfung').getContext('2d');
        var labels = @json($jabfung->pluck('jabfung'));
        var data = @json($mergedDataJabfung);

        var minValue = Math.min(...data.map(item => item.total_dosen));
        minValue = minValue >= 0 ? 0 : minValue; // Memastikan nilai minimum tidak negatif

        var chartData = {
            labels: labels,
            datasets: [{
                label: 'Total Jabatan Fungsional',
                data: data.map(item => item.total_jabfung),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }]
                }
            }
        });
    });
</script>
@endsection
