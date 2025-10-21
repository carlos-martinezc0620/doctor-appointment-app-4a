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
        // Llamar al RoleSeeder creado
        $this->call([RoleSeeder::class]);

        // Crea un usuario de prueba cada que ejecuto migrations

        User::factory()->create([
            'name' => 'Charlie Martinez',
            'email' => 'carlos.martinez@tecdesoftware.com',
            'password' => bcrypt('0620_FX'),
        ]);
    }
}
