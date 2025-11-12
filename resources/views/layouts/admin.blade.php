@props([
    'title' => config('app.name', 'Laravel'),
    'breadcrumbs' => [],
])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/1f2d486d88.js" crossorigin="anonymous"></script>

    <!-- WireUI -->
    <wireui:scripts />

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased bg-blue-50">

{{-- Navbar y sidebar --}}
@include('layouts.includes.admin.navigation')
@include('layouts.includes.admin.sidebar')

{{-- Contenido principal --}}
<div class="p-4 sm:ml-64">

    {{-- Encabezado con breadcrumbs y acción --}}
    <div class="mt-14 flex flex-col sm:flex-row sm:items-center sm:justify-between w-full gap-4">
        {{-- Breadcrumbs --}}
        <div>
            @include('admin.breadcrumb', ['breadcrumbs' => $breadcrumbs])
        </div>

        {{-- Botón o acción (slot "action") --}}
        @isset($action)
            <div class="flex-shrink-0">
                {{ $action }}
            </div>
        @endisset
    </div>

    {{-- Contenido de la vista --}}
    <div class="mt-6">
        {{ $slot }}
    </div>
</div>

@stack('modals')

@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
        });
    </script>
@endif

<script>
    // Buscar todos los elementos con la clase "delete-form"
    const forms = document.querySelectorAll('.delete-form');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "¿Estás seguro?",
                text: "No podrás revertir esto.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>


@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ session('error') }}",
            showConfirmButton: true,
        });
    </script>
@endif

@if (session('swal'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: '{{ session('swal.icon') }}',
                title: '{{ session('swal.title') }}',
                text: '{{ session('swal.text') }}',
                showConfirmButton: true,
                confirmButtonColor: '#3085d6'
            });
        });
    </script>
@endif
</body>
</html>
