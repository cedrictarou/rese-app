@push('scripts')
    {{-- <script src="{{ asset('js/shop-admin/show.js') }}" defer></script> --}}
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    <main class="mx-auto container pb-10 px-5">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="col-span-3 md:col-start-1 md:col-end-4">
                <x-common.back-button :href="route('admin.index')" :title="$user['name']" />

            </div>

            <div class="col-span-1">
                <x-common.user-info :user="$user" />
            </div>

            <div class="col-span-1 md:col-span-2">
                <div class="flex justify-between mb-4">
                    <x-title3 title="登録している店舗一覧" />
                </div>

                {{-- shop card arae 2 col --}}
                <div class=" grid grid-cols-1 md:grid-cols-2 gap-x-2 gap-y-4">

                    @if ($user->shops->count() === 0)
                        <p>登録されている店舗情報はありません</p>
                    @endif
                    @foreach ($user->shops as $shop)
                        <article class="rounded-lg border-solid bg-white shadow-lg">
                            {{-- card-header --}}
                            <div class="relative">
                                <img class="rounded w-full object-cover object-center md:h-40 h-50 aspect-auto rounded-b-none"
                                    src="{{ asset($shop['image']) }}" alt="content">
                                <div class="absolute right-2 bottom-1 bg-slate-200 opacity-70 px-3 rounded">

                                </div>
                            </div>

                            {{-- card-body --}}
                            <div class="p-5">
                                <h2 class="text-lg text-secondary-dark font-semibold">{{ $shop['name'] }}</h2>

                                <div class="text-sm text-secondary-dark mb-2 flex gap-2">
                                    <span>#{{ $shop->region['region'] }}</span>
                                    <span>#{{ $shop->genre['genre'] }}</span>
                                </div>

                                {{-- footer --}}
                                <div class="flex justify-between">
                                    <x-link class="md:text-xs" href="{{ route('shop-admin.show', $shop['id']) }}">詳細ページ
                                    </x-link>
                                    <form action="{{ route('shop-admin.destroy', $shop['id']) }}" method="POST"
                                        onsubmit="return confirm('本当に削除しますか？')">
                                        @csrf
                                        @method('DELETE')
                                        <x-button color="red"><i class="fa-solid fa-trash"></i></x-button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

</x-app-layout>
