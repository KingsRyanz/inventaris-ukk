<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\MasterBarang;
use App\Models\Depresiasi;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\SubKategoriAsset;
use App\Models\Distributor;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    public function index()
    {
        $pengadaans = Pengadaan::with([
            'masterBarang',
            'depresiasi',
            'merk',
            'satuan',
            'subKategoriAsset',
            'distributor'
        ])->orderBy('id_pengadaan', 'desc')->paginate(10);

        return view('admin.pengadaan.index', compact('pengadaans'));
    }

    public function create()
    {
        $masterBarangs = MasterBarang::all();
        $depresiasis = Depresiasi::all();
        $merks = Merk::all();
        $satuans = Satuan::all();
        $subKategoriAssets = SubKategoriAsset::all();
        $distributors = Distributor::all();

        return view('admin.pengadaan.create', compact(
            'masterBarangs',
            'depresiasis',
            'merks',
            'satuans',
            'subKategoriAssets',
            'distributors'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_master_barang' => 'required',
            'id_depresiasi' => 'required',
            'id_merk' => 'required',
            'id_satuan' => 'required',
            'id_sub_kategori_asset' => 'required',
            'id_distributor' => 'required',
            'kode_pengadaan' => 'required|unique:tbl_pengadaan',
            'no_invoice' => 'required',
            'no_seri_barang' => 'required',
            'tahun_produksi' => 'required',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|numeric',
            'nilai_barang' => 'required|numeric',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable'
        ]);
  
        Pengadaan::create($request->all());

        return redirect()->route('admin.pengadaan.index')
            ->with('success', 'Data pengadaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        $masterBarangs = MasterBarang::all();
        $depresiasis = Depresiasi::all();
        $merks = Merk::all();
        $satuans = Satuan::all();
        $subKategoriAssets = SubKategoriAsset::all();
        $distributors = Distributor::all();

        return view('admin.pengadaan.edit', compact(
            'pengadaan',
            'masterBarangs',
            'depresiasis',
            'merks',
            'satuans',
            'subKategoriAssets',
            'distributors'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_master_barang' => 'required',
            'id_depresiasi' => 'required',
            'id_merk' => 'required',
            'id_satuan' => 'required',
            'id_sub_kategori_asset' => 'required',
            'id_distributor' => 'required',
            'kode_pengadaan' => 'required|unique:tbl_pengadaan,kode_pengadaan,' . $id . ',id_pengadaan',
            'no_invoice' => 'required',
            'no_seri_barang' => 'required',
            'tahun_produksi' => 'required',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|numeric',
            'nilai_barang' => 'required|numeric',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable'
        ]);

        $pengadaan = Pengadaan::findOrFail($id);
        $pengadaan->update($request->all());

        return redirect()->route('admin.pengadaan.index')
            ->with('success', 'Data pengadaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        $pengadaan->delete();

        return redirect()->route('admin.pengadaan.index')
            ->with('success', 'Data pengadaan berhasil dihapus.');
    }
}