<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredioController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('predios', PredioController::class);
