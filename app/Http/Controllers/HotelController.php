<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Muestra una lista de los hoteles.
     */
    public function index()
    {
        // Obtiene todos los hoteles desde la base de datos
        $hotels = Hotel::all();

        // Retorna la vista con la lista de hoteles
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Muestra el formulario para crear un nuevo hotel.
     */
    public function create()
    {
        // Retorna la vista de creación de hotel
        return view('hotels.create');
    }

    /**
     * Almacena un nuevo hotel en la base de datos.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'nit' => 'required|string|unique:hotels,nit',
            'max_rooms' => 'required|integer|min:1',
        ]);

        // Crea un nuevo hotel con los datos validados
        Hotel::create($request->all());

        // Redirige a la lista de hoteles con un mensaje de éxito
        return redirect()->route('hotels.index')
                         ->with('success', 'Hotel creado exitosamente.');
    }
}
