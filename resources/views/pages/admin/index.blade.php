@push('scripts')
@endpush

<x-app-layout>

    {{-- header part --}}
    <x-header />

    {{-- shop一覧ページ --}}
    <main class="mx-auto container pb-10 px-5">
        <section class="w-3/4 mx-auto">
            <div class="flex justify-between">
                <x-title2 title="admin page" />
                <div>search box</div>

            </div>
            <table class="w-full">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Created</td>
                        <td>Updated</td>
                        <td>Detail</td>
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
                            <td>
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
