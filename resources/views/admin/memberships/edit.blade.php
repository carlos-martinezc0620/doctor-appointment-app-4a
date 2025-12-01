<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Membresías', 'href' => route('admin.memberships.index')],
    ['name' => 'Editar']
]">

    <h1 class="text-2xl font-semibold mb-6">Editar Membresía</h1>

    <form action="{{ route('admin.memberships.update', $membership) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        @include('admin.memberships._form', ['membership' => $membership])

        <x-wire-button blue type="submit">
            Actualizar
        </x-wire-button>
    </form>

</x-admin-layout>
