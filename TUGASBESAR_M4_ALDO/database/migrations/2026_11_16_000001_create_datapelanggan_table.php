<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('datapelanggan', function (Blueprint $table) {
            $table->id('id_pelanggan');
            $table->string('nama', 100);
            $table->text('alamat')->nullable();
            $table->string('notelp', 20)->nullable();
            $table->text('catatan')->nullable();
            // Model memakai $timestamps = false, jadi tidak ada created_at/updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('datapelanggan');
    }
};
