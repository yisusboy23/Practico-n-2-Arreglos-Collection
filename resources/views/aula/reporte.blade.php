<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Aula Virtual</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f4; }
        h1, h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-bottom: 30px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #333; color: #fff; }
        .resumen { background: #fff; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        nav a { margin-right: 15px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('entregas.filtro') }}">Filtro de Entregas</a>
        <a href="{{ route('reporte') }}">Reporte</a>
        <a href="{{ route('ranking') }}">Ranking</a>
    </nav>

    <h1>Reporte del Aula Virtual</h1>

    <div class="resumen">
        <strong>% de entregas atrasadas:</strong> {{ $reporte['porcentaje_atrasadas'] }}%
    </div>

    <h2>Promedio de notas por estudiante</h2>
    <table>
        <thead>
            <tr><th>Estudiante</th><th>Promedio</th></tr>
        </thead>
        <tbody>
            @foreach ($reporte['promedio_por_estudiante'] as $nombre => $promedio)
                <tr>
                    <td>{{ $nombre }}</td>
                    <td>{{ $promedio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Promedio de notas por tarea</h2>
    <table>
        <thead>
            <tr><th>Tarea</th><th>Promedio</th></tr>
        </thead>
        <tbody>
            @foreach ($reporte['promedio_por_tarea'] as $titulo => $promedio)
                <tr>
                    <td>{{ $titulo }}</td>
                    <td>{{ $promedio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>