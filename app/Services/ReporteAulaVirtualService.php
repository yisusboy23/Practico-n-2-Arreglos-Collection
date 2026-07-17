<?php

namespace App\Services;

use App\Models\Entrega;

class ReporteAulaVirtualService
{
    /**
     * Devuelve un arreglo multidimensional con:
     * - promedio de notas por estudiante
     * - promedio de notas por tarea
     * - % de entregas atrasadas
     */
    public function generar(): array
    {
        $entregas = Entrega::with(['estudiante', 'tarea'])->get();

        // Promedio por estudiante (groupBy + map con reduce)
        $promedioPorEstudiante = $entregas
            ->filter(fn ($e) => $e->nota !== null)
            ->groupBy('estudiante.nombre')
            ->map(function ($grupo) {
                return round(
                    $grupo->reduce(fn ($acum, $e) => $acum + $e->nota, 0) / $grupo->count(),
                    2
                );
            })
            ->toArray();

        // Promedio por tarea
        $promedioPorTarea = $entregas
            ->filter(fn ($e) => $e->nota !== null)
            ->groupBy('tarea.titulo')
            ->map(function ($grupo) {
                return round(
                    $grupo->reduce(fn ($acum, $e) => $acum + $e->nota, 0) / $grupo->count(),
                    2
                );
            })
            ->toArray();

        // % de entregas atrasadas
        $totalEntregas = $entregas->count();
        $totalAtrasadas = $entregas->where('estado', 'atrasado')->count();
        $porcentajeAtrasadas = $totalEntregas > 0
            ? round(($totalAtrasadas / $totalEntregas) * 100, 2)
            : 0;

        // Arreglo multidimensional final
        return [
            'promedio_por_estudiante' => $promedioPorEstudiante,
            'promedio_por_tarea' => $promedioPorTarea,
            'porcentaje_atrasadas' => $porcentajeAtrasadas,
        ];
    }
}