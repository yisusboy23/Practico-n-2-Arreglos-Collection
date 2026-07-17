<?php

namespace App\Http\Controllers;

use App\Services\EntregaFilterService;
use App\Services\ReporteAulaVirtualService;
use App\Services\RankingEstudiantesService;
use App\Models\Estudiante;
use App\Models\Tarea;
use Illuminate\Http\Request;

class AulaVirtualController extends Controller
{
    public function filtrarEntregas(Request $request, EntregaFilterService $filterService)
    {
        $criterios = [
            'estudiante_id' => $request->input('estudiante_id'),
            'tarea_id' => $request->input('tarea_id'),
            'estado' => $request->input('estado'),
        ];

        // Quitamos los criterios vacíos para no filtrar de más
        $criterios = array_filter($criterios, fn ($valor) => !is_null($valor) && $valor !== '');

        $entregas = $filterService->filtrar($criterios);
        $estudiantes = Estudiante::all();
        $tareas = Tarea::all();

        return view('aula.filtro', compact('entregas', 'estudiantes', 'tareas', 'criterios'));
    }

    public function reporte(ReporteAulaVirtualService $reporteService)
    {
        $reporte = $reporteService->generar();

        return view('aula.reporte', compact('reporte'));
    }

    public function ranking(RankingEstudiantesService $rankingService)
    {
        $ranking = $rankingService->generar();

        return view('aula.ranking', compact('ranking'));
    }
}