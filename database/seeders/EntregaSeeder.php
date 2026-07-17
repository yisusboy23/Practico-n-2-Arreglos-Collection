<?php

namespace Database\Seeders;

use App\Models\Entrega;
use App\Models\Estudiante;
use App\Models\Tarea;
use Illuminate\Database\Seeder;

class EntregaSeeder extends Seeder
{
    public function run(): void
    {
        $estudiantes = Estudiante::all();
        $tareas = Tarea::all();

        $estados = ['entregado', 'entregado', 'atrasado', 'pendiente'];

        foreach ($estudiantes as $estudiante) {
            foreach ($tareas as $tarea) {
                $estado = $estados[array_rand($estados)];

                Entrega::create([
                    'estudiante_id' => $estudiante->id,
                    'tarea_id' => $tarea->id,
                    'nota' => $estado === 'pendiente' ? null : rand(60, 100) / 10,
                    'estado' => $estado,
                    'fecha_entrega' => $estado === 'pendiente' ? null : now()->subDays(rand(0, 20)),
                ]);
            }
        }
    }
}