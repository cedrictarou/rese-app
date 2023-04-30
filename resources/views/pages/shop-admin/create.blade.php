@push('scripts')
    <script src="{{ asset('js/shop-admin/create.js') }}" defer></script>
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    <main class="mx-auto container pb-10 px-5">
        {{-- エラーメッセージ --}}
        @if ($errors->any())
            <x-error-message :errors="$errors" class="mb-10" />
        @endif

        <section class="w-3/4 mx-auto">
            <div class="flex justify-between">
                {{-- <x-common.back-button :href="route('shop-admin.index')" title="登録ページ" /> --}}
                @php
                    $user = Auth::user();
                    $href = $user->role_id === 3 ? route('admin.show') : route('shop-admin.index');
                @endphp
                <x-common.back-button :href="$href" title="登録ページ" />
            </div>
            <div class="mt-5">
                <x-shop-admin.shop-form :action="route('shop-admin.store')" method="POST" :genres="$genres" :regions="$regions" />

            </div>
        </section>
    </main>

</x-app-layout>
