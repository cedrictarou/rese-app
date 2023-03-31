<x-guest-layout>
    <x-auth-card>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Title -->
            <x-slot name="title">
                <h1>Registration</h1>
            </x-slot>

            <!-- Name -->
            <div class="flex items-center">
                <span class="mr-4"><i class="fa-solid fa-user fa-lg"></i></span>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    placeholder="User Name" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4 flex items-center">
                <span class="mr-4"><i class="fa-solid fa-envelope fa-lg"></i></span>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    placeholder="Email" required />
            </div>

            <!-- Password -->
            <div class="mt-4 flex items-center">
                <span class="mr-4"><i class="fa-solid fa-lock fa-lg"></i></span>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password"
                    required autocomplete="new-password" />
            </div>

            <div class="mt-4 flex items-center">
                <span class="mr-4"><i class="fa-regular fa-id-card"></i></span>
                <x-select name="role_id" class="block mt-1 w-full" required>
                    <option value=1 selected>通常</option>
                    <option value=2>店舗管理者</option>
                    <option value=3>管理者</option>
                </x-select>
            </div>

            <div class="flex items-center justify-end mt-4 gap-3">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    登録済みですか
                </a>

                <x-button>
                    登録
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
