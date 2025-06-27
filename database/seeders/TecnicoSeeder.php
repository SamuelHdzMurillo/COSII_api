<?php

namespace Database\Seeders;

use App\Models\Tecnico;
use Illuminate\Database\Seeder;

class TecnicoSeeder extends Seeder
{
    public function run(): void
    {
        $tecnicos = [
            [
                'nombre' => 'Juan',
                'apellidos' => 'Pérez García',
                'numero' => '555-1001',
            ],
            [
                'nombre' => 'María',
                'apellidos' => 'López Rodríguez',
                'numero' => '555-1002',
            ],
            [
                'nombre' => 'Carlos',
                'apellidos' => 'González Torres',
                'numero' => '555-1003',
            ],
            [
                'nombre' => 'Ana',
                'apellidos' => 'Martínez Ruiz',
                'numero' => '555-1004',
            ],
            [
                'nombre' => 'Roberto',
                'apellidos' => 'Sánchez Luna',
                'numero' => '555-1005',
            ],
        ];

        foreach ($tecnicos as $tecnico) {
            Tecnico::create($tecnico);
        }
    }
}