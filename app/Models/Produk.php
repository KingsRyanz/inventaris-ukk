<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk'; // Specify the table name if it's not the plural of the model name
    protected $fillable = ['name', 'description', 'price']; // Add your fillable fields here
} 