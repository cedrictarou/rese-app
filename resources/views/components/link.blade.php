@props(['href', 'color' => 'blue'])

@php
    switch ($color) {
        case 'blue':
            $addStyle = 'text-white bg-primary';
            break;
        case 'white':
            $addStyle = 'text-black bg-white hover:text-gray-200 hover:bg-gray-200 active:bg-gray-200 focus:outline-none focus:border-gray-200 focus:ring ring-gray-200';
            break;
        default:
            $addStyle = 'text-white bg-primary';
            break;
    }

@endphp

<a
    {{ $attributes->merge(['href' => $href, 'class' => "inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs tracking-widest {$addStyle}"]) }}>
    {{ $slot }}
</a>
