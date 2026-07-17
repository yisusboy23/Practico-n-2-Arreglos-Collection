<?php

namespace Database\Seeders;

use App\Models\Tarea;
use Illuminate\Database\Seeder;

class TareaSeeder extends Seeder
{
    public function run(): void
    {
        $tareas = [
            ['titulo' => 'Tarea 1: Arreglos', 'descripcion' => 'Ejercicios de arreglos en PHP', 'fecha_limite' => '2026-06-01'],
            ['titulo' => 'Tarea 2: Collections', 'descripcion' => 'Uso de Collections de Laravel', 'fecha_limite' => '2026-06-15'],
            ['titulo' => 'Tarea 3: Eloquent', 'descripcion' => 'Relaciones entre modelos', 'fecha_limite' => '2026-07-01'],
        ];

        foreach ($tareas as $tarea) {
            Tarea::create($tarea);
        }
    }
}