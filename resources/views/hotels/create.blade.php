<!DOCTYPE html>
<html>
<head>
    <title>Crear Hotel</title>
</head>
<body>
    <h1>Crear un Nuevo Hotel</h1>
    <form method="POST" action="{{ route('hotels.store') }}">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="name"><br>
        <label>Dirección:</label>
        <input type="text" name="address"><br>
        <label>Ciudad:</label>
        <input type="text" name="city"><br>
        <label>NIT:</label>
        <input type="text" name="nit"><br>
        <label>Máximo de Habitaciones:</label>
        <input type="number" name="max_rooms"><br>
        <button type="submit">Crear</button>
    </form>
</body>
</html>
