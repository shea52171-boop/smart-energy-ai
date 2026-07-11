@extends('adminlte::page')

@section('title', 'Prediksi AI')

@section('content_header')
    <h1>Prediksi Konsumsi Energi (AI)</h1>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Baris untuk Info Box Utama -->
    <div class="row">
        <!-- Box Penggunaan Hari Ini -->
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="fas fa-bolt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Penggunaan Terakhir (Hari Ini)</span>
                    <span class="info-box-number" style="font-size: 1.8rem;">{{ number_format($today, 2) }} <small>kWh</small></span>
                </div>
            </div>
        </div>

        <!-- Box Hasil Prediksi Besok -->
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-warning">
                <span class="info-box-icon"><i class="fas fa-brain"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Prediksi Hari Esok (+10%)</span>
                    <span class="info-box-number" style="font-size: 1.8rem;">{{ number_format($prediction, 2) }} <small>kWh</small></span>
                </div>
            </div>
        </div>

        <!-- Box Status Sistem -->
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-{{ $status == 'Tinggi' ? 'danger' : ($status == 'Sedang' ? 'orange' : 'success') }}">
                <span class="info-box-icon">
                    <i class="fas {{ $status == 'Tinggi' ? 'fa-exclamation-triangle' : 'fa-check-circle' }}"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Status Prediksi</span>
                    <span class="info-box-number" style="font-size: 1.8rem;">{{ $status }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Baris untuk Detail Analisis dan Rekomendasi -->
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card card-outline card-primary shadow-sm">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-line mr-1"></i> Detail Hasil Analisis AI</h3>
                </div>
                <div class="card-body">
                    <p class="lead">Berdasarkan data log energi terakhir, AI memproyeksikan adanya perubahan konsumsi daya.</p>
                    <table class="table table-bordered table-striped mt-3">
                        <tbody>
                            <tr>
                                <th width="40%">Metrik Daya Saat Ini</th>
                                <td>{{ number_format($today, 2) }} kWh</td>
                            </tr>
                            <tr>
                                <th>Hasil Prediksi (AI)</th>
                                <td><strong class="text-primary">{{ number_format($prediction, 2) }} kWh</strong></td>
                            </tr>
                            <tr>
                                <th>Amang Batas Status</th>
                                <td>
                                    @if($status == 'Tinggi')
                                        <span class="badge badge-danger">Tinggi (> 50 kWh)</span>
                                    @elseif($status == 'Sedang')
                                        <span class="badge badge-warning">Sedang (> 20 kWh)</span>
                                    @else
                                        <span class="badge badge-success">Normal (≤ 20 kWh)</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Kolom Rekomendasi Tindakan -->
        <div class="col-md-4">
            <div class="card card-outline card-{{ $status == 'Tinggi' ? 'danger' : ($status == 'Sedang' ? 'warning' : 'success') }} shadow-sm">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-lightbulb mr-1"></i> Rekomendasi AI</h3>
                </div>
                <div class="card-body">
                    @if($status == 'Tinggi')
                        <div class="alert alert-danger p-2 small">
                            <i class="icon fas fa-ban"></i> <strong>Peringatan!</strong> Konsumsi energi diprediksi melonjak tajam.
                        </div>
                        <p class="text-muted">Disarankan untuk mematikan mesin non-prioritas atau melakukan pengecekan beban berlebih pada jaringan listrik.</p>
                    @elseif($status == 'Sedang')
                        <div class="alert alert-warning p-2 small text-dark">
                            <i class="icon fas fa-exclamation-triangle"></i> <strong>Perhatian.</strong> Konsumsi energi dalam batas wajar namun mendekati ambang atas.
                        </div>
                        <p class="text-muted">Pantau penggunaan mesin secara berkala untuk menghindari lonjakan daya mendadak.</p>
                    @else
                        <div class="alert alert-success p-2 small">
                            <i class="icon fas fa-check"></i> <strong>Aman!</strong> Efisiensi energi terjaga dengan baik.
                        </div>
                        <p class="text-muted">Sistem berjalan optimal. Tidak diperlukan tindakan efisiensi tambahan saat ini.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection