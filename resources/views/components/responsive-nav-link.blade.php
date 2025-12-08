@props(['active'])

@php
    $classes = $active ?? false
        ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-news-red text-left text-base font-medium text-news-red bg-red-50 focus:outline-none focus:text-red-800 focus:bg-red-100 focus:border-red-700 transition'
        : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>