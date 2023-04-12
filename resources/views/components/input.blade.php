@props(['type' => 'text', 'disabled' => false, 'color' => 'white'])

@php
    switch ($color) {
        case 'white':
            $addStyle = 'bg-white border-t-0 border-x-0 border-b border-secondary';
            break;
        case 'blue':
            $addStyle = 'bg-primary text-white focus:bg-white border-t-0 border-x-0 border-b placeholder-white';
            break;
    
        default:
            $addStyle = 'bg-white border-t-0 border-x-0 border-b border-secondary';
            break;
    }
@endphp
<input type={{ $type }} {{ $attributes->merge([
    'class' => "text-lg  {$addStyle}",
]) }}
    {{ $disabled ? 'disabled' : '' }}>
