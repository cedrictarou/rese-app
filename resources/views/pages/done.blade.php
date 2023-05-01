<x-guest-layout>
    <x-confirm-card>
        {{-- text --}}
        <x-slot name="text">
            <h1 class="text-center font-bold text-lg"> ご予約ありがとうございます。 </h1>
        </x-slot>
        {{-- button --}}
        @php
            $user = Auth::user();
            switch ($user->role_id) {
                case 1:
                    $href = route('mypage');
                    break;
                case 2:
                    $href = route('shop-admin.index', $user['id']);
                    break;
                case 3:
                    $href = route('admin.index');
                    break;
                default:
                    $href = route('index');
                    break;
            }
        @endphp
        <x-link href="{{ $href }}">戻る</x-link>
    </x-confirm-card>
</x-guest-layout>
