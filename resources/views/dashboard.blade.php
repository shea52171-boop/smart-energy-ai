@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@endsection

@section('content')
<div class="container-fluid">

    <!-- 1. HERO BANNER WITH BACKGROUND IMAGE -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="position-relative p-5 text-white rounded shadow-sm" 
                 style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=1200') center center; background-size: cover; min-height: 200px; display: flex; flex-direction: column; justify-content: center;">
                
                <div class="position-absolute" style="top: 20px; right: 30px; opacity: 0.15; font-size: 5rem;">
                    <i class="fas fa-industry"></i>
                </div>
                
                <h1 class="display-5 font-weight-bold">Dashboard Smart Energy AI</h1>
                <p class="lead mb-0 text-light">Sistem Monitoring Efisiensi dan Prediksi Penggunaan Energi Mesin Berbasis Kecerdasan Buatan</p>
                
                <div class="mt-2">
                    <span class="badge badge-success p-2"><i class="fas fa-circle text-white animate-pulse mr-1"></i> AI Engine Active</span>
                </div>
            </div>
        </div>
    </div>

    <!-- LIVE SMART ALERT -->

<div class="row mb-4">

    <div class="col-12">

        <div class="card card-danger shadow">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-exclamation-triangle"></i>

                    LIVE SMART ALERT

                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-3">

                        <h5>Mesin</h5>

                        @if($latestAlert)

<h3>{{ $latestAlert->machine->nama_mesin }}</h3>

@else

<h3>-</h3>

@endif

                    </div>

                    <div class="col-md-2">

                        <h5>Temperature</h5>

                        <h3 class="text-danger">

                            @if($latestAlert)

{{ $latestAlert->temperature }} °C

@else

-

@endif

                        </h3>

                    </div>

                    <div class="col-md-2">

                        <h5>Current</h5>

                        <h3>

                            @if($latestAlert)

{{ $latestAlert->current }} A

@else

-

@endif

                        </h3>

                    </div>

                    <div class="col-md-2">

                        <h5>Risk</h5>

                        <span class="badge badge-danger">

                           @if($latestAlert)

{{ $latestAlert->risk_level }}

@else

Normal

@endif

                        </span>

                    </div>

                    <div class="col-md-3">

                        <h5>Confidence</h5>

                        <h3>

                            @if($latestAlert)

{{ $latestAlert->confidence }} %

@else

0%

@endif

                        </h3>

                    </div>

                </div>

                <hr>

                <h5>Recommendation</h5>

               @if($latestAlert)

<p>

{{ $latestAlert->recommendation }}

</p>

@else

<p>

Tidak ada rekomendasi.

</p>

@endif

            </div>

        </div>

    </div>

</div>

    <!-- 2. LAYOUT UTAMA: GRAFIK & STATISTIK -->
    <div class="row">
        <!-- Kolom Kiri: Grafik Konsumsi Energi -->
        <div class="col-md-7">
            <div class="card card-outline card-primary shadow-sm h-100">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-chart-area mr-1 text-primary"></i> Grafik Konsumsi Energi
                    </h3>
                </div>
               <div class="card-body">
                    <!-- Ganti bagian ini -->
                    <div class="chart" style="position: relative; height: 300px;">
                        <canvas id="myChart" style="height: 300px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Grid 4 Small Box Informasi -->
        <div class="col-md-5">
            <div class="row">
                <!-- Total Mesin -->
                <div class="col-sm-6 col-12 mb-3">
                    <div class="small-box bg-info shadow-sm mb-0 h-100" style="min-height: 140px;">
                        <div class="inner">
                            <h3>1</h3>
                            <p>Total Mesin</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Monitoring -->
                <div class="col-sm-6 col-12 mb-3">
                    <div class="small-box bg-success shadow-sm mb-0 h-100" style="min-height: 140px;">
                        <div class="inner">
                            <h3>1</h3>
                            <h3>{{ $totalMonitoring }}</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-desktop"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Energi -->
                <div class="col-sm-6 col-12 mb-3">
                    <div class="small-box bg-warning shadow-sm mb-0 h-100" style="min-height: 140px;">
                        <div class="inner text-white">
                            <h3>{{ number_format($totalEnergy, 2) }}
    <small class="text-white" style="font-size: 1rem">kWh</small>
</h3>
                            <p>Total Energi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                    </div>
                </div>

                <!-- Mesin Aktif -->
                <div class="col-sm-6 col-12 mb-3">
                    <div class="small-box bg-danger shadow-sm mb-0 h-100" style="min-height: 140px;">
                        <div class="inner">
                            <h3>{{ $activeMachine }}</h3>
                            <p>Mesin Aktif</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-power-off"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    /* Efek kedip kecil untuk status AI */
    @keyframes pulse {
        0% { opacity: 0.4; }
        50% { opacity: 1; }
        100% { opacity: 0.4; }
    }
    .animate-pulse {
        animation: pulse 2s infinite;
    }
</style>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('myChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @foreach($chartData as $data)
                        "{{ $data->tanggal }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Konsumsi Energi (kWh)',
                    data: [
                        @foreach($chartData as $data)
                            {{ $data->total }},
                        @endforeach
                    ],
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: false
                }]
            }
        });
    }
});
</script>
@endsection
