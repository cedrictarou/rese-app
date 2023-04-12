@push('scripts')
    {{-- <script src="{{ asset('js/shop-admin/show.js') }}" defer></script> --}}
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    <main class="mx-auto container pb-10 px-5">

        {{-- エラーメッセージ --}}
        @if ($errors->any())
            <x-error-message :errors="$errors" class="mb-10" />
        @endif

        <div class="w-3/4 mx-auto">

            <div class="mb-5">
                <x-common.back-button :href="route('admin.index')" title="{{ $user['name'] . '編集ページ' }}">
                    <form action="{{ route('admin.destroy', $user['id']) }}" method="POST"
                        onsubmit="return confirm('本当に削除しますか？')" class="ml-auto">
                        @csrf
                        @method('DELETE')
                        <x-button color="red"><i class="fa-solid fa-trash"></i></x-button>
                    </form>
                </x-common.back-button>
            </div>

            <x-admin.user-form :user="$user" :action="route('admin.update', $user['id'])" method="PUT" />

        </div>
    </main>

</x-app-layout>
