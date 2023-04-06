@push('scripts')
    <script src="{{ asset('js/mypage.js') }}" defer></script>
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    <main class="mx-auto container pb-10 px-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            {{-- shop info --}}
            <div class="col-span-1 order-1">
                <x-detail-top :shop="$shop" backUrl="shopAdminPage" />
                {{-- shop card --}}
                <x-shop-card :shop="$shop" color="gray" description bigImage />

                <div class="flex justify-end">
                    <x-link href="{{ route('shop-admin.edit', $shop['id']) }}">編集する</x-link>
                </div>

                {{-- comments area --}}
                <x-comment :reviews="$shop->reviews">
                    <div class="flex flex-wrap my-5 gap-2 items-center">
                        <x-title3 title="お店のレビュー" />
                    </div>
                </x-comment>
            </div>

            {{-- reserve card --}}
            <div class="col-span-1 order-2">

                <div class="flex justify-between items-center">
                    <x-title2 title="予約状況" class="mb-4" />
                    <span>計{{ count($shop->reserves->where('status', 0)) }}件</span>
                </div>
                @if ($shop->reserves->count() === 0)
                    <p>現在予約はありません。</p>
                @endif
                @foreach ($shop->reserves as $reserve)
                    {{-- reserve card --}}
                    @if ($reserve['date_time'] >= date('Y-m-d'))
                        <x-reserved-card :reserve="$reserve" isAdmin />
                    @endif
                @endforeach
            </div>

        </div>
    </main>

</x-app-layout>
