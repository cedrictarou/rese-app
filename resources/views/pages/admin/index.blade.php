@push('scripts')
@endpush

<x-app-layout>

    {{-- header part --}}
    <x-header />

    {{-- shop一覧ページ --}}
    <main class="mx-auto container pb-10 px-5">
        <section class="w-3/4 mx-auto">
            <div class="flex justify-between mb-5">
                <x-title2 title="店舗管理者一覧" />
                <x-link href="{{ route('admin.create') }}"><i class="fa-solid fa-plus"></i></x-link>
            </div>
            <table class="w-full">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Created</td>
                        <td>Updated</td>
                        <td class="text-center">Detail</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['created_at'] }}</td>
                            <td>{{ $user['updated_at'] }}</td>
                            <td class="text-end">
                                <x-link href="{{ route('admin.show', $user['id']) }}">詳細</x-link>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <div>
            {{ $users->links() }}
        </div>

    </main>

</x-app-layout>
