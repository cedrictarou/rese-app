@push('scripts')
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    <main class="mx-auto container pb-10 px-5">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="col-span-1 md:col-span-3 md:col-start-2">
                @if (Auth::check())
                    <x-title2 title="{{ Auth::user()->name . 'さんのページ' }}" />
                @endif
            </div>

            <div class="col-span-1">
                <x-common.user-info :user="$user" />
            </div>

            <div class="col-span-1 md:col-span-2">
                <div class="flex justify-between mb-4">
                    <x-title3 title="登録している店舗一覧" />
                    <x-link href="{{ route('shop-admin.create') }}"><i class="fa-solid fa-plus"></i>
                    </x-link>
                </div>

                {{-- shop card arae 2 col --}}
                <div class=" grid grid-cols-1 md:grid-cols-2 gap-x-2 gap-y-4">
                    @foreach ($user->shops as $shop)
                        <x-shop-card :shop="$shop" shopName footer :href="route('shop-admin.show', $shop['id'])" />
                    @endforeach
                </div>
            </div>
        </div>

    </main>
</x-app-layout>
