@props(['href', 'title'])

<div class="flex gap-2">

    <x-link href="{{ $href }}" color="white" class="shadow hover:opacity-50">
        <i class="fa-solid fa-chevron-left text-black"></i>
    </x-link>
    <x-title2 title="{{ $title }}" />

    {{ $slot }}
</div>
