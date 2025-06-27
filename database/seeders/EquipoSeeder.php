<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Tecnico;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    public function run(): void
    {
        $tecnicos = Tecnico::all();
        $negocios = \App\Models\Negocio::all();

        $tiposEquipo = ['Laptop', 'Desktop', 'Impresora', 'Tablet', 'Smartphone'];
        $marcas = ['HP', 'Dell', 'Lenovo', 'Apple', 'Samsung', 'Asus'];
        $estados = ['Recibido', 'En diagnóstico', 'En reparación', 'Reparado', 'Entregado'];

        foreach ($tecnicos as $tecnico) {
            // Crear 3 equipos por cada técnico
            for ($i = 0; $i < 3; $i++) {
                $fechaLlegada = now()->subDays(rand(1, 30));
                $fechaSalida = rand(0, 1) ? $fechaLlegada->copy()->addDays(rand(1, 7)) : null;
                $negocio = $negocios->random();

                Equipo::create([
                    'tecnico_id' => $tecnico->id,
                    'negocio_id' => $negocio->id,
                    'estadoEquipo' => $estados[array_rand($estados)],
                    'tipoDeEquipo' => $tiposEquipo[array_rand($tiposEquipo)],
                    'marcaEquipo' => $marcas[array_rand($marcas)],
                    'danioEquipo' => 'Problema de ' . ['pantalla', 'batería', 'disco duro', 'sistema'][array_rand(['pantalla', 'batería', 'disco duro', 'sistema'])],
                    'accesoriosEquipo' => 'Cargador, ' . ['mouse', 'funda', 'cables', 'adaptador'][array_rand(['mouse', 'funda', 'cables', 'adaptador'])],
                    'imagenesEquipo' => 'equipo_' . rand(1, 999) . '.jpg',
                    'modeloEquipo' => 'Modelo ' . rand(1000, 9999),
                    'observacionesEquipo' => 'Observaciones de diagnóstico y reparación del equipo',
                    'numeroDeSerieEquipo' => 'SN' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT),
                    'fechaLlegada' => $fechaLlegada,
                    'fechaSalida' => $fechaSalida,
                ]);
            }
        }
    }
}