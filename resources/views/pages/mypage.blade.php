@push('scripts')
    <script src="{{ asset('js/like-shop.js') }}" defer></script>
    <script src="{{ asset('js/cancel-reserve.js') }}" defer></script>
@endpush

<x-app-layout>
    {{-- header part --}}
    <div class="h-16 my-10">
        <x-header />
    </div>

    {{-- my page --}}
    <main>
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
                        <div class="bg-primary text-white shadow p-5 rounded mb-3">
                            <div class="flex justify-between mb-5">
                                <x-title4>
                                    <span class="mr-2">
                                        <i class="fa-regular fa-clock"></i>

                                    </span>
                                    予約{{ $loop->index + 1 }}
                                </x-title4>
                                <form action="{{ route('cancel', $reserve['id']) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="cancel-btn" type="submit">
                                        <i class="fa-solid fa-xmark text-white"></i>
                                    </button>
                                </form>
                            </div>

                            <table class="w-full h-full">
                                <tr>
                                    <th class="text-start w-1/3">Shop</th>
                                    <td class="text-start w-2/3">{{ $reserve->shop['name'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Date</th>
                                    <td class="text-start">{{ $reserve->getDate() }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Time</th>
                                    <td class="text-start">{{ $reserve->getTime() }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Number</th>
                                    <td class="text-start">{{ $reserve['num_of_people'] . '人' }}</td>
                                </tr>
                            </table>
                        </div>
                    </a>
                @endforeach

            </div>

            <div class="col-span-1 md:col-span-2">
                <x-title3 title="お気に入り店舗" class="mb-4" />
                {{-- shop card arae 2 col --}}
                <div class=" grid grid-cols-1 md:grid-cols-2 gap-x-2 gap-y-4">
                    @if ($like_shops->count() === 0)
                        <p>現在お気に入りに登録はありません。</p>
                    @endif
                    @foreach ($like_shops as $like)
                        {{-- shop card --}}
                        <x-shop-card>
                            {{-- card-header --}}
                            <x-slot name="cardHeader">
                                <img class="h-40 rounded w-full object-cover object-center aspect-auto"
                                    src="{{ $like->shop['image'] }}" alt="content">
                            </x-slot>
                            {{-- card-body --}}
                            <div class="p-5">
                                <x-title4 class="text-black">{{ $like->shop['name'] }}</x-title4>
                                <div class="text-sm text-secondary-dark mb-5">
                                    <span>#{{ $like->shop->genre['genre'] }}</span>
                                    <span>#{{ $like->shop->region['region'] }}</span>
                                </div>
                                {{-- card-footer --}}
                                <div class="flex justify-between">
                                    <x-link href="/detail/{{ $like->shop['id'] }}">詳しくみる</x-link>
                                    <button type="button" class="btn btn-primary like-btn"
                                        data-shop-id="{{ $like->shop['id'] }}">
                                        <i class="fa-solid fa-heart is-liked fa-lg"></i>
                                    </button>
                                </div>
                            </div>
                        </x-shop-card>
                    @endforeach
                </div>
            </div>

        </div>
    </main>

</x-app-layout>
