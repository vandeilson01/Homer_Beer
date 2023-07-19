@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-[yellow] text-left text-base font-medium text-[yellow] bg-transparent focus:outline-none focus:text-[white] focus:bg-[yellow]-100 focus:border-[white] transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-[yellow] hover:text-white hover:bg-transparent hover:border-[yellow] focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
