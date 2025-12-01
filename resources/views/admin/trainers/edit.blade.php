<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Entrenadores', 'href' => route('admin.trainers.index')],
    ['name' => 'Editar']
]">

    <h1 class="text-2xl font-semibold mb-6">Editar Entrenador</h1>

    <form action="{{ route('admin.trainers.update', $trainer) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        @include('admin.trainers._form', ['trainer' => $trainer])

        <x-wire-button blue type="submit">
            Actualizar
        </x-wire-button>
    </form>

</x-admin-layout>
