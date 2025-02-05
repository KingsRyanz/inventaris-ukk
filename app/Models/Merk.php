<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $table = 'tbl_merk'; // Nama tabel
    protected $primaryKey = 'id_merk'; // Primary Key

    protected $fillable = [
        'merk',
        'keterangan',
    ];
}
