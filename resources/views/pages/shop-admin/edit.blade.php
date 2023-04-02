@push('scripts')
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    <main class="mx-auto container pb-10 px-5">

        <section class="w-3/4 mx-auto">
            <div class="flex justify-between">
                <x-title2 title="編集ページ" />
            </div>
            <div class="mt-5">
                <form action="{{ route('shop-admin.update', $shop['id']) }}">
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <th class="text-start w-1/4">ID</th>
                                <td class="w-3/4">{{ $shop['id'] }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">店舗名</th>
                                <td>
                                    <x-input class="md:bg-transparent" type="text" value="{{ $shop['name'] }}"
                                        name="name" required />
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">説明</th>
                                <td>
                                    <x-textarea name="description" required>{{ $shop['description'] }}</x-textarea>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">イメージURL</th>
                                <td>
                                    <x-input class="md:bg-transparent" type="text" name="image"
                                        value="{{ $shop['image'] }}" required />
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">管理者</th>
                                <td>
                                    <x-input class="md:bg-transparent" type="text" name="shop-admin-name"
                                        value="{{ $shop->user['name'] }}" required />
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">メールアドレス</th>
                                <td>
                                    <x-input class="md:bg-transparent" type="email" name="email"
                                        value="{{ $shop->user['email'] }}" required />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-end gap-2 mt-2">
                        <x-button>更新する</x-button>
                        <x-link class="text-base" href="{{ route('shop-admin.show', $shop['id']) }}">戻る</x-link>
                    </div>
                </form>
            </div>
        </section>
    </main>

</x-app-layout>
