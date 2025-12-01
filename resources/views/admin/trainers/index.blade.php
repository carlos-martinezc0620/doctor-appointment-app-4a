<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Entrenadores']
]">

    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.trainers.create') }}">
            <i class="fa-solid fa-plus"></i>
            Nuevo Entrenador
        </x-wire-button>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Nombre</th>
                <th class="p-3">Email</th>
                <th class="p-3">Teléfono</th>
                <th class="p-3">Acciones</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($trainers as $trainer)
                <tr class="border-b">
                    <td class="p-3">{{ $trainer->id }}</td>
                    <td class="p-3">{{ $trainer->name }}</td>
                    <td class="p-3">{{ $trainer->email }}</td>
                    <td class="p-3">{{ $trainer->phone }}</td>

                    <td class="p-3 space-x-2">
                        <a href="{{ route('admin.trainers.edit', $trainer) }}"
                           class="text-blue-600 hover:underline">Editar</a>

                        <form action="{{ route('admin.trainers.destroy', $trainer) }}"
                              method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if ($trainers->isEmpty())
                <tr>
                    <td colspan="5" class="p-3 text-center text-gray-500">
                        No hay entrenadores registrados.
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

</x-admin-layout>
