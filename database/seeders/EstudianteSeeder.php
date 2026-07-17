<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    public function run(): void
    {
        $estudiantes = [
            ['nombre' => 'Ana Pérez', 'email' => 'ana@aula.com'],
            ['nombre' => 'Luis Gómez', 'email' => 'luis@aula.com'],
            ['nombre' => 'María Torres', 'email' => 'maria@aula.com'],
            ['nombre' => 'Carlos Ruiz', 'email' => 'carlos@aula.com'],
        ];

        foreach ($estudiantes as $est) {
            Estudiante::create($est);
        }
    }
}