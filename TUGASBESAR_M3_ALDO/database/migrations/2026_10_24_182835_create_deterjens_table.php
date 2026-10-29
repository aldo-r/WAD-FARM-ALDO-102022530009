<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('deterjens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('merek');
            $table->string('jenis');
            $table->string('supplier');
            $table->date('tanggal_pembelian');
            $table->integer('stok');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deterjens');
    }
};
