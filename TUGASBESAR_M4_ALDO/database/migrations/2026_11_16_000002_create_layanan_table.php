<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->id('id_layanan');
            $table->string('kategori', 50);
            $table->string('nama_layanan', 100);
            $table->decimal('minimal_kg', 8, 2)->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
