<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarif', function (Blueprint $table) {
            $table->id('id_tarif');
            $table->unsignedBigInteger('id_layanan');
            $table->string('nama_paket', 100);
            $table->decimal('harga', 12, 2);
            $table->string('estimasi_waktu', 50)->nullable();

            $table->foreign('id_layanan')
                ->references('id_layanan')
                ->on('layanan')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarif');
    }
};
