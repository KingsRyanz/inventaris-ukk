<?php

namespace App\Http\Controllers;

use App\Models\KategoriAsset;
use Illuminate\Http\Request;

class KategoriAssetController extends Controller
{
    /**
     * Menampilkan daftar kategori asset dengan fitur pencarian.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Mendapatkan query pencarian
        $query = $request->input('search');

        // Menambahkan pencarian dan paginasi
        $kategoriAssets = KategoriAsset::when($query, function ($queryBuilder, $query) {
            $queryBuilder->where('kode_kategori_asset', 'like', "%$query%")
                ->orWhere('kategori_asset', 'like', "%$query%");
        })->paginate(10);

        // Mengirim data ke view
        return view('admin.kategori-asset.index', compact('kategoriAssets'));
    }

    /**
     * Menampilkan form untuk membuat kategori asset baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kategori-asset.create');
    }

    /**
     * Menyimpan kategori asset baru ke database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'kode_kategori_asset' => 'required|max:20|unique:tbl_kategori_asset,kode_kategori_asset',
            'kategori_asset' => 'required|max:100',
        ]);

        // Menyimpan data
        KategoriAsset::create([
            'kode_kategori_asset' => $request->kode_kategori_asset,
            'kategori_asset' => $request->kategori_asset,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.kategori-asset.index')->with('success', 'Kategori asset berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit kategori asset yang sudah ada.
     *
     * @param KategoriAsset $kategoriAsset
     * @return \Illuminate\View\View
     */
    public function edit($id_kategori_asset)
    {
        $kategoriAsset = KategoriAsset::where('id_kategori_asset', $id_kategori_asset)->firstOrFail();
        return view('admin.kategori-asset.edit', compact('kategoriAsset'));
    }
    /**
     * Memperbarui kategori asset yang sudah ada di database.
     *
     * @param Request $request
     * @param KategoriAsset $kategoriAsset
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id_kategori_asset)
{
    // Temukan data berdasarkan primary key yang benar
    $kategoriAsset = KategoriAsset::where('id_kategori_asset', $id_kategori_asset)->firstOrFail();

    // Update data
    $kategoriAsset->update([
        'kategori_asset' => $request->input('kategori_asset')
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('admin.kategori-asset.index')->with('success', 'Kategori asset berhasil diperbarui.');
}
    /**
     * Menghapus kategori asset dari database.
     *
     * @param KategoriAsset $kategoriAsset
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id_kategori_asset)
    {
        $kategoriAsset = KategoriAsset::where('id_kategori_asset', $id_kategori_asset)->firstOrFail();
        $kategoriAsset->delete();
        return redirect()->route('admin.kategori-asset.index')->with('success', 'Kategori asset berhasil dihapus.');
    }
}
