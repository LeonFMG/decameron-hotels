<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

// Redirigir la ruta principal (/) al listado de hoteles
Route::get('/', [HotelController::class, 'index'])->name('hotels.index');

// Rutas RESTful para el controlador de hoteles
Route::resource('hotels', HotelController::class);
