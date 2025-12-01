<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Clases']
]">

    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.classes.create') }}">
            <i class="fa-solid fa-plus"></i>
            Nueva Clase
        </x-wire-button>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Nombre</th>
                <th class="p-3">Capacidad</th>
                <th class="p-3">Entrenador</th>
                <th class="p-3">Acciones</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($classes as $class)
                <tr class="border-b">
                    <td class="p-3">{{ $class->id }}</td>
                    <td class="p-3">{{ $class->name }}</td>
                    <td class="p-3">{{ $class->capacity }}</td>
                    <td class="p-3">{{ $class->trainer->name }}</td>

                    <td class="p-3 space-x-2">
                        <a href="{{ route('admin.classes.edit', $class) }}"
                           class="text-blue-600 hover:underline">Editar</a>

                        <form action="{{ route('admin.classes.destroy', $class) }}"
                              method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if ($classes->isEmpty())
                <tr>
                    <td colspan="5" class="p-3 text-center text-gray-500">
                        No hay clases registradas.
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

</x-admin-layout>
