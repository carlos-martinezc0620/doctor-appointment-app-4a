<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Clases', 'href' => route('admin.classes.index')],
    ['name' => 'Crear']
]">

    <h1 class="text-2xl font-semibold mb-6">Crear Clase</h1>

    <form action="{{ route('admin.classes.store') }}" method="POST" class="space-y-4">
        @csrf
        @include('admin.classes._form')

        <x-wire-button blue type="submit">
            Guardar
        </x-wire-button>
    </form>

</x-admin-layout>
