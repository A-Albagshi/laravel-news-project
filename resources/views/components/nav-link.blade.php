@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-white-400 text-lg font-medium leading-5 text-white-900 focus:outline-none focus:border-white-300 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-lg font-medium leading-5 text-white-500 hover:text-gray-300 hover:border-black-300 focus:outline-none focus:text-white-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
