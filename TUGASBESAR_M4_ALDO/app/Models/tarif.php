<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarif extends Model
{
    // Pakai tabel lama dari database layanan_db
    protected $table = 'tarif';
    protected $primaryKey = 'id_tarif';
    public $timestamps = false;

    protected $fillable = ['id_layanan', 'nama_paket', 'harga', 'estimasi_waktu'];

    // Satu tarif dimiliki satu layanan
    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id_layanan');
    }
}