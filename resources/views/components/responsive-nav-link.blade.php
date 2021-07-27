@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-blue-800 text-base font-medium text-white-700 bg-white focus:outline-none focus:text-blue-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white hover:text-white-800 hover:bg-white hover:border-white-300 focus:outline-none focus:text-white-800 focus:bg-white-50 focus:border-white-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
