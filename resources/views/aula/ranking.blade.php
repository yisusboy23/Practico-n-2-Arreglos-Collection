@extends('layout.plantilla')

@section('title', 'Ranking de Estudiantes')
@section('header', 'Ranking de Estudiantes')

@section('content')
    <div class="bg-white rounded-xl shadow overflow-hidden max-w-2xl mx-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-800 text-white text-sm uppercase">
                <tr>
                    <th class="px-4 py-3">Puesto</th>
                    <th class="px-4 py-3">Estudiante</th>
                    <th class="px-4 py-3 text-right">Promedio</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($ranking as $index => $item)
                    <tr @class([
                        'hover:bg-gray-50',
                        'bg-yellow-50' => $index === 0,
                        'bg-gray-50' => $index === 1,
                        'bg-orange-50' => $index === 2,
                    ])>
                        <td class="px-4 py-3 font-bold">
                            @if ($index === 0) 🥇
                            @elseif ($index === 1) 🥈
                            @elseif ($index === 2) 🥉
                            @else {{ $index + 1 }}°
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $item['estudiante'] }}</td>
                        <td class="px-4 py-3 text-right font-semibold text-teal-700">{{ $item['promedio'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection