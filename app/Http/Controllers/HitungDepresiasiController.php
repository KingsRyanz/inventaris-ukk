<?php

namespace App\Http\Controllers;

use App\Models\HitungDepresiasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class HitungDepresiasiController extends Controller
{
    public function index()
    {
        $hitungDepresiasi = HitungDepresiasi::with('pengadaan')->get();

        foreach ($hitungDepresiasi as $item) {
            // Konversi ke tipe numerik
            $nilaiBarang = floatval($item->nilai_barang);
            $durasi = intval($item->durasi);
            $bulan = intval($item->bulan);

            // Hitung depresiasi per bulan
            $item->depresiasi_per_bulan = $durasi > 0 ? $nilaiBarang / $durasi : 0;

            // Hitung nilai barang manual
            $item->nilai_barang_manual = $nilaiBarang - ($item->depresiasi_per_bulan * $bulan);
        }

        return view('admin.hitung-depresiasi.index', [
            'hitungDepresiasi' => $hitungDepresiasi,
        ]);
    }

    public function create()
    {
        $pengadaan = Pengadaan::all();
        return view('admin.hitung-depresiasi.create', compact('pengadaan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'id_pengadaan' => 'required',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|integer|min:1',
            'durasi' => 'required|integer|min:1',
            'nilai_barang' => 'required|numeric|min:1',
        ]);

        // Hitung depresiasi per bulan
        $depresiasiPerBulan = $validated['nilai_barang'] / $validated['durasi'];

        // Hitung nilai barang berdasarkan formula
        $nilaiBarang = $validated['nilai_barang'] - ($depresiasiPerBulan * $validated['bulan']);

        // Pastikan nilai barang tidak negatif
        $nilaiBarang = max(0, $nilaiBarang);

        // Simpan data ke database
        HitungDepresiasi::create([
            'id_pengadaan' => $validated['id_pengadaan'],
            'tgl_hitung_depresiasi' => $validated['tgl_hitung_depresiasi'],
            'bulan' => $validated['bulan'],
            'durasi' => $validated['durasi'],
            'nilai_barang' => $validated['nilai_barang'],
            'depresiasi_per_bulan' => $depresiasiPerBulan,
            'nilai_barang_manual' => $nilaiBarang, // Nilai barang setelah depresiasi
        ]);

        // Redirect dengan notifikasi sukses
        return redirect()->route('admin.hitung-depresiasi.index')
            ->with('success', 'Data depresiasi berhasil disimpan.');
    }
    public function edit($id)
    {
        $hitungDepresiasi = HitungDepresiasi::findOrFail($id);
        $pengadaan = Pengadaan::all();
        return view('admin.hitung-depresiasi.edit', compact('hitungDepresiasi', 'pengadaan'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
            'durasi' => 'required|integer|min:1',
        ]);

        $hitungDepresiasi = HitungDepresiasi::findOrFail($id);

        // Ambil data harga barang dari tabel pengadaan
        $pengadaan = Pengadaan::findOrFail($validatedData['id_pengadaan']);
        $hargaBarang = $pengadaan->harga_barang;

        // Hitung depresiasi per bulan
        $depresiasiPerBulan = $hargaBarang / $validatedData['durasi'];

        // Update data ke database
        $hitungDepresiasi->update([
            'id_pengadaan' => $validatedData['id_pengadaan'],
            'tgl_hitung_depresiasi' => $validatedData['tgl_hitung_depresiasi'],
            'durasi' => $validatedData['durasi'],
            'nilai_barang' => $hargaBarang,
            'depresiasi_per_bulan' => $depresiasiPerBulan,
        ]);

        return redirect()->route('admin.hitung-depresiasi.index')
            ->with('success', 'Data hitung depresiasi berhasil diperbarui!');
    }

    public function showDepresiasiDetail($id)
    {
        // Ambil data depresiasi berdasarkan ID
        $depresiasi = HitungDepresiasi::with('pengadaan')->findOrFail($id);

        // Inisialisasi data
        $nilaiBarang = $depresiasi->nilai_barang;
        $durasi = $depresiasi->durasi; // Durasi dalam bulan
        $depresiasiPerBulan = $depresiasi->depresiasi_per_bulan;

        // Buat array detail depresiasi per bulan
        $detailDepresiasi = [];
        $sisaNilai = $nilaiBarang;

        for ($i = 1; $i <= $durasi; $i++) {
            $sisaNilai -= $depresiasiPerBulan;
            $detailDepresiasi[] = [
                'bulan_ke' => $i,
                'depresiasi_bulan' => $depresiasiPerBulan,
                'sisa_nilai' => max($sisaNilai, 0), // Pastikan tidak negatif
            ];
        }

        // Kirim data ke view
        return view('admin.hitung-depresiasi.detail', [
            'depresiasi' => $depresiasi,
            'detailDepresiasi' => $detailDepresiasi,
        ]);
    }


    public function destroy($id)
    {
        HitungDepresiasi::destroy($id);
        return redirect()->route('admin.hitung-depresiasi.index')->with('success', 'Data hitung depresiasi berhasil dihapus!');
    }
}
