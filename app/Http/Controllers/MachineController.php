<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::all();
        return view('machines.index', compact('machines'));
    }

    public function create()
    {
        return view('machines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mesin' => 'required|unique:machines',
            'nama_mesin' => 'required',
            'lokasi' => 'required',
            'jenis_mesin' => 'required',
            'daya_maksimal' => 'required|numeric',
            'status' => 'required'
        ]);

        Machine::create($request->all());

        return redirect()->route('machines.index')
                         ->with('success', 'Data mesin berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $machine = Machine::findOrFail($id);
        return view('machines.edit', compact('machine'));
    }

    public function update(Request $request, string $id)
    {
        $machine = Machine::findOrFail($id);

        $request->validate([
            'kode_mesin' => 'required|unique:machines,kode_mesin,' . $machine->id,
            'nama_mesin' => 'required',
            'lokasi' => 'required',
            'jenis_mesin' => 'required',
            'daya_maksimal' => 'required|numeric',
            'status' => 'required'
        ]);

        $machine->update($request->all());

        return redirect()->route('machines.index')
                         ->with('success', 'Data mesin berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $machine = Machine::findOrFail($id);
        $machine->delete();

        return redirect()->route('machines.index')
                         ->with('success', 'Data mesin berhasil dihapus.');
    }
}