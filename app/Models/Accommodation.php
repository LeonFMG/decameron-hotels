<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    /**
     * Relación con el modelo HotelRoom (uno a muchos).
     */
    public function hotelRooms()
    {
        return $this->hasMany(HotelRoom::class, 'accommodation_id');
    }
}
