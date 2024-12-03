<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'address', 
        'city', 
        'nit', 
        'max_rooms',
    ];

    /**
     * Relación con el modelo HotelRoom (uno a muchos).
     */
    public function hotelRooms()
    {
        return $this->hasMany(HotelRoom::class, 'hotel_id');
    }
}
