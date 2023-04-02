@props(['href', 'color' => 'blue'])

@php
    switch ($color) {
        case 'blue':
            $addStyle = 'text-white bg-primary';
            break;
        case 'white':
            $addStyle = 'text-black bg-white';
            break;
        default:
            $addStyle = 'text-white bg-primary';
            break;
    }

@endphp

<a
    {{ $attributes->merge(['href' => $href, 'class' => "inline-flex items-center md:px-4 px-2 py-2 border border-transparent rounded-md font-semibold md:text-base text-xs {$addStyle}"]) }}>
    {{ $slot }}
</a>
