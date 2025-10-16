@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center px-3 py-2 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out'
                : 'inline-flex items-center px-3 py-2 text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-500 rounded-md transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
