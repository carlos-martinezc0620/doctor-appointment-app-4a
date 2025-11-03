<x-admin-layout title="Roles | ClinicConnect"
                :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Roles', 'href' => route('admin.roles.index')],
    ['name' => 'Editar'],
]">

    <div class="bg-white p-6 rounded shadow max-w-md">
        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block font-medium text-sm mb-1">Nombre del Rol</label>
            <input type="text" name="name" value="{{ old('name', $role->name) }}"
                   class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">

            @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <div class="flex justify-end mt-4">
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Actualizar
                </button>
            </div>
        </form>
    </div>

</x-admin-layout>
