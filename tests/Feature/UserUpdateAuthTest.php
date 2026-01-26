<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Un usuario autenticado puede actualizar un usuario', function () {

    // 1) Crear rol manualmente
    $role = Role::create(['name' => 'tester']);

    // 2) Usuario autenticado
    $authUser = User::factory()->create();
    $authUser->roles()->attach($role->id);

    // 3) Usuario creado que pasa a la etapa de "Editar"
    $userToUpdate = User::factory()->create();
    $userToUpdate->roles()->attach($role->id);

    // 4) Iniciar sesión con el nuevo usuario
    $this->actingAs($authUser, 'web');

    // 5) Datos válidos del usuario
    $data = [
        'name' => 'Usuario Actualizado',
        'email' => 'actualizado@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
        'id_number' => 'ABC12345',
        'phone' => '5512345678',
        'address' => 'Calle falsa 123',
        'role_id' => $role->id
    ];

    // 6) Llamada a la acción update
    $response = $this->put(route('admin.users.update', $userToUpdate), $data);

    // 7) Redirección -> éxito
    $response->assertStatus(302);

    // 8) Verificar en la base de datos
    $this->assertDatabaseHas('users', [
        'id' => $userToUpdate->id,
        'name' => 'Usuario Actualizado',
        'email' => 'actualizado@example.com',
        'id_number' => 'ABC12345',
        'phone' => '5512345678',
        'address' => 'Calle falsa 123',
    ]);
});
