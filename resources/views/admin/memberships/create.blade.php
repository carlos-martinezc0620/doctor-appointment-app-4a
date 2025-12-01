<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Membresías', 'href' => route('admin.memberships.index')],
    ['name' => 'Crear']
]">

    <h1 class="text-2xl font-semibold mb-6">Crear Membresía</h1>

    <form action="{{ route('admin.memberships.store') }}" method="POST" class="space-y-4">
        @csrf
        @include('admin.memberships._form')

        <x-wire-button blue type="submit">
            Guardar
        </x-wire-button>
    </form>

</x-admin-layout>
