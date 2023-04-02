@push('scripts')
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    {{-- shop詳細ページ --}}
    <main class="mx-auto container pb-10 px-5">
        <h1>アプリ管理者ページ</h1>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>店舗名</td>
                        <td>店舗ID</td>
                        <td>店舗管理者</td>
                        <td>店舗管理者ID</td>
                        <td>店舗管理者メールアドレス</td>
                        <td>店舗管理者電話番号</td>
                        <td>店舗管理者パスワード</td>
                        <td>店舗管理者権限</td>
                        <td>店舗管理者登録日</td>
                        <td>店舗管理者更新日</td>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($shops as $shop)
                        <tr>
                            <td>{{ $shop->name }}</td>
                            <td>{{ $shop->id }}</td>
                            <td>{{ $shop->user->name }}</td>
                            <td>{{ $shop->user->id }}</td>
                            <td>{{ $shop->user->email }}</td>
                            <td>{{ $shop->user->phone_number }}</td>
                            <td>{{ $shop->user->password }}</td>
                            <td>{{ $shop->user->role_id }}</td>
                            <td>{{ $shop->user->created_at }}</td>
                            <td>{{ $shop->user->updated_at }}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </main>

</x-app-layout>
