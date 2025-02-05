<?php

namespace App\Http\Controllers;

use App\Models\SubKategoriAsset;
use App\Models\KategoriAsset;
use Illuminate\Http\Request;

class SubKategoriAssetController extends Controller
{
    public function index()
    {
        $subKategoriAsset = SubKategoriAsset::with('kategoriAsset')
            ->orderBy('kode_sub_kategori_asset', 'ASC')
            ->paginate(10);
        return view('admin.sub-kategori-asset.index', compact('subKategoriAsset'));
    }

    public function create()
    {
        $kategoriAsset = KategoriAsset::all();
        return view('admin.sub-kategori-asset.create', compact('kategoriAsset'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori_asset' => 'required|exists:tbl_kategori_asset,id_kategori_asset',
            'kode_sub_kategori_asset' => 'required|unique:tbl_sub_kategori_asset,kode_sub_kategori_asset|max:20',
            'sub_kategori_asset' => 'required|max:25'
        ]);

        SubKategoriAsset::create($request->all());

        return redirect()->route('admin.sub-kategori-asset.index')
            ->with('success', 'Sub Kategori Asset berhasil ditambahkan.');
    }

    public function edit(SubKategoriAsset $subKategoriAsset)
    {
        $kategoriAsset = KategoriAsset::all();
        return view('admin.sub-kategori-asset.edit', compact('subKategoriAsset', 'kategoriAsset'));
    }

    public function update(Request $request, SubKategoriAsset $subKategoriAsset)
    {
        $request->validate([
            'id_kategori_asset' => 'required|exists:tbl_kategori_asset,id_kategori_asset',
            'kode_sub_kategori_asset' => 'required|max:20|unique:tbl_sub_kategori_asset,kode_sub_kategori_asset,' . $subKategoriAsset->id_sub_kategori_asset . ',id_sub_kategori_asset',
            'sub_kategori_asset' => 'required|max:25'
        ]);

        $subKategoriAsset->update($request->all());

        return redirect()->route('admin.sub-kategori-asset.index')
            ->with('success', 'Sub Kategori Asset berhasil diupdate.');
    }

    public function destroy(SubKategoriAsset $subKategoriAsset)
    {
        try {
            $subKategoriAsset->delete();
            return redirect()->route('admin.sub-kategori-asset.index')
                ->with('success', 'Sub Kategori Asset berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.sub-kategori-asset.index')
                ->with('error', 'Sub Kategori Asset tidak dapat dihapus karena masih digunakan.');
        }
    }
}
