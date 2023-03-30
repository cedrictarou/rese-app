<x-guest-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Title -->
            <x-slot name="title">
                <h1>Login</h1>
            </x-slot>

            <!-- Email Address -->
            <div class="flex items-center">
                <span class="mr-4"><i class="fa-solid fa-envelope fa-lg"></i></span>
                <x-input id="email" class="mt-1" type="email" name="email"
                    value="{{ old('email') ?: session('email') }}" placeholder="Email" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4 flex items-center">
                <span class="mr-4"><i class="fa-solid fa-lock fa-lg"></i></span>
                <x-input id="password" class="mt-1" type="password" name="password" placeholder="Password" required
                    @csrf autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4 gap-3">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    まだ登録していませんか
                </a>
                <x-button>
                    ログイン
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
