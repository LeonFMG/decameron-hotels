<!DOCTYPE html>
<html>
<head>
    <title>Listado de Habitaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1 class="mb-4">Listado de Habitaciones</h1>

    <!-- Botones de navegación -->
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ url('/') }}" class="btn btn-secondary me-2">Regresar al Listado de Hoteles</a>
        <a href="{{ route('hotel-rooms.create') }}" class="btn btn-primary">Añadir Habitación</a>
    </div>

    <!-- Tabla de habitaciones -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Hotel</th>
                <th>Tipo de Habitación</th>
                <th>Acomodación</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotelRooms as $room)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $room->hotel->name }}</td>
                    <td>{{ $room->roomType->type }}</td>
                    <td>{{ $room->accommodation->type }}</td>
                    <td>{{ $room->quantity }}</td>
                    <td>
                        <a href="{{ route('hotel-rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('hotel-rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
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
