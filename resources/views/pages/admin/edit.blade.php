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

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="col-span-3 md:col-start-1 md:col-end-4">
                <div class="flex gap-2">
                    <x-link href="{{ route('admin.index') }}" color="white" class="shadow hover:opacity-50">
                        <i class="fa-solid fa-chevron-left text-black"></i>
                    </x-link>
                    <x-title2 title="{{ $user['name'] . '編集ページ' }}" />
                </div>
            </div>

            <div class="col-span-3">
                <section class="bg-primary text-white p-5 rounded col-span-1 text-lg sticky top-20 shadow">
                    <form action="{{ route('admin.update', $user['id']) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table class="w-full">
                            <tr>
                                <th class="text-start w-1/4">ID</th>
                                <td class="w-3/4">{{ $user['id'] }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Account</th>
                                <td>
                                    <x-input type="text" value="{{ old('name', $user['name']) }}" name="name"
                                        class="bg-tranparent" />
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Email</th>
                                <td>
                                    <x-input value="{{ old('email', $user['email']) }}" name="email" />
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Password</th>
                                <td>
                                    <x-input type="password" value="{{ old('password') }}" name="password" />
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Confirm Password</th>
                                <td>
                                    <x-input type="password" value="" name="password_confirmation" />
                                </td>
                            </tr>
                        </table>

                </section>
                <div class="flex gap-2 justify-end mt-5">
                    <x-link color="red" href="{{ route('admin.index') }}">戻る</x-link>
                    <x-button>更新</x-button>
                </div>
                </form>
            </div>

        </div>
    </main>

</x-app-layout>
