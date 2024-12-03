<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Muestra una lista de los hoteles con sus habitaciones y detalles.
     */
    public function index()
    {
        $hotels = Hotel::with('hotelRooms.roomType', 'hotelRooms.accommodation')->get();
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Muestra el formulario para crear un nuevo hotel.
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Almacena un nuevo hotel en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:hotels,name',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'nit' => 'required|string|unique:hotels,nit',
            'max_rooms' => 'required|integer|min:1|max:1000000',
        ], [
            'name.required' => 'El nombre del hotel es obligatorio.',
            'name.max' => 'El nombre del hotel no debe exceder los 255 caracteres.',
            'name.unique' => 'El nombre del hotel ya está registrado.',
            'address.required' => 'La dirección del hotel es obligatoria.',
            'address.max' => 'La dirección no debe exceder los 255 caracteres.',
            'city.required' => 'La ciudad del hotel es obligatoria.',
            'city.max' => 'La ciudad no debe exceder los 255 caracteres.',
            'nit.required' => 'El NIT del hotel es obligatorio.',
            'nit.unique' => 'El NIT del hotel ya está registrado.',
            'max_rooms.required' => 'El número máximo de habitaciones es obligatorio.',
            'max_rooms.integer' => 'El número máximo de habitaciones debe ser un número entero.',
            'max_rooms.min' => 'El número máximo de habitaciones debe ser al menos 1.',
            'max_rooms.max' => 'El número máximo de habitaciones no puede exceder 1,000,000.',
        ]);

        Hotel::create($request->all());

        return redirect()->route('hotels.index')
                         ->with('success', 'Hotel creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un hotel existente.
     */
    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Actualiza los datos de un hotel existente en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:hotels,name,' . $id,
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'nit' => 'required|string|unique:hotels,nit,' . $id,
            'max_rooms' => 'required|integer|min:1|max:1000000',
        ], [
            'name.required' => 'El nombre del hotel es obligatorio.',
            'name.max' => 'El nombre del hotel no debe exceder los 255 caracteres.',
            'name.unique' => 'El nombre del hotel ya está registrado.',
            'address.required' => 'La dirección del hotel es obligatoria.',
            'address.max' => 'La dirección no debe exceder los 255 caracteres.',
            'city.required' => 'La ciudad del hotel es obligatoria.',
            'city.max' => 'La ciudad no debe exceder los 255 caracteres.',
            'nit.required' => 'El NIT del hotel es obligatorio.',
            'nit.unique' => 'El NIT del hotel ya está registrado.',
            'max_rooms.required' => 'El número máximo de habitaciones es obligatorio.',
            'max_rooms.integer' => 'El número máximo de habitaciones debe ser un número entero.',
            'max_rooms.min' => 'El número máximo de habitaciones debe ser al menos 1.',
            'max_rooms.max' => 'El número máximo de habitaciones no puede exceder 1,000,000.',
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());

        return redirect()->route('hotels.index')
                         ->with('success', 'Hotel actualizado exitosamente.');
    }

/**
 * Muestra las habitaciones de un hotel específico.
 */
public function showRooms($id)
{
    $hotel = Hotel::with('hotelRooms.roomType', 'hotelRooms.accommodation')->findOrFail($id);
    return view('hotels.rooms', compact('hotel'));
}

    /**
     * Elimina un hotel de la base de datos.
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);

        // Verificar si tiene habitaciones asignadas
        if ($hotel->hotelRooms()->exists()) {
            return redirect()->route('hotels.index')
                             ->withErrors('No se puede eliminar un hotel que tiene habitaciones asignadas.');
        }

        $hotel->delete();

        return redirect()->route('hotels.index')
                         ->with('success', 'Hotel eliminado exitosamente.');
    }
}
        