@push('scripts')
    <script src="{{ asset('js/like-shop.js') }}" defer></script>
@endpush

<x-app-layout>

    {{-- shop一覧ページ --}}
    <section>

        <div class="grid grid-cols-4 gap-x-2 gap-y-4">

            @foreach ($shops as $shop)
                {{-- shop card --}}
                <x-shop-card>
                    {{-- card-header --}}
                    <x-slot name="cardHeader">
                        <img class="h-40 rounded w-full object-cover object-center" src="{{ $shop['image'] }}"
                            alt="content">
                    </x-slot>

                    {{-- card-body --}}
                    <div class="p-5">
                        <h2 class="text-lg text-gray-900 font-medium title-font">{{ $shop['name'] }}</h2>
                        <div class="text-sm text-gray-500 mb-5 flex gap-2">
                            <span>#{{ $shop->region['region'] }}</span>
                            <span>#{{ $shop->genre['genre'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <x-link href="/detail/{{ $shop['id'] }}">詳しくみる</x-link>
                            {{-- ユーザーがログインしているときだけいいねボタンを押せる --}}
                            @if (Auth::check())
                                <button type="button" class="btn btn-primary like-btn"
                                    data-shop-id="{{ $shop['id'] }}" data-is-liked="{{ $shop['is_liked'] }}">
                                    <i
                                        class="fa-solid fa-heart {{ $shop['is_liked'] ? 'text-accent' : 'text-secondary-light' }} fa-lg"></i>
                                </button>
                            @else
                                <button type="button" class="btn btn-primary like-btn">
                                    <i class="fa-solid fa-heart text-secondary-light fa-lg"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </x-shop-card>
            @endforeach
        </div>

    </section>

</x-app-layout>
