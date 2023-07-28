@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-green-500 text-base font-bold leading-5 text-green-700 focus:outline-none focus:border-green-300 hover:text-amber-500 hover:border-amber-500 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-bold leading-5 text-green-400 hover:text-amber-500 hover:border-gray-300 focus:outline-none focus:text-amber-600 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
