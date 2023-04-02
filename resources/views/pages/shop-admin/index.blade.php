@push('scripts')
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    <main class="mx-auto container pb-10 px-5">
        <x-title2 title="店舗管理者ページ" />
        <div>
            <x-link href="{{ route('shop-admin.create') }}">
                店舗を追加する
            </x-link>
        </div>
        <div>
            <div>{{ Auth::id() }}</div>
            <div>{{ Auth::user()->name }}</div>
            <div>{{ Auth::user()->email }}</div>
        </div>
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-start">ID</th>
                    <th class="text-start">店舗名</th>
                    <th class="text-start">説明</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shops as $shop)
                    <tr>
                        <td>{{ $shop['id'] }}</td>
                        <td>
                            <a href="{{ route('shop-admin.show', $shop['id']) }}">
                                {{ $shop['name'] }}
                            </a>
                        </td>
                        <td>{{ $shop['description'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

</x-app-layout>
