@push('scripts')
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    <main class="mx-auto container pb-10 px-5">

        <section class="w-3/4 mx-auto">
            <div class="flex justify-between">
                <x-title2 title="詳細ページ" />
                <x-link href="{{ route('shop-admin.index') }}">一覧ページへ</x-link>
            </div>
            <div class="mt-5">
                <table class="w-full">
                    <tbody>
                        <tr>
                            <th class="text-start w-1/4">ID</th>
                            <td class="w-3/4">{{ $shop['id'] }}</td>
                        </tr>
                        <tr>
                            <th class="text-start">店舗名</th>
                            <td>
                                {{ $shop['name'] }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-start">説明</th>
                            <td>{{ $shop['description'] }}</td>
                        </tr>
                        <tr>
                            <th class="text-start">イメージURL</th>
                            <td>{{ $shop['image'] }}</td>
                        </tr>
                        <tr>
                            <th class="text-start">管理者</th>
                            <td>{{ $shop->user['name'] }}</td>
                        </tr>
                        <tr>
                            <th class="text-start">メールアドレス</th>
                            <td>{{ $shop->user['email'] }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-end gap-2">
                    <x-link href="{{ route('shop-admin.edit', $shop['id']) }}">編集する</x-link>
                    <form action="{{ route('shop-admin.destroy', $shop['id']) }}" method="POST"
                        onsubmit="return confirm('本当に削除しますか？')">
                        @csrf
                        @method('DELETE')
                        <x-button color="red">削除する</x-button>
                    </form>
                </div>
            </div>
        </section>
    </main>

</x-app-layout>
