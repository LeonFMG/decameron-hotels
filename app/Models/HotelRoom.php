<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HotelRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'room_type_id',
        'accommodation_id',
        'quantity',
    ];

    /**
     * Define las combinaciones válidas de tipos de habitación y acomodaciones.
     */
    public static function validCombinations()
    {
        return [
            1 => [1, 2], // Estándar: Sencilla, Doble
            2 => [3, 4], // Junior: Triple, Cuádruple
            3 => [1, 2, 3], // Suite: Sencilla, Doble, Triple
        ];
    }

    /**
     * Relación con el modelo Hotel (muchos a uno).
     */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Relación con el modelo RoomType (muchos a uno).
     */
    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    /**
     * Relación con el modelo Accommodation (muchos a uno).
     */
    public function accommodation(): BelongsTo
    {
        return $this->belongsTo(Accommodation::class);
    }
}
