<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layanan extends Model
{
    // Pakai tabel dari database layanan_db
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';
    public $timestamps = false;

    protected $fillable = ['kategori', 'nama_layanan', 'minimal_kg'];

    // Satu layanan punya banyak tarif
    public function tarifs(): HasMany
    {
        return $this->hasMany(Tarif::class, 'id_layanan', 'id_layanan')->orderBy('harga');
    }
}