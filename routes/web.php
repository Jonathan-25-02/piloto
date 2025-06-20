<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredioController;

// Página principal redirige al formulario de nuevo predio
Route::get('/', [PredioController::class, 'create']);

// Rutas RESTful para los predios
Route::resource('predios', PredioController::class);
