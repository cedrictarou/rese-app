@push('scripts')
    {{-- <script src="{{ asset('js/shop-admin/show.js') }}" defer></script> --}}
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    <main class="mx-auto container pb-10 px-5">

        {{-- error message --}}
        @if ($errors->any())
            <x-error-message :errors="$errors" class="mb-10" />
        @endif

        <div class="w-3/4 mx-auto">

            <div class="mb-5">
                <x-common.back-button :href="route('admin.index')" title="店舗管理者新規登録ページ" />
            </div>

            <x-admin.user-form :action="route('admin.store')" method="POST" />
        </div>
    </main>

</x-app-layout>
