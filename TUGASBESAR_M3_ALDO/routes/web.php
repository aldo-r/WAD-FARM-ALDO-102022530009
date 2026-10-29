<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeterjenController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('deterjens', DeterjenController::class);