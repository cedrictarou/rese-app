@props(['type' => 'text', 'disabled' => false])

<textarea rows="5"
    {{ $attributes->merge([
        'class' => 'border-t-0 border-x-0 border-b border-secondary bg-transparent',
    ]) }}
    {{ $disabled ? 'disabled' : '' }}>
    {{ $slot }}
</textarea>
