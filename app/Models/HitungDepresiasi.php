<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HitungDepresiasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_hitung_depresiasi'; // Nama tabel
    protected $primaryKey = 'id_hitung_depresiasi'; // Primary Key

     protected $fillable = [
        'id_pengadaan',
        'tgl_hitung_depresiasi',
        'bulan',
        'durasi',
        'nilai_barang',
        'depresiasi_per_bulan',
    ];
    // Relasi ke tabel Pengadaan
    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan');
    }
}
