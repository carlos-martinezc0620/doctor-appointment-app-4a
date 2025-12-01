@php
    // Arreglo de íconos
    $links = [
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
            'href' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'header' => 'Gestión',
        ],
         [
            'name' => 'Roles y permisos',
            'icon' => 'fa-solid fa-shield-halved',
            'href' => route('admin.roles.index'),
            'active' => request()->routeIs('admin.roles.*'),
        ],
        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-users',
            'href' => route('admin.users.index'),
            'active' => request()->routeIs('admin.users.*'),
        ],
        [
            'name' => 'Membresías',
            'icon' => 'fa-solid fa-id-card',
            'href' => route('admin.memberships.index'),
            'active' => request()->routeIs('admin.memberships.*'),
        ],

        [
            'name' => 'Entrenadores',
            'icon' => 'fa-solid fa-dumbbell',
            'href' => route('admin.trainers.index'),
            'active' => request()->routeIs('admin.trainers.*'),
        ],

        [
            'name' => 'Clases',
            'icon' => 'fa-solid fa-person-running',
            'href' => route('admin.classes.index'),
            'active' => request()->routeIs('admin.classes.*'),
        ],
    ];
@endphp

<aside id="logo-sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform
           -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0
           dark:bg-gray-800 dark:border-gray-700"
       aria-label="Sidebar">

    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li>
                    {{-- Si es un header, muestra el título de sección --}}
                    @isset($link['header'])
                        <div class="px-2 py-2 text-xs font-semibold text-gray-500 uppercase">
                            {{ $link['header'] }}
                        </div>
                    @else
                        {{-- Enlace del menú --}}
                        <a href="{{ $link['href'] }}"
                           class="flex items-center p-2 rounded-lg group
                                   {{ $link['active']
                                        ? 'bg-gray-700 text-white'
                                        : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                            <span class="w-6 h-6 inline-flex justify-center items-center text-gray-300">
                                <i class="{{ $link['icon'] }}"></i>
                            </span>
                            <span class="ms-3">{{ $link['name'] }}</span>
                        </a>
                    @endisset
                </li>
            @endforeach
</aside>


