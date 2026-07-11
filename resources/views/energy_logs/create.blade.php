@extends('adminlte::page')

@section('title', 'Tambah Monitoring Energi')

@section('content_header')
    <h1>Tambah Monitoring Energi</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('energy-logs.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Mesin</label>
                <select name="machine_id" class="form-control">
                    @foreach($machines as $machine)
                        <option value="{{ $machine->id }}">
                            {{ $machine->nama_mesin }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Tegangan (Volt)</label>
                <input type="number" name="voltage" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Arus (Ampere)</label>
                <input type="number" name="current" class="form-control" required>
            </div>

            <div class="mb-3">
    <label>Suhu Mesin (°C)</label>
    <input type="number"
           name="temperature"
           class="form-control"
           placeholder="Contoh : 97"
           required>
</div>

            <div class="mb-3">
                <label>Durasi (Jam)</label>
                <input type="number" step="0.1" name="duration" class="form-control" required>
            </div>

            <button class="btn btn-success">
                Simpan Monitoring
            </button>

            <a href="{{ route('energy-logs.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@stop