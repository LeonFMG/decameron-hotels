<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelRoomController;

// Redirigir la ruta principal (/) al listado de hoteles
Route::get('/', [HotelController::class, 'index'])->name('hotels.index');

// Rutas RESTful para el controlador de hoteles
Route::resource('hotels', HotelController::class);

// Ruta adicional para mostrar las habitaciones de un hotel
Route::get('hotels/{id}/rooms', [HotelController::class, 'showRooms'])->name('hotels.rooms');

// Rutas RESTful para el controlador de habitaciones de hotel
Route::resource('hotel-rooms', HotelRoomController::class);
