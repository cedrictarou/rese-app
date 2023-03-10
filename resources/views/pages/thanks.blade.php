<x-guest-layout>
    <x-confirm-card>
        {{-- text --}}
        <x-slot name="text">
            <h1 class="text-center font-bold text-lg"> 会員登録ありがとうございました。 </h1>
        </x-slot>

        {{-- button --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <x-button> ログインする </x-button>
        </form>
    </x-confirm-card>
</x-guest-layout>
