<x-guest-layout>
    <x-confirm-card>
        {{-- text --}}
        <x-slot name="text">
            <h1 class="text-center font-bold text-lg"> ご予約ありがとうございます。 </h1>
        </x-slot>
        {{-- button --}}
        <x-link href="{{ route('mypage') }}">戻る</x-link>
    </x-confirm-card>
</x-guest-layout>
