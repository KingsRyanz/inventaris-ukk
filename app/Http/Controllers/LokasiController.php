<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = Lokasi::orderBy('kode_lokasi', 'ASC')->paginate(10);
        return view('admin.lokasi.index', compact('lokasi'));
    }

    public function create()
    {
        return view('admin.lokasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_lokasi' => 'required|unique:tbl_lokasi,kode_lokasi|max:20',
            'nama_lokasi' => 'required|max:25',
            'keterangan' => 'nullable|max:50'
        ]);

        Lokasi::create($request->all());

        return redirect()->route('admin.lokasi.index')
            ->with('success', 'Lokasi berhasil ditambahkan.');
    }

    public function edit(Lokasi $lokasi)
    {
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'kode_lokasi' => 'required|max:20|unique:tbl_lokasi,kode_lokasi,'.$lokasi->id_lokasi.',id_lokasi',
            'nama_lokasi' => 'required|max:25',
            'keterangan' => 'nullable|max:50'
        ]);

        $lokasi->update($request->all());

        return redirect()->route('admin.lokasi.index')
            ->with('success', 'Lokasi berhasil diupdate.');
    }

    public function destroy($id)
    {
        try {
            $pengadaan = Lokasi::findOrFail($id);
            $pengadaan->delete();

            return redirect()->route('admin.lokasi.index')
                ->with('success', 'Data pengadaan berhasil dihapus.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->route('admin.lokasi.index')
                    ->with('error', 'ID ini masih dipakai di tabel lain. Hapus data terkait terlebih dahulu.');
            }
            return redirect()->route('admin.lokasi.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}