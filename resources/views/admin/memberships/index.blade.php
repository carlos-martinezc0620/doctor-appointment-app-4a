<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Membresías']
]">

    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.memberships.create') }}">
            <i class="fa-solid fa-plus"></i>
            Nueva Membresía
        </x-wire-button>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Tipo</th>
                <th class="p-3">Precio</th>
                <th class="p-3">Duración</th>
                <th class="p-3">Acciones</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($memberships as $membership)
                <tr class="border-b">
                    <td class="p-3">{{ $membership->id }}</td>
                    <td class="p-3">{{ $membership->type }}</td>
                    <td class="p-3">${{ number_format($membership->price, 2) }}</td>
                    <td class="p-3">{{ $membership->duration }} días</td>

                    <td class="p-3 space-x-2">
                        <a href="{{ route('admin.memberships.edit', $membership) }}"
                           class="text-blue-600 hover:underline">Editar</a>

                        <form action="{{ route('admin.memberships.destroy', $membership) }}"
                              method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if ($memberships->isEmpty())
                <tr>
                    <td colspan="5" class="p-3 text-center text-gray-500">
                        No hay membresías registradas.
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

</x-admin-layout>
