@props(['type' => 'text', 'disabled' => false])

<input type={{ $type }}
    {{ $attributes->merge([
        'class' => 'border-t-0 border-x-0 border-b border-secondary',
    ]) }}
    {{ $disabled ? 'disabled' : '' }}>
