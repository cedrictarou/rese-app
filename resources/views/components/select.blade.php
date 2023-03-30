@props(['disabled' => false])

<select {{ $attributes->merge(['class' => 'border-t-0 border-x-0 border-b border-secondary']) }}
    {{ $disabled ? 'disabled' : '' }}>
    {{ $slot }}
</select>
