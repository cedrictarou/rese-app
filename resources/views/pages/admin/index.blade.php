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
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th class="text-start table-cell">ID</th>
                            <th class="text-start table-cell">Name</th>
                            <th class="text-start table-cell">Email</th>
                            <th class="hidden sm:table-cell sm:text-start">Created</th>
                            <th class="hidden sm:table-cell sm:text-start">Updated</th>
                            <th class="text-start">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="table-cell">{{ $user['id'] }}</td>
                                <td class="table-cell">{{ $user['name'] }}</td>
                                <td class="table-cell">{{ $user['email'] }}</td>
                                <td class="hidden sm:table-cell">{{ $user['created_at'] }}</td>
                                <td class="hidden sm:table-cell">{{ $user['updated_at'] }}</td>
                                <td class="text-start">
                                    <x-link href="{{ route('admin.show', $user['id']) }}">詳細</x-link>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </section>
        <div>
            {{ $users->links() }}
        </div>

    </main>

</x-app-layout>
