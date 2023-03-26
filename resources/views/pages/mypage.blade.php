@push('scripts')
    <script src="{{ asset('js/like-shop.js') }}" defer></script>
    <script src="{{ asset('js/cancel-reserve.js') }}" defer></script>
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    {{-- my page --}}
    <main class="mx-auto container pb-10 px-5">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="col-span-1 md:col-span-3 md:col-start-2">
                @if (Auth::check())
                    <x-title2 title="{{ Auth::user()->name . 'さんのページ' }}" />
                @endif
            </div>

            {{-- reserve card area --}}
            <div class="col-span-1">
                <x-title3 title="予約状況" class="mb-4" />
                @if ($reserves->count() === 0)
                    <p>現在予約はありません。</p>
                @endif
                @foreach ($reserves as $reserve)
                    {{-- reserve card --}}
                    <a href="/mypage/reserve/{{ $reserve['id'] }}">
                        <x-reserved-card :reserve="$reserve" :loop="$loop" />
                    </a>
                @endforeach

            </div>

            <div class="col-span-1 md:col-span-2">
                <x-title3 title="お気に入り店舗" class="mb-4" />
                {{-- shop card arae 2 col --}}
                <div class=" grid grid-cols-1 md:grid-cols-2 gap-x-2 gap-y-4">
                    @if ($like_shops->count() === 0)
                        <p class="text-secondary-dark">現在お気に入りに登録はありません。</p>
                    @endif
                    @foreach ($like_shops as $like)
                        {{-- shop card --}}
                        <x-shop-card :shop="$like->shop" footer shopName rating />
                    @endforeach
                </div>
            </div>

        </div>
    </main>

</x-app-layout>
