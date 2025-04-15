<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MasterBarangController extends Controller
{
    // Menampilkan daftar Master Barang dengan pencarian dan paginasi
    public function index(Request $request)
    {
        // Mendapatkan query pencarian
        $query = $request->input('search');
        $masterBarang = MasterBarang::paginate(10);
        // Menambahkan pencarian dan paginasi
        $masterBarangs = MasterBarang::when($query, function ($queryBuilder, $query) {
            $queryBuilder->where('kode_barang', 'like', "%$query%")
                ->orWhere('nama_barang', 'like', "%$query%")
                ->orWhere('spesifikasi_teknis', 'like', "%$query%");
        })->paginate(10);

        // Mengirim data ke view
        return view('admin.master-barang.index', compact('masterBarangs'));
    }

    // Menampilkan form untuk menambah Master Barang
    public function create()
    {
        return view('admin.master-barang.create');
    }

    // Menyimpan data Master Barang baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'kode_barang' => 'required|max:20',
            'nama_barang' => 'required|max:100',
            'spesifikasi_teknis' => 'nullable|max:100',
        ]);

        // Menyimpan data
        MasterBarang::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('admin.master-barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit Master Barang
    public function edit(MasterBarang $masterBarang)
    {
        return view('admin.master-barang.edit', compact('masterBarang'));
    }

    // Memperbarui data Master Barang
    public function update(Request $request, MasterBarang $masterBarang)
    {
        // Validasi data
        $request->validate([
            'kode_barang' => 'required|max:20',
            'nama_barang' => 'required|max:100',
            'spesifikasi_teknis' => 'nullable|max:100',
        ]);

        // Update data
        $masterBarang->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('admin.master-barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    // Menghapus data Master Barang
    public function destroy($id)
    {
        try {
            $pengadaan = MasterBarang::findOrFail($id);
            $pengadaan->delete();

            return redirect()->route('admin.master-barang.index')
                ->with('success', 'Data pengadaan berhasil dihapus.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->route('admin.master-barang.index')
                    ->with('error', 'ID ini masih dipakai di tabel lain. Hapus data terkait terlebih dahulu.');
            }
            return redirect()->route('admin.master-barang.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
