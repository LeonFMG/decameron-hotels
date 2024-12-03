<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMaxRoomsToBigintInHotels extends Migration
{
    /**
     * Cambia el tipo de dato de max_rooms a bigInteger.
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->bigInteger('max_rooms')->change(); // Cambiar a bigInteger
        });
    }

    /**
     * Revertir el cambio de max_rooms a integer si es necesario.
     */
    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->integer('max_rooms')->change(); // Revertir a integer
        });
    }
}
