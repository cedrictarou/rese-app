@push('scripts')
    <script src="{{ asset('js/shop-admin/edit.js') }}" defer></script>
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
                @php
                    $user = Auth::user();
                    $href = $user->role_id === 3 ? route('shop-admin.show', $shop['id']) : route('shop-admin.index');
                @endphp
                <x-common.back-button :href="$href" title="{{ $shop['name'] }}" />
                <form action="{{ route('shop-admin.destroy', $shop['id']) }}" method="POST"
                    onsubmit="return confirm('本当に削除しますか？')">
                    @csrf
                    @method('DELETE')
                    <x-button color="red"><i class="fa-solid fa-trash"></i></x-button>
                </form>
            </div>
            <div class="mt-5">
                <x-shop-admin.shop-form :shop="$shop" :action="route('shop-admin.update', $shop['id'])" method="PUT" :genres="$genres"
                    :regions="$regions" />
            </div>
        </section>
    </main>

</x-app-layout>
