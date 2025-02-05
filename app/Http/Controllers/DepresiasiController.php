<?php

namespace App\Http\Controllers;

use App\Models\Depresiasi;
use Illuminate\Http\Request;

class DepresiasiController extends Controller
{
    public function index()
    {
        $depresiasi = Depresiasi::all();
        return view('admin.depresiasi.index', compact('depresiasi'));
    }

    public function create()
    {
        return view('admin.depresiasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lama_depresiasi' => 'required|integer',
            'keterangan' => 'nullable|string|max:50',
        ]);

        Depresiasi::create($request->all());
        return redirect()->route('admin.depresiasi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $depresiasi = Depresiasi::findOrFail($id);
        return view('admin.depresiasi.edit', compact('depresiasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'lama_depresiasi' => 'required|integer',
            'keterangan' => 'nullable|string|max:50',
        ]);

        $depresiasi = Depresiasi::findOrFail($id);
        $depresiasi->update($request->all());
        return redirect()->route('admin.depresiasi.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Depresiasi::destroy($id);
        return redirect()->route('admin.depresiasi.index')->with('success', 'Data berhasil dihapus!');
    }
}
