<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deterjen extends Model
{
    use HasFactory;

    protected $fillable = [
        'merek',
        'jenis',
        'supplier',
        'tanggal_pembelian',
        'stok',
    ];
}
