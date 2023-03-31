@props(['shop'])

<div {{ $attributes->merge([
    'class' => 'flex gap-2 flex-wrap mb-5',
]) }}>
    <div class="flex">
        <x-link href="{{ url()->previous() }}" color="white" class="shadow hover:opacity-50">
            <i class="fa-solid fa-chevron-left text-black"></i>
        </x-link>
        <x-title2 title="{{ $shop['name'] }}" class="ml-4" />
        <div class="ml-2 flex gap-2 self-end text-secondary-dark ">
            <span>#{{ $shop->region['region'] }}</span>
            <span>#{{ $shop->genre['genre'] }}</span>
        </div>
    </div>
    <a href="#comments-box" class="ml-auto self-end">
        <x-star-rating :reviews="$shop->reviews" />
    </a>
</div>