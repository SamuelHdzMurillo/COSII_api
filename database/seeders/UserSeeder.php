<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nombreUsuario' => 'Admin',
            'apellidosUsuario' => 'Sistema',
            'numUsuario' => '001',
            'numeroEmpleado' => 'EMP001',
            'email' => 'admin@sistema.com',
            'password' => Hash::make('password123'),
        ]);

        // Crear usuarios adicionales de prueba
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'nombreUsuario' => "Usuario{$i}",
                'apellidosUsuario' => "Apellido{$i}",
                'numUsuario' => str_pad($i, 3, '0', STR_PAD_LEFT),
                'numeroEmpleado' => 'EMP' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                'email' => "usuario{$i}@sistema.com",
                'password' => Hash::make('password123'),
            ]);
        }
    }
}