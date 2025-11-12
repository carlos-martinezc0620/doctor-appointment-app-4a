<x-admin-layout title="Usuarios | ClinicConnect"
                :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Usuarios', 'href' => route('admin.users.index')],
    ['name' => 'Editar'],
]">

    <div class="bg-white p-6 rounded shadow max-w-md">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block font-medium text-sm mb-1">Nombre</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                   class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
            @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label class="block font-medium text-sm mb-1 mt-4">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                   class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
            @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label class="block font-medium text-sm mb-1 mt-4">Nueva contraseña (opcional)</label>
            <input type="password" name="password"
                   class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña"
                   class="w-full border rounded p-2 mt-2 focus:ring-blue-500 focus:border-blue-500">

            <div class="flex justify-end mt-4">
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Actualizar
                </button>
            </div>
        </form>
    </div>

</x-admin-layout>
