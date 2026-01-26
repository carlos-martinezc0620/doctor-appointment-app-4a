<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('No se puede actualizar un usuario con datos inválidos', function () {

    // 1) Crear el rol
    $role = Role::create(['name' => 'tester']);

    // 2) Autenticación de usuario
    $authUser = User::factory()->create();
    $authUser->roles()->attach($role->id);

    // 3) Usuario a editar
    $userToUpdate = User::factory()->create();
    $userToUpdate->roles()->attach($role->id);

    // 4) Iniciar sesión con el usuario
    $this->actingAs($authUser, 'web');

    // 5) Datos inválidos (vacíos y mal formados)
    $data = [
        'name' => '',
        'email' => 'correo-no-valido',
        'password' => '123',
        'password_confirmation' => '456',
        'id_number' => '###',
        'phone' => 'abc',
        'address' => '',
        'role_id' => 9999 // Este es un ejemplo de un rol_id que no es válido
    ];

    // 6) Petición update
    $response = $this->put(route('admin.users.update', $userToUpdate), $data);

    // 7) Debe fallar la validación
    $response->assertStatus(302);

    // 8) Verificar que no cambiaron los datos del usuario
    $this->assertDatabaseHas('users', [
        'id' => $userToUpdate->id,
        'email' => $userToUpdate->email,
    ]);
});
