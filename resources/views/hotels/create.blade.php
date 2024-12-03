<!DOCTYPE html>
<html>
<head>
    <title>Crear Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1 class="mb-4">Crear Nuevo Hotel</h1>

    <!-- Mostrar errores globales -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hotels.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Hotel</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name') }}" 
                required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Dirección</label>
            <input 
                type="text" 
                name="address" 
                id="address" 
                class="form-control @error('address') is-invalid @enderror" 
                value="{{ old('address') }}" 
                required>
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Ciudad</label>
            <input 
                type="text" 
                name="city" 
                id="city" 
                class="form-control @error('city') is-invalid @enderror" 
                value="{{ old('city') }}" 
                required>
            @error('city')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nit" class="form-label">NIT</label>
            <input 
                type="text" 
                name="nit" 
                id="nit" 
                class="form-control @error('nit') is-invalid @enderror" 
                value="{{ old('nit') }}" 
                required>
            @error('nit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="max_rooms" class="form-label">Máximo de Habitaciones</label>
            <input 
                type="number" 
                name="max_rooms" 
                id="max_rooms" 
                class="form-control @error('max_rooms') is-invalid @enderror" 
                value="{{ old('max_rooms') }}" 
                required>
            @error('max_rooms')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
