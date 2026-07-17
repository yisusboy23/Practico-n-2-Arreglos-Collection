@extends('layout.plantilla')

@section('title', 'Filtro de Entregas')
@section('header', 'Filtro de Entregas')

@section('content')
    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <form method="GET" action="{{ route('entregas.filtro') }}" class="flex flex-wrap gap-4 items-end">
            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-600 mb-1">Estudiante</label>
                <select name="estudiante_id" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-600 focus:outline-none">
                    <option value="">Todos los estudiantes</option>
                    @foreach ($estudiantes as $estudiante)
                        <option value="{{ $estudiante->id }}" @selected(($criterios['estudiante_id'] ?? '') == $estudiante->id)>
                            {{ $estudiante->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-600 mb-1">Tarea</label>
                <select name="tarea_id" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-600 focus:outline-none">
                    <option value="">Todas las tareas</option>
                    @foreach ($tareas as $tarea)
                        <option value="{{ $tarea->id }}" @selected(($criterios['tarea_id'] ?? '') == $tarea->id)>
                            {{ $tarea->titulo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-600 mb-1">Estado</label>
                <select name="estado" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-600 focus:outline-none">
                    <option value="">Todos los estados</option>
                    <option value="entregado" @selected(($criterios['estado'] ?? '') == 'entregado')>Entregado</option>
                    <option value="atrasado" @selected(($criterios['estado'] ?? '') == 'atrasado')>Atrasado</option>
                    <option value="pendiente" @selected(($criterios['estado'] ?? '') == 'pendiente')>Pendiente</option>
                </select>
            </div>

            <button type="submit" class="bg-teal-700 hover:bg-teal-800 text-white font-medium px-5 py-2 rounded-lg transition">
                Filtrar
            </button>

            @if (!empty($criterios))
                <a href="{{ route('entregas.filtro') }}" class="text-sm text-gray-500 hover:text-gray-700 underline">
                    Limpiar filtros
                </a>
            @endif
        </form>
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-800 text-white text-sm uppercase">
                <tr>
                    <th class="px-4 py-3">Estudiante</th>
                    <th class="px-4 py-3">Tarea</th>
                    <th class="px-4 py-3">Nota</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Fecha de entrega</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($entregas as $entrega)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $entrega->estudiante->nombre }}</td>
                        <td class="px-4 py-3">{{ $entrega->tarea->titulo }}</td>
                        <td class="px-4 py-3">{{ $entrega->nota ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <span @class([
                                'px-2.5 py-1 rounded-full text-xs font-semibold text-white',
                                'bg-green-600' => $entrega->estado === 'entregado',
                                'bg-red-600' => $entrega->estado === 'atrasado',
                                'bg-amber-500' => $entrega->estado === 'pendiente',
                            ])>
                                {{ ucfirst($entrega->estado) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">{{ $entrega->fecha_entrega ? $entrega->fecha_entrega->format('d/m/Y') : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-400">
                            No se encontraron entregas con esos criterios.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection