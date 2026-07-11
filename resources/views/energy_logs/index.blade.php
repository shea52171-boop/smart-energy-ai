@extends('adminlte::page')

@section('title', 'Monitoring Energi')

@section('content_header')
<h1>Monitoring Energi</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('energy-logs.create') }}" class="btn btn-primary mb-3">
    Tambah Monitoring
</a>

<div class="card">
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mesin</th>
                        <th>Volt</th>
                        <th>Ampere</th>
                        <th>Jam</th>
                        <th>Watt</th>
                        <th>kWh</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($logs as $log)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $log->machine->nama_mesin }}</td>
                        <td>{{ $log->voltage }}</td>
                        <td>{{ $log->current }}</td>
                        <td>{{ $log->duration }}</td>
                        <td>{{ $log->power }}</td>
                        <td>{{ number_format($log->energy,2) }}</td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="text-center">
                            Belum ada data monitoring
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>
</div>

@stop