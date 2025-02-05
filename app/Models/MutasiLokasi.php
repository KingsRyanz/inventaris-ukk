<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiLokasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_mutasi_lokasi'; // Nama tabel
    protected $primaryKey = 'id_mutasi_lokasi'; // Primary Key

    protected $fillable = [
        'id_lokasi',
        'id_pengadaan',
        'flag_lokasi',
        'flag_pindah',
    ];

    // Relasi ke tabel Lokasi
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }

    // Relasi ke tabel Pengadaan
    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan');
    }
}
