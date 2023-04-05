@props([
    'color' => 'white',
    'shop',
    'shopName' => false,
    'description' => false,
    'footer' => false,
    'rating' => false,
    'bigImage' => false,
])

@php
    switch ($color) {
        case 'white':
            $addStyle = 'bg-white shadow-lg';
            break;
        case 'gray':
            $addStyle = 'bg-secondary-light';
            break;
        default:
            $addStyle = 'bg-white shadow-lg';
            break;
    }
@endphp

<article {{ $attributes->merge(['class' => "rounded-lg border-solid {$addStyle}"]) }}>
    {{-- card-header --}}
    <div class="relative">
        <img class="rounded w-full object-cover object-center {{ $bigImage ? 'md:h-96' : 'md:h-40' }} h-50 aspect-auto rounded-b-none"
            src="{{ asset($shop['image']) }}" alt="content">
        <div class="absolute right-2 bottom-1 bg-slate-200 opacity-70 px-3 rounded">
            @if ($rating)
                <x-star-rating :reviews="$shop->reviews" />
            @endif
        </div>
    </div>

    {{-- card-body --}}
    <div class="{{ $description ? '' : 'p-5' }}">
        @if ($shopName)
            <h2 class="text-lg text-secondary-dark font-semibold">{{ $shop['name'] }}</h2>

            <div class="text-sm text-secondary-dark mb-2 flex gap-2">
                <span>#{{ $shop->region['region'] }}</span>
                <span>#{{ $shop->genre['genre'] }}</span>
            </div>
        @endif

        @if ($description)
            <div class="flex justify-between my-5">
                <p>{{ $shop['description'] }}
                </p>
            </div>
        @endif

        {{-- footer --}}
        @if ($footer)
            <div class="flex justify-between">
                <x-link class="md:text-xs" href="{{ route('detail', $shop['id']) }}">詳しくみる</x-link>

                {{-- ユーザーがログインしているときだけいいねボタンを押せる --}}
                @if (Auth::check())
                    <button type="button" class="btn btn-primary like-btn" data-shop-id="{{ $shop['id'] }}">
                        <i class="fa-solid fa-heart {{ $shop->isLikedBy() ? 'is-liked' : 'is-not-liked' }} fa-lg"></i>
                    </button>
                @else
                    <button type="button" class="btn btn-primary like-btn">
                        <i class="fa-solid fa-heart is-not-liked fa-lg"></i>
                    </button>
                @endif
            </div>
        @endif

    </div>
</article>
