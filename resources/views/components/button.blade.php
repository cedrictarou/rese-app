<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center md:px-4 px-2 md:py-2 py-2 bg-primary border border-transparent rounded-md md:font-semibold md:text-sm text-white text-xs']) }}>
    {{ $slot }}
</button>
