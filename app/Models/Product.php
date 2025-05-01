<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    Use HasFactory;
    protected $fillable = [
        'image',
        'nama_produk',
        'deskripsi',
        'harga',
        'stock',
    ];
}
