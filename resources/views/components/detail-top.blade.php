@props(['shop', 'backLink'])

<div {{ $attributes->merge([
    'class' => 'flex gap-2 flex-wrap mb-5',
]) }}>
    <div class="flex">
        @php
            $currentUrl = url()->current();
            $previousUrl = url()->previous();
            $backButtonHref = $currentUrl == $previousUrl ? route('index') : $previousUrl;
        @endphp

        <x-common.back-button :href="$backButtonHref" title="{{ $shop['name'] }}" />


        <div class="ml-2 flex gap-2 self-end text-secondary-dark ">
            <span>#{{ $shop->region['region'] }}</span>
            <span>#{{ $shop->genre['genre'] }}</span>
        </div>
    </div>
    <a href="#comments-box" class="ml-auto self-end">
        <x-star-rating :reviews="$shop->reviews" />
    </a>
</div>
