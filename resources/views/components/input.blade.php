@props(['type' => 'text'])

<input type={{ $type }}
    {{ $attributes->merge([
        'class' => 'border-t-0 border-x-0 border-b border-secondary text-secondary-dark',
    ]) }}>
