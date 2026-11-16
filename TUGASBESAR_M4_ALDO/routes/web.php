<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeterjenController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TarifController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('deterjens', DeterjenController::class);

Route::resource('mesin', MesinController::class)->except(['show']);

Route::resource('pelanggan', PelangganController::class)->except(['show']);


Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/kelola', [LayananController::class, 'kelola'])->name('layanan.kelola');
Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
Route::get('/layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
Route::put('/layanan/{layanan}', [LayananController::class, 'update'])->name('layanan.update');
Route::delete('/layanan/{layanan}', [LayananController::class, 'destroy'])->name('layanan.destroy');

// ---------- Tarif ----------
Route::get('/layanan/{layanan}/tarif', [TarifController::class, 'index'])->name('tarif.index');
Route::post('/layanan/{layanan}/tarif', [TarifController::class, 'store'])->name('tarif.store');
Route::get('/tarif/{tarif}/edit', [TarifController::class, 'edit'])->name('tarif.edit');
Route::put('/tarif/{tarif}', [TarifController::class, 'update'])->name('tarif.update');
Route::delete('/tarif/{tarif}', [TarifController::class, 'destroy'])->name('tarif.destroy');