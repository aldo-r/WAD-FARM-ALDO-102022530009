<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeterjenController;
use App\Http\Controllers\MesinController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('deterjens', DeterjenController::class);

Route::resource('mesin', MesinController::class)->except(['show']);


