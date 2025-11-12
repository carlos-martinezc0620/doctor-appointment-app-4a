<x-admin-layout title="Usuarios | ClinicConnect"
                :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Usuarios', 'href' => route('admin.users.index')],
    ['name' => 'Nuevo'],
]">

    <div class="bg-white p-6 rounded shadow max-w-md">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <label class="block font-medium text-sm mb-1">Nombre</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
            @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label class="block font-medium text-sm mb-1 mt-4">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
            @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label class="block font-medium text-sm mb-1 mt-4">Contraseña</label>
            <input type="password" name="password"
                   class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
            @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label class="block font-medium text-sm mb-1 mt-4">Confirmar contraseña</label>
            <input type="password" name="password_confirmation"
                   class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">

            <div class="flex justify-end mt-4">
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Guardar
                </button>
            </div>
        </form>
    </div>

</x-admin-layout>
