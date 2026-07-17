<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Filtro de Entregas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f4; }
        h1 { color: #333; }
        form { background: #fff; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        select, button { padding: 8px; margin-right: 10px; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #333; color: #fff; }
        .badge { padding: 3px 8px; border-radius: 4px; color: #fff; font-size: 12px; }
        .entregado { background: green; }
        .atrasado { background: red; }
        .pendiente { background: orange; }
        nav a { margin-right: 15px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('entregas.filtro') }}">Filtro de Entregas</a>
        <a href="{{ route('reporte') }}">Reporte</a>
        <a href="{{ route('ranking') }}">Ranking</a>
    </nav>

    <h1>Filtro de Entregas</h1>

    <form method="GET" action="{{ route('entregas.filtro') }}">
        <select name="estudiante_id">
            <option value="">-- Todos los estudiantes --</option>
            @foreach ($estudiantes as $estudiante)
                <option value="{{ $estudiante->id }}" @selected(($criterios['estudiante_id'] ?? '') == $estudiante->id)>
                    {{ $estudiante->nombre }}
                </option>
            @endforeach
        </select>

        <select name="tarea_id">
            <option value="">-- Todas las tareas --</option>
            @foreach ($tareas as $tarea)
                <option value="{{ $tarea->id }}" @selected(($criterios['tarea_id'] ?? '') == $tarea->id)>
                    {{ $tarea->titulo }}
                </option>
            @endforeach
        </select>

        <select name="estado">
            <option value="">-- Todos los estados --</option>
            <option value="entregado" @selected(($criterios['estado'] ?? '') == 'entregado')>Entregado</option>
            <option value="atrasado" @selected(($criterios['estado'] ?? '') == 'atrasado')>Atrasado</option>
            <option value="pendiente" @selected(($criterios['estado'] ?? '') == 'pendiente')>Pendiente</option>
        </select>

        <button type="submit">Filtrar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Tarea</th>
                <th>Nota</th>
                <th>Estado</th>
                <th>Fecha de entrega</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($entregas as $entrega)
                <tr>
                    <td>{{ $entrega->estudiante->nombre }}</td>
                    <td>{{ $entrega->tarea->titulo }}</td>
                    <td>{{ $entrega->nota ?? '-' }}</td>
                    <td><span class="badge {{ $entrega->estado }}">{{ $entrega->estado }}</span></td>
                    <td>{{ $entrega->fecha_entrega ? $entrega->fecha_entrega->format('d/m/Y') : '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No se encontraron entregas con esos criterios.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>