<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('No se puede crear un usuario con un rol inexistente', function () {

    // 1) Rol admin para el usuario autenticado
    $adminRole = Role::create(['name' => 'admin']);
    $admin = User::factory()->create();
    $admin->roles()->attach($adminRole->id);

    $this->actingAs($admin);

    // 2) Datos con role_id que deben ser inválidos
    $data = [
        'name' => 'Juan',
        'email' => 'juan@test.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
        'id_number' => 'ABC123',
        'phone' => '1234567890',
        'address' => 'Calle falsa 123',
        'role_id' => 999 // no existe
    ];

    $response = $this->post(route('admin.users.store'), $data);

    // 3) Mensaje de falla por validación de rol inexistente
    $response->assertSessionHasErrors('role_id');

    // 3) No debe existir en la base de datos
    $this->assertDatabaseMissing('users', [
        'email' => 'juan@test.com'
    ]);
});
