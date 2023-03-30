@props(['disabled' => false])

<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center md:px-5 px-2 md:py-2 py-2 bg-primary border border-transparent rounded-md font-semibold md:text-base text-white text-xs']) }}
    {{ $disabled ? 'disabled' : '' }}>
    {{ $slot }}
</button>
