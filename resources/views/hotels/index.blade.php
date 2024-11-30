<!DOCTYPE html>
<html>
<head>
    <title>Hoteles</title>
</head>
<body>
    <h1>Listado de Hoteles</h1>
    <ul>
        @foreach ($hotels as $hotel)
            <li>{{ $hotel->name }} - {{ $hotel->city }}</li>
        @endforeach
    </ul>
</body>
</html>