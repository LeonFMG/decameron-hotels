<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', // El nombre o tipo de la habitación (por ejemplo, Estándar, Junior, Suite)
    ];

    /**
     * Relación con el modelo HotelRoom (uno a muchos).
     */
    public function hotelRooms()
    {
        return $this->hasMany(HotelRoom::class, 'room_type_id');
    }
}
