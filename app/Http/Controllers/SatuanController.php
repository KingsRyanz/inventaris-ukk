<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SatuanController extends Controller
{
    public function index()
{
    $satuan = Satuan::paginate(10); // Paginate the results
    return view('admin.satuan.index', compact('satuan'));
}
    public function create()
    {
        return view('admin.satuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'satuan' => 'required|string|max:20',
        ]);

        Satuan::create($request->all());
        return redirect()->route('admin.satuan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('admin.satuan.edit', compact('satuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'satuan' => 'required|string|max:20',
        ]);

        $satuan = Satuan::findOrFail($id);
        $satuan->update($request->all());
        return redirect()->route('admin.satuan.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $pengadaan = Satuan::findOrFail($id);
            $pengadaan->delete();

            return redirect()->route('admin.satuan.index')
                ->with('success', 'Data pengadaan berhasil dihapus.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->route('admin.satuan.index')
                    ->with('error', 'ID ini masih dipakai di tabel lain. Hapus data terkait terlebih dahulu.');
            }
            return redirect()->route('admin.satuan.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
