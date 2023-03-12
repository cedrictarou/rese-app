@props(['color' => 'white'])

@php
    switch ($color) {
        case 'white':
            $addStyle = 'bg-white shadow-lg';
            break;
        case 'gray':
            $addStyle = 'bg-secondary-light';
            break;
        default:
            $addStyle = $addStyle = 'bg-white';
            break;
    }
@endphp

<div {{ $attributes->merge(['class' => "rounded-lg  border-solid {$addStyle}"]) }}>
    {{ $cardHeader }}

    {{ $slot }}
</div>
