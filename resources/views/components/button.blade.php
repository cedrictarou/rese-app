@props(['disabled' => false, 'color' => 'primary'])

@php
    switch ($color) {
        case 'red':
            $addStyle = 'bg-accent text-white';
            break;
        case 'primary':
            $addStyle = 'bg-primary text-white';
            break;
        default:
            $addStyle = 'bg-primary text-white';
            break;
    }
@endphp
<button
    {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex items-center md:px-5 px-2 md:py-2 py-2  border border-transparent rounded-md font-semibold md:text-base text-xs {$addStyle}"]) }}
    {{ $disabled ? 'disabled' : '' }}>
    {{ $slot }}
</button>
