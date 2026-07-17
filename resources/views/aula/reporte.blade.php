@extends('layout.plantilla')

@section('title', 'Reporte Aula Virtual')
@section('header', 'Reporte del Aula Virtual')

@section('content')
    <div class="bg-white rounded-xl shadow p-6 mb-6 flex items-center justify-between">
        <span class="text-gray-600 font-medium">Entregas atrasadas</span>
        <span class="text-3xl font-bold text-red-600">{{ $reporte['porcentaje_atrasadas'] }}%</span>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <h2 class="bg-gray-800 text-white px-4 py-3 font-semibold">Promedio por estudiante</h2>
            <table class="w-full text-left">
                <tbody class="divide-y divide-gray-100">
                    @foreach ($reporte['promedio_por_estudiante'] as $nombre => $promedio)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $nombre }}</td>
                            <td class="px-4 py-3 text-right font-semibold text-teal-700">{{ $promedio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <h2 class="bg-gray-800 text-white px-4 py-3 font-semibold">Promedio por tarea</h2>
            <table class="w-full text-left">
                <tbody class="divide-y divide-gray-100">
                    @foreach ($reporte['promedio_por_tarea'] as $titulo => $promedio)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $titulo }}</td>
                            <td class="px-4 py-3 text-right font-semibold text-teal-700">{{ $promedio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection