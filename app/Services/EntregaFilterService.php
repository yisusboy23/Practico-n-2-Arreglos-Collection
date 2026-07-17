<?php

namespace App\Services;

use App\Models\Entrega;
use Illuminate\Support\Collection;

class EntregaFilterService
{
    /**
     * Filtra entregas según un arreglo asociativo de criterios.
     * Ejemplo de $criterios:
     * ['estudiante_id' => 2, 'estado' => 'entregado']
     */
    public function filtrar(array $criterios): Collection
    {
        $entregas = Entrega::with(['estudiante', 'tarea'])->get();

        return $entregas
            ->when(isset($criterios['estudiante_id']), function (Collection $col) use ($criterios) {
                return $col->filter(fn ($entrega) => $entrega->estudiante_id == $criterios['estudiante_id']);
            })
            ->when(isset($criterios['tarea_id']), function (Collection $col) use ($criterios) {
                return $col->filter(fn ($entrega) => $entrega->tarea_id == $criterios['tarea_id']);
            })
            ->when(isset($criterios['estado']), function (Collection $col) use ($criterios) {
                return $col->filter(fn ($entrega) => $entrega->estado == $criterios['estado']);
            })
            ->values();
    }
}