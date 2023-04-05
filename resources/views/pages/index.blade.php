@push('scripts')
    <script src="{{ asset('js/index.js') }}" defer></script>
@endpush

<x-app-layout>

    {{-- header part --}}
    <x-header :regions="$regions" :genres="$genres" />

    {{-- shop一覧ページ --}}
    <main class="mx-auto container pb-10 px-5">

        <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-x-2 gap-y-4">
            @if ($shops->isEmpty())
                <div class="col-span-4">
                    <p class="text-center text-2xl">お店が見つかりませんでした</p>
                </div>
            @endif
            @foreach ($shops as $shop)
                {{-- shop card --}}
                <x-shop-card :shop="$shop" shopName rating footer />
            @endforeach
        </div>

        {{-- pagination --}}
        <div class="mt-5">
            {{ $shops->links() }}
        </div>

    </main>

</x-app-layout>
