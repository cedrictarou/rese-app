@push('scripts')
    <script src="{{ asset('js/like-shop.js') }}" defer></script>
    <script src="{{ asset('js/cancel-reserve.js') }}" defer></script>
@endpush

<x-app-layout>

    {{-- my page --}}
    <section>
        <div class="grid grid-cols-3 gap-10">
            {{-- reserve card area --}}
            <div class="col-span-1 ">
                <x-title3 title="予約状況" class="mb-4" />
                @if ($reserves->count() === 0)
                    <p>現在予約はありません。</p>
                @endif
                @foreach ($reserves as $reserve)
                    {{-- reserve card --}}
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
                                    <i class="fa-regular fa-xmark fa-lg"></i>
                                </button>
                            </form>
                        </div>

                        <table class="w-full">
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
                @endforeach

            </div>

            <div class="col-span-2 relative">
                @if (Auth::check())
                    <x-title2 class="absolute -top-14" title="{{ Auth::user()->name . 'さんのページ' }}" />
                @endif

                <x-title3 title="お気に入り店舗" class="mb-4" />
                {{-- shop card arae 2 col --}}
                <div class=" grid grid-cols-2 gap-x-2 gap-y-4">
                    @if ($like_shops->count() === 0)
                        <p>現在お気に入りに登録はありません。</p>
                    @endif
                    @foreach ($like_shops as $like)
                        {{-- shop card --}}
                        <x-shop-card>
                            {{-- card-header --}}
                            <x-slot name="cardHeader">
                                <img class="h-40 rounded w-full object-cover object-center"
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
                                        <i class="fa-solid fa-heart text-accent fa-lg"></i>
                                    </button>
                                </div>
                            </div>
                        </x-shop-card>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

</x-app-layout>
