<?php

namespace App\Http\Controllers;

use App\Models\Opname;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class OpnameController extends Controller
{
    public function index()
    {
        $opnames = Opname::with('pengadaan')->get();
        return view('admin.opname.index', compact('opnames'));
    }

    public function create()
    {
        $pengadaan = Pengadaan::all();
        return view('admin.opname.create', compact('pengadaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_opname' => 'required|date',
            'kondisi' => 'required|string|max:25',
            'keterangan' => 'nullable|string|max:100',
        ]);

        Opname::create($request->all());
        return redirect()->route('admin.opname.index')->with('success', 'Data opname berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $opname = Opname::findOrFail($id);
        $pengadaan = Pengadaan::all();
        return view('admin.opname.edit', compact('opname', 'pengadaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_opname' => 'required|date',
            'kondisi' => 'required|string|max:25',
            'keterangan' => 'nullable|string|max:100',
        ]);

        $opname = Opname::findOrFail($id);
        $opname->update($request->all());
        return redirect()->route('admin.opname.index')->with('success', 'Data opname berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Opname::destroy($id);
        return redirect()->route('admin.opname.index')->with('success', 'Data opname berhasil dihapus!');
    }
}
