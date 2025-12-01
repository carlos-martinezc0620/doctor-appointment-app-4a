<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Definir roles
        $roles = [
            'Cliente',
            'Entrenador',
            'Recepcionista',
            'Administrador',
        ];

        // Crear roles
        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'guard_name' => 'web',   // 🔥 IMPORTANTE
            ]);
        }
    }
}
