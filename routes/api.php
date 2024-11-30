<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\HotelRoomController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas API para la aplicación. Estas rutas son cargadas
| por el RouteServiceProvider dentro de un grupo que está asignado al middleware
| "api". Disfruta construyendo tu API.
|
*/

// Ruta de prueba para verificar que la API funciona
Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando correctamente']);
});

// Rutas RESTful para la entidad Hotel
Route::apiResource('hotels', HotelController::class);

// Rutas RESTful para la entidad RoomType
Route::apiResource('room-types', RoomTypeController::class);

// Rutas RESTful para la entidad Accommodation
Route::apiResource('accommodations', AccommodationController::class);

// Rutas RESTful para la entidad HotelRoom
Route::apiResource('hotel-rooms', HotelRoomController::class);
