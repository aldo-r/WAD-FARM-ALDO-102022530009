<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    protected $table = 'mesin';
    public $timestamps = false;
    protected $fillable = ['nama', 'merek', 'kapasitas', 'status'];
}