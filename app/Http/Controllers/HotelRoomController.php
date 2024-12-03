<?php

namespace App\Http\Controllers;

use App\Models\HotelRoom;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotelRooms = HotelRoom::with(['hotel', 'roomType', 'accommodation'])->get();
        return view('hotel-rooms.index', compact('hotelRooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::all();
        $roomTypes = \App\Models\RoomType::all();
        $accommodations = \App\Models\Accommodation::all();

        return view('hotel-rooms.create', compact('hotels', 'roomTypes', 'accommodations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_type_id' => 'required|exists:room_types,id',
            'accommodation_id' => 'required|exists:accommodations,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Cargar el hotel para reutilizarlo
        $hotel = Hotel::findOrFail($validated['hotel_id']);

        // Validar combinaciones permitidas
        $validCombinations = HotelRoom::validCombinations();
        $roomType = $validated['room_type_id'];
        $accommodation = $validated['accommodation_id'];

        if (!isset($validCombinations[$roomType]) || !in_array($accommodation, $validCombinations[$roomType])) {
            return redirect()->back()->withErrors('La acomodación seleccionada no es válida para el tipo de habitación.');
        }

        // Validar número máximo de habitaciones
        $currentTotal = HotelRoom::where('hotel_id', $hotel->id)->sum('quantity');
        if ($currentTotal + $validated['quantity'] > $hotel->max_rooms) {
            return redirect()->back()->withErrors('La cantidad total de habitaciones excede el límite permitido para este hotel.');
        }

        // Validar combinaciones únicas
        $exists = HotelRoom::where('hotel_id', $hotel->id)
            ->where('room_type_id', $roomType)
            ->where('accommodation_id', $accommodation)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors('La combinación de tipo de habitación y acomodación ya existe para este hotel.');
        }

        // Crear habitación
        HotelRoom::create($validated);

        return redirect()->route('hotel-rooms.index')->with('success', 'Habitación asignada correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hotelRoom = HotelRoom::findOrFail($id);
        $hotels = Hotel::all();
        $roomTypes = \App\Models\RoomType::all();
        $accommodations = \App\Models\Accommodation::all();

        return view('hotel-rooms.edit', compact('hotelRoom', 'hotels', 'roomTypes', 'accommodations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_type_id' => 'required|exists:room_types,id',
            'accommodation_id' => 'required|exists:accommodations,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $hotel = Hotel::findOrFail($validated['hotel_id']);
        $hotelRoom = HotelRoom::findOrFail($id);

        // Validar combinaciones permitidas
        $validCombinations = HotelRoom::validCombinations();
        $roomType = $validated['room_type_id'];
        $accommodation = $validated['accommodation_id'];

        if (!isset($validCombinations[$roomType]) || !in_array($accommodation, $validCombinations[$roomType])) {
            return redirect()->back()->withErrors('La acomodación seleccionada no es válida para el tipo de habitación.');
        }

        // Validar número máximo de habitaciones
        $currentTotal = HotelRoom::where('hotel_id', $hotel->id)
            ->where('id', '!=', $hotelRoom->id)
            ->sum('quantity');

        if ($currentTotal + $validated['quantity'] > $hotel->max_rooms) {
            return redirect()->back()->withErrors('La cantidad total de habitaciones excede el límite permitido para este hotel.');
        }

        // Validar combinaciones únicas
        $exists = HotelRoom::where('hotel_id', $hotel->id)
            ->where('room_type_id', $roomType)
            ->where('accommodation_id', $accommodation)
            ->where('id', '!=', $hotelRoom->id)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors('La combinación de tipo de habitación y acomodación ya existe para este hotel.');
        }

        // Actualizar habitación
        $hotelRoom->update($validated);

        return redirect()->route('hotel-rooms.index')->with('success', 'Habitación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotelRoom = HotelRoom::findOrFail($id);
        $hotelRoom->delete();

        return redirect()->route('hotel-rooms.index')->with('success', 'Habitación eliminada correctamente.');
    }
}
