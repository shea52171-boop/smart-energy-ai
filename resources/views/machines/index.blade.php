@extends('adminlte::page')

@section('title', 'Data Mesin')

@section('content_header')
<h1>Data Mesin</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header">

        <a href="{{ route('machines.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Mesin
        </a>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead class="thead-dark">

                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Mesin</th>
                        <th>Lokasi</th>
                        <th>Jenis</th>
                        <th>Daya</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($machines as $machine)

                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $machine->kode_mesin }}</td>
                        <td>{{ $machine->nama_mesin }}</td>
                        <td>{{ $machine->lokasi }}</td>
                        <td>{{ $machine->jenis_mesin }}</td>
                        <td>{{ $machine->daya_maksimal }} Watt</td>

                        <td>

                            @if($machine->status=='Aktif')

                                <span class="badge badge-success">Aktif</span>

                            @else

                                <span class="badge badge-danger">Tidak Aktif</span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('machines.edit',$machine->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('machines.destroy',$machine->id) }}"
                                  method="POST"
                                  style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            Belum ada data mesin.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@stop