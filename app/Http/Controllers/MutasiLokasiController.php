<?php

namespace App\Http\Controllers;

use App\Models\MutasiLokasi;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class MutasiLokasiController extends Controller
{
    public function index()
    {
        $mutasiLokasi = MutasiLokasi::with(['lokasi', 'pengadaan'])->get();
        return view('admin.mutasi-lokasi.index', compact('mutasiLokasi'));
    }

    public function create()
    {
        $lokasi = Lokasi::all();
        $pengadaan = Pengadaan::all();
        return view('admin.mutasi-lokasi.create', compact('lokasi', 'pengadaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'flag_lokasi' => 'required|string|max:45',
            'flag_pindah' => 'required|string|max:45',
        ]);

        MutasiLokasi::create($request->all());
        return redirect()->route('admin.mutasi-lokasi.index')->with('success', 'Data mutasi lokasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mutasiLokasi = MutasiLokasi::findOrFail($id);
        $lokasi = Lokasi::all();
        $pengadaan = Pengadaan::all();
        return view('admin.mutasi-lokasi.edit', compact('mutasiLokasi', 'lokasi', 'pengadaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'flag_lokasi' => 'required|string|max:45',
            'flag_pindah' => 'required|string|max:45',
        ]);

        $mutasiLokasi = MutasiLokasi::findOrFail($id);
        $mutasiLokasi->update($request->all());
        return redirect()->route('admin.mutasi-lokasi.index')->with('success', 'Data mutasi lokasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        MutasiLokasi::destroy($id);
        return redirect()->route('admin.mutasi-lokasi.index')->with('success', 'Data mutasi lokasi berhasil dihapus!');
    }
}
