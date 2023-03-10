<x-guest-layout>
    <x-confirm-card>
        {{-- text --}}
        <x-slot name="text">
            <h1 class="text-center font-bold text-lg"> ご予約ありがとうございました。 </h1>
        </x-slot>

        {{-- button --}}
        <form method="GET" action="/">
            <x-button> 戻る </x-button>
        </form>
    </x-confirm-card>
</x-guest-layout>
