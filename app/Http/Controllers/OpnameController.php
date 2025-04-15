<?php

namespace App\Http\Controllers;

use App\Models\Opname;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class OpnameController extends Controller
{
    public function index()
    {
        // Ambil data opname beserta relasi pengadaan
        $opnames = Opname::with('pengadaan')->get();
        return view('admin.opname.index', compact('opnames'));
    }

    public function create()
    {
        // Ambil semua data pengadaan untuk ditampilkan pada dropdown
        $pengadaan = Pengadaan::all();
        return view('admin.opname.create', compact('pengadaan'));
    }

    public function store(Request $request)
{

    // Validasi input data
    $request->validate([
        'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
        'tgl_opname' => 'required|date',
        'keterangan' => 'nullable|string|max:100',
        'jumlah_barang_rusak' => 'required|integer|min:0',
        'status_barang' => 'required|in:baik,rusak,hilang,perbaikan'
    ]);

    // Menyimpan data opname baru
    Opname::create([
        'id_pengadaan' => $request->id_pengadaan,
        'tgl_opname' => $request->tgl_opname,
        'keterangan' => $request->keterangan,
        'jumlah_barang_rusak' => $request->jumlah_barang_rusak,
        'status_barang' => $request->status_barang
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('admin.opname.index')->with('success', 'Data opname berhasil ditambahkan!');
}

    public function edit($id)
    {
        // Ambil data opname berdasarkan id
        $opname = Opname::findOrFail($id);
        $pengadaan = Pengadaan::all(); // Ambil semua data pengadaan untuk dropdown
        return view('admin.opname.edit', compact('opname', 'pengadaan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan', // validasi id_pengadaan ada di tabel pengadaan
            'tgl_opname' => 'required|date',
            'keterangan' => 'nullable|string|max:100',
            'jumlah_barang_rusak' => 'required|integer|min:0',
            'status_barang' => 'required|in:baik,rusak,hilang,perbaikan'
        ]);

        // Ambil data opname berdasarkan id
        $opname = Opname::findOrFail($id);
        $opname->update([
            'id_pengadaan' => $request->id_pengadaan,
            'tgl_opname' => $request->tgl_opname,
            'keterangan' => $request->keterangan,
            'jumlah_barang_rusak' => $request->jumlah_barang_rusak,
            'status_barang' => $request->status_barang
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.opname.index')->with('success', 'Data opname berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Hapus data opname berdasarkan id
        Opname::destroy($id);
        return redirect()->route('admin.opname.index')->with('success', 'Data opname berhasil dihapus!');
    }
}
