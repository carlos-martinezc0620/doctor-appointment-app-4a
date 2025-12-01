<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Entrenadores', 'href' => route('admin.trainers.index')],
    ['name' => 'Crear']
]">

    <h1 class="text-2xl font-semibold mb-6">Registrar Entrenador</h1>

    <form action="{{ route('admin.trainers.store') }}" method="POST" class="space-y-4">
        @csrf
        @include('admin.trainers._form')

        <x-wire-button blue type="submit">
            Guardrar
        </x-wire-button>
    </form>

</x-admin-layout>
