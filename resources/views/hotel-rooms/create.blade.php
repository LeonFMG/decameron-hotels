<!DOCTYPE html>
<html>
<head>
    <title>Asignar Habitación al Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1 class="mb-4">Asignar Habitación al Hotel</h1>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para asignar habitación -->
    <form action="{{ route('hotel-rooms.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="hotel_id" class="form-label">Hotel</label>
            <select name="hotel_id" id="hotel_id" class="form-select" required>
                <option value="">Seleccione un hotel</option>
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->name }} ({{ $hotel->city }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="room_type_id" class="form-label">Tipo de Habitación</label>
            <select name="room_type_id" id="room_type_id" class="form-select" required>
                <option value="">Seleccione un tipo de habitación</option>
                @foreach ($roomTypes as $roomType)
                    <option value="{{ $roomType->id }}">{{ $roomType->type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="accommodation_id" class="form-label">Acomodación</label>
            <select name="accommodation_id" id="accommodation_id" class="form-select" required>
                <option value="">Seleccione una acomodación</option>
                @foreach ($accommodations as $accommodation)
                    <option value="{{ $accommodation->id }}">{{ $accommodation->type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad de Habitaciones</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required min="1">
        </div>

        <button type="submit" class="btn btn-success">Asignar Habitación</button>
        <a href="{{ route('hotel-rooms.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
