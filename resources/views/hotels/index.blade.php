<!DOCTYPE html>
<html>
<head>
    <title>Listado de Hoteles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1 class="mb-4">Listado de Hoteles</h1>

    <!-- Botones para añadir -->
    <div class="mb-3 d-flex">
        <a href="{{ route('hotels.create') }}" class="btn btn-primary me-2">Añadir Hotel</a>
        <a href="{{ url('hotel-rooms') }}" class="btn btn-info">Añadir Habitaciones</a>
    </div>

    <!-- Mostrar mensajes de éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrar mensajes de error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Tabla de hoteles -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>NIT</th>
                <th>Máximo Habitaciones</th>
                <th>Detalles de Habitaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->address }}</td>
                    <td>{{ $hotel->city }}</td>
                    <td>{{ $hotel->nit }}</td>
                    <td>{{ $hotel->max_rooms }}</td>
                    <td>
                        @if ($hotel->hotelRooms->count() > 0)
                            <ul>
                                @foreach ($hotel->hotelRooms as $room)
                                    <li>
                                        {{ $room->roomType->type }} - 
                                        {{ $room->accommodation->type }}:
                                        {{ $room->quantity }} habitaciones
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-muted">No hay habitaciones asignadas</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('hotels.rooms', $hotel->id) }}" class="btn btn-info btn-sm">Ver Habitaciones</a>
                        <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
