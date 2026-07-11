@extends('adminlte::page')

@section('title','Edit Mesin')

@section('content_header')
<h1>Edit Data Mesin</h1>
@stop

@section('content')

<div class="card">
<div class="card-body">

<form action="{{ route('machines.update',$machine->id) }}" method="POST">

@csrf
@method('PUT')

<div class="form-group">
<label>Kode Mesin</label>
<input type="text" name="kode_mesin" class="form-control"
value="{{ $machine->kode_mesin }}">
</div>

<div class="form-group">
<label>Nama Mesin</label>
<input type="text" name="nama_mesin" class="form-control"
value="{{ $machine->nama_mesin }}">
</div>

<div class="form-group">
<label>Lokasi</label>
<input type="text" name="lokasi" class="form-control"
value="{{ $machine->lokasi }}">
</div>

<div class="form-group">
<label>Jenis Mesin</label>
<input type="text" name="jenis_mesin" class="form-control"
value="{{ $machine->jenis_mesin }}">
</div>

<div class="form-group">
<label>Daya Maksimal</label>
<input type="number" name="daya_maksimal" class="form-control"
value="{{ $machine->daya_maksimal }}">
</div>

<div class="form-group">
<label>Status</label>

<select name="status" class="form-control">

<option value="Aktif"
{{ $machine->status=='Aktif' ? 'selected':'' }}>
Aktif
</option>

<option value="Tidak Aktif"
{{ $machine->status=='Tidak Aktif' ? 'selected':'' }}>
Tidak Aktif
</option>

</select>

</div>

<br>

<button class="btn btn-success">
Update
</button>

<a href="{{ route('machines.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>
</div>

@stop