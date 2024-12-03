<!DOCTYPE html>
<html>
<head>
    <title>Habitaciones de {{ $hotel->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1 class="mb-4">Habitaciones del Hotel: {{ $hotel->name }}</h1>
    <a href="{{ route('hotels.index') }}" class="btn btn-secondary mb-3">Volver al Listado de Hoteles</a>

    <!-- Mostrar mensajes -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Tabla de habitaciones -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tipo de Habitación</th>
                <th>Acomodación</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hotel->hotelRooms as $room)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $room->roomType->type }}</td>
                    <td>{{ $room->accommodation->type }}</td>
                    <td>{{ $room->quantity }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No hay habitaciones registradas para este hotel.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
