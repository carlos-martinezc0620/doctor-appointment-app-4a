<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Clases', 'href' => route('admin.classes.index')],
    ['name' => 'Editar']
]">

    <h1 class="text-2xl font-semibold mb-6">Editar Clase</h1>

    <form action="{{ route('admin.classes.update', $class) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        @include('admin.classes._form', ['class' => $class])

        <x-wire-button blue type="submit">
            Actualizar
        </x-wire-button>
    </form>

</x-admin-layout>
