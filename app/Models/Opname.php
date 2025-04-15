<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opname extends Model
{
    use HasFactory;

    protected $table = 'tbl_opname'; // Nama tabel
    protected $primaryKey = 'id_opname'; // Primary Key

    protected $fillable = [
        'id_pengadaan',
        'tgl_opname',
        'keterangan',
        'jumlah_barang_rusak', // Menambahkan kolom jumlah_barang_rusak
        'status_barang', // Menambahkan kolom status_barang
    ];

    // Relasi ke tabel Pengadaan
    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan');
    }


}
