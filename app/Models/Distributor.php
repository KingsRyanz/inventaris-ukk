<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $table = 'tbl_distributor'; // Nama tabel
    protected $primaryKey = 'id_distributor'; // Primary Key

    protected $fillable = [
        'nama_distributor',
        'alamat',
        'no_telp',
        'email',
        'keterangan',
    ];
}
