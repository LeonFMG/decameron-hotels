<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['message' => 'HotelRoom index funcionando correctamente']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'HotelRoom create funcionando correctamente']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(['message' => 'HotelRoom almacenado correctamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(['message' => "HotelRoom mostrando recurso con ID: $id"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json(['message' => "HotelRoom editando recurso con ID: $id"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response()->json(['message' => "HotelRoom actualizado con ID: $id"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json(['message' => "HotelRoom eliminado con ID: $id"]);
    }
}
