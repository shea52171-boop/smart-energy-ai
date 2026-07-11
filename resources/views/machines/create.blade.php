@extends('adminlte::page')

@section('title','Tambah Mesin')

@section('content_header')
<h1>Tambah Mesin</h1>
@stop

@section('content')

<div class="card">

<div class="card-body">

<form action="{{ route('machines.store') }}" method="POST">

@csrf

<div class="form-group">
<label>Kode Mesin</label>
<input type="text" name="kode_mesin" class="form-control">
</div>

<div class="form-group">
<label>Nama Mesin</label>
<input type="text" name="nama_mesin" class="form-control">
</div>

<div class="form-group">
<label>Lokasi</label>
<input type="text" name="lokasi" class="form-control">
</div>

<div class="form-group">
<label>Jenis Mesin</label>
<input type="text" name="jenis_mesin" class="form-control">
</div>

<div class="form-group">
<label>Daya Maksimal</label>
<input type="number" name="daya_maksimal" class="form-control">
</div>

<div class="form-group">
<label>Status</label>

<select name="status" class="form-control">

<option value="Aktif">Aktif</option>
<option value="Tidak Aktif">Tidak Aktif</option>

</select>

</div>

<br>

<button class="btn btn-success">
Simpan
</button>

<a href="{{ route('machines.index') }}" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

@stop