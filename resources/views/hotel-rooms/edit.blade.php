<!DOCTYPE html>
<html>
<head>
    <title>Editar Habitación del Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1 class="mb-4">Editar Habitación del Hotel</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hotel-rooms.update', $hotelRoom->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="hotel_id" class="form-label">Hotel</label>
            <select name="hotel_id" id="hotel_id" class="form-control">
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}" {{ $hotelRoom->hotel_id == $hotel->id ? 'selected' : '' }}>
                        {{ $hotel->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="room_type_id" class="form-label">Tipo de Habitación</label>
            <select name="room_type_id" id="room_type_id" class="form-control">
                @foreach ($roomTypes as $roomType)
                    <option value="{{ $roomType->id }}" {{ $hotelRoom->room_type_id == $roomType->id ? 'selected' : '' }}>
                        {{ $roomType->type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="accommodation_id" class="form-label">Acomodación</label>
            <select name="accommodation_id" id="accommodation_id" class="form-control">
                @foreach ($accommodations as $accommodation)
                    <option value="{{ $accommodation->id }}" {{ $hotelRoom->accommodation_id == $accommodation->id ? 'selected' : '' }}>
                        {{ $accommodation->type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $hotelRoom->quantity }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('hotel-rooms.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
