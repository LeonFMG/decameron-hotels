<!DOCTYPE html>
<html>
<head>
    <title>Editar Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1 class="mb-4">Editar Hotel</h1>

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

    <!-- Formulario de edición -->
    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Hotel</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $hotel->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Dirección</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $hotel->address) }}" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Ciudad</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $hotel->city) }}" required>
        </div>

        <div class="mb-3">
            <label for="nit" class="form-label">NIT</label>
            <input type="text" name="nit" id="nit" class="form-control" value="{{ old('nit', $hotel->nit) }}" required>
        </div>

        <div class="mb-3">
            <label for="max_rooms" class="form-label">Máximo de Habitaciones</label>
            <input type="number" name="max_rooms" id="max_rooms" class="form-control" value="{{ old('max_rooms', $hotel->max_rooms) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
