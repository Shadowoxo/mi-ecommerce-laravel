<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear un usuario administrador
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password123'),
        ]);

        // Crear un usuario cliente
        User::factory()->create([
            'name' => 'Cliente User',
            'email' => 'cliente@example.com',
            'role' => 'cliente',
            'password' => bcrypt('password123'),
        ]);

        // Crear usuarios adicionales de prueba si se desea
        // User::factory(10)->create();
    }
}
