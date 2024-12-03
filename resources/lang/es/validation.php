<?php

return [
    'custom' => [
        'name.required' => 'El nombre del hotel es obligatorio.',
        'name.unique' => 'El nombre del hotel ya está registrado.',
        'address.required' => 'La dirección es obligatoria.',
        'city.required' => 'La ciudad es obligatoria.',
        'city.regex' => 'La ciudad solo debe contener letras.',
        'nit.required' => 'El NIT es obligatorio.',
        'nit.unique' => 'El NIT ya está registrado.',
        'nit.regex' => 'El NIT debe contener exactamente 9 dígitos.',
        'max_rooms.required' => 'El número máximo de habitaciones es obligatorio.',
        'max_rooms.integer' => 'El número máximo de habitaciones debe ser un número entero.',
        'max_rooms.min' => 'El número mínimo de habitaciones es 1.',
        'max_rooms.max' => 'El número máximo de habitaciones es 1000.',
    ],
];
