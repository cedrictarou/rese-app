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

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="col-span-3 md:col-start-1 md:col-end-4">
                <div class="flex gap-2">
                    <x-link href="{{ route('admin.index') }}" color="white" class="shadow hover:opacity-50">
                        <i class="fa-solid fa-chevron-left text-black"></i>
                    </x-link>
                    <x-title2 title="新規店舗管理者作成ページ" />
                </div>
            </div>

            <div class="col-span-3">
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="bg-primary text-white p-5 rounded col-span-1 text-lg sticky top-20 shadow">
                        <table class="w-full">

                            <tr>
                                <th class="text-start">Account</th>
                                <td>
                                    <x-input type="text" value="{{ old('name') }}" name="name"
                                        placeholder="アカウント名を入力してください" class="bg-tranparent" required />
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Email</th>
                                <td>
                                    <x-input value="{{ old('email') }}" name="email"
                                        placeholder="Emailアドレスを入力してください。" required />
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Password</th>
                                <td>
                                    <x-input type="password" value="{{ old('password') }}" name="password"
                                        placeholder="パスワードを入力してください。" required />
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Confirm Password</th>
                                <td>
                                    <x-input type="password" value="" name="password_confirmation"
                                        placeholder="上と同じパスワードを入力してください。" required />
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="flex gap-2 justify-end mt-5">
                        <x-link color="red" href="{{ route('admin.index') }}">戻る</x-link>
                        <x-button>作成</x-button>
                    </div>
                </form>
            </div>

        </div>
    </main>

</x-app-layout>
