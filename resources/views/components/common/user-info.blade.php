@props(['user'])

<div class="bg-primary text-white p-5 rounded col-span-1 text-lg sticky top-20 shadow">
    <div class="flex justify-between">
        <x-title3 title="{{ $user['name'] }}" class="mb-4" />
        @if (Auth::user()->role_id == 3)
            <a href="{{ route('admin.edit', $user['id']) }}"><i class="fa-solid fa-user-pen"></i></a>
        @endif
    </div>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <tbody>
                <tr>
                    <th class="text-start">ID</th>
                    <td>{{ $user['id'] }}</td>
                </tr>
                <tr>
                    <th class="text-start">Account</th>
                    <td>{{ $user['name'] }}</td>
                </tr>
                <tr>
                    <th class="text-start">Email</th>
                    <td>{{ $user['email'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
