<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeterjenController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\AuthController;

Route::get('/', fn () => redirect()->route('deterjens.index'));

Route::middleware('guest')->group(function () {
    Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register',  [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {

    Route::resource('deterjens', DeterjenController::class)->only(['index', 'show']);

    Route::resource('mesin', MesinController::class)->only(['index']);

    Route::resource('pelanggan', PelangganController::class)->only(['index']);

    Route::get('/layanan',        [LayananController::class, 'index'])->name('layanan.index');
    Route::get('/layanan/kelola', [LayananController::class, 'kelola'])->name('layanan.kelola');

    Route::get('/layanan/{layanan}/tarif', [TarifController::class, 'index'])->name('tarif.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('deterjens', DeterjenController::class)->except(['index', 'show']);

    Route::resource('mesin', MesinController::class)->except(['index', 'show']);

    Route::resource('pelanggan', PelangganController::class)->except(['index', 'show']);

    Route::post('/layanan',              [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/{layanan}/edit',[LayananController::class, 'edit'])->name('layanan.edit');
    Route::put('/layanan/{layanan}',     [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{layanan}',  [LayananController::class, 'destroy'])->name('layanan.destroy');

    Route::post('/layanan/{layanan}/tarif', [TarifController::class, 'store'])->name('tarif.store');
    Route::get('/tarif/{tarif}/edit',       [TarifController::class, 'edit'])->name('tarif.edit');
    Route::put('/tarif/{tarif}',            [TarifController::class, 'update'])->name('tarif.update');
    Route::delete('/tarif/{tarif}',         [TarifController::class, 'destroy'])->name('tarif.destroy');
});
