<?php

namespace App\Services;

use App\Models\Entrega;

class RankingEstudiantesService
{
    /**
     * Retorna un arreglo ordenado de estudiantes según su promedio de notas,
     * de mayor a menor.
     */
    public function generar(): array
    {
        $entregas = Entrega::with('estudiante')->get();

        return $entregas
            ->filter(fn ($e) => $e->nota !== null)
            ->groupBy('estudiante.nombre')
            ->map(function ($grupo) {
                return round(
                    $grupo->reduce(fn ($acum, $e) => $acum + $e->nota, 0) / $grupo->count(),
                    2
                );
            })
            ->sortByDesc(fn ($promedio) => $promedio)
            ->map(fn ($promedio, $nombre) => [
                'estudiante' => $nombre,
                'promedio' => $promedio,
            ])
            ->values()
            ->toArray();
    }
}