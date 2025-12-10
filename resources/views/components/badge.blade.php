@props(['textColor', 'bgColor'])

@php
    $textColors = [
        'gray' => 'text-gray-800',
        'blue' => 'text-blue-800',
        'red' => 'text-red-800',
        'yellow' => 'text-yellow-800',
        'pink' => 'text-pink-800',
        'indigo' => 'text-indigo-800',
        'purple' => 'text-purple-800',
        'green' => 'text-green-800',
        'lime' => 'text-lime-800',
        'teal' => 'text-teal-800',
        'orange' => 'text-orange-800',
        'cyan' => 'text-cyan-800',
    ];

    $bgColors = [
        'gray' => 'bg-gray-100 hover:bg-gray-200',
        'blue' => 'bg-blue-100 hover:bg-blue-200',
        'red' => 'bg-red-100 hover:bg-red-200',
        'yellow' => 'bg-yellow-100 hover:bg-yellow-200',
        'pink' => 'bg-pink-100 hover:bg-pink-200',
        'indigo' => 'bg-indigo-100 hover:bg-indigo-200',
        'purple' => 'bg-purple-100 hover:bg-purple-200',
        'green' => 'bg-green-100 hover:bg-green-200',
        'lime' => 'bg-lime-100 hover:bg-lime-200',
        'teal' => 'bg-teal-100 hover:bg-teal-200',
        'orange' => 'bg-orange-100 hover:bg-orange-200',
        'cyan' => 'bg-cyan-100 hover:bg-cyan-200',
    ];

    $textColor = $textColors[$textColor] ?? 'text-gray-800';
    $bgColor = $bgColors[$bgColor] ?? 'bg-gray-100 hover:bg-gray-200';
@endphp

<button {{ $attributes->merge(['class' => "$textColor $bgColor rounded-lg sm:rounded-xl px-2 sm:px-3 md:px-4 py-0.5 sm:py-1 md:py-2 text-[10px] sm:text-xs md:text-base font-medium transition-all duration-200 focus:ring-2 focus:ring-opacity-50"]) }}>
    {{ $slot }}
</button>