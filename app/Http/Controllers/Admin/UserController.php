<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create', [
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
                ['name' => 'Usuarios', 'href' => route('admin.users.index')],
                ['name' => 'Nuevo Usuario'],
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $user)
    {
        // Bloquear edición del usuario ID=1 (administrador raíz)
        if ($user->id == 1) {
            session()->flash('swal', [
                'type'  => 'error',
                'title' => 'Error',
                'text'  => 'No puedes editar este usuario principal.'
            ]);
        }

        return view('admin.users.edit', [
            'user' => $user,
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
                ['name' => 'Usuarios', 'href' => route('admin.users.index')],
                ['name' => 'Editar Usuario'],
            ]
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
        ]);

        if ($user->name === $request->name && $user->email === $request->email) {
            session()->flash('swal', [
                'icon'  => 'info',
                'title' => 'Sin cambios',
                'text'  => 'No se detectaron cambios'
            ]);

            return redirect()->route('admin.users.edit', ['user' => $user->id]);
        }

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        if ($user->id == 1) {
            session()->flash('swal', [
                'type'  => 'error',
                'title' => 'Error',
                'text'  => 'No puedes eliminar este usuario principal.'
            ]);
            return redirect()->route('admin.users.index');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}
