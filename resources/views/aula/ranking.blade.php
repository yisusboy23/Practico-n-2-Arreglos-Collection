<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ranking de Estudiantes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f4; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #333; color: #fff; }
        .puesto-1 { background: gold; font-weight: bold; }
        .puesto-2 { background: silver; }
        .puesto-3 { background: #cd7f32; }
        nav a { margin-right: 15px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('entregas.filtro') }}">Filtro de Entregas</a>
        <a href="{{ route('reporte') }}">Reporte</a>
        <a href="{{ route('ranking') }}">Ranking</a>
    </nav>

    <h1>Ranking de Estudiantes</h1>

    <table>
        <thead>
            <tr>
                <th>Puesto</th>
                <th>Estudiante</th>
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ranking as $index => $item)
                <tr class="puesto-{{ $index + 1 }}">
                    <td>{{ $index + 1 }}°</td>
                    <td>{{ $item['estudiante'] }}</td>
                    <td>{{ $item['promedio'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>