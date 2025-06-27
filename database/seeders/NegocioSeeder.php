<?php

namespace Database\Seeders;

use App\Models\Negocio;
use Illuminate\Database\Seeder;

class NegocioSeeder extends Seeder
{
    public function run(): void
    {
        $negocios = [
            [
                'nombreNegocio' => 'Reparación Express',
                'numeroNegocio' => '555-0001',
                'correoNegocio' => 'contacto@reparacionexpress.com',
            ],
            [
                'nombreNegocio' => 'TecnoService',
                'numeroNegocio' => '555-0002',
                'correoNegocio' => 'info@tecnoservice.com',
            ],
            [
                'nombreNegocio' => 'Electrónica Moderna',
                'numeroNegocio' => '555-0003',
                'correoNegocio' => 'ventas@electronicamoderna.com',
            ],
            [
                'nombreNegocio' => 'CompuFix',
                'numeroNegocio' => '555-0004',
                'correoNegocio' => 'soporte@compufix.com',
            ],
        ];

        foreach ($negocios as $negocio) {
            Negocio::create($negocio);
        }
    }
}