@props(['user' => null, 'action', 'method'])


<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method == 'PUT')
        @method('PUT')
    @endif

    <div class="bg-primary text-white p-10 rounded text-lg shadow">
        <table class="w-full">
            @if ($user)
                <tr>
                    <th class="text-start w-1/4">ID</th>
                    <td class="w-3/4"><span class="ml-2">{{ $user['id'] }}</span></td>
                </tr>
            @endif
            <tr>
                <th class="text-start w-1/4">Account</th>
                <td class="w-3/4">
                    @if ($user)
                        <x-input color="blue" type="text" value="{{ old('name', $user['name']) }}" name="name" />
                    @else
                        <x-input color="blue" type="text" value="{{ old('name') }}" name="name"
                            placeholder="IDを入力してください" />
                    @endif
                </td>
            </tr>
            <tr>
                <th class="text-start">Email</th>
                <td>
                    @if ($user)
                        <x-input color="blue" value="{{ old('email', $user['email']) }}" name="email" />
                    @else
                        <x-input color="blue" value="{{ old('email') }}" name="email"
                            placeholder="Emailを入力してください" />
                    @endif
                </td>
            </tr>
            <tr>
                <th class="text-start">Password</th>
                <td>
                    <x-input color="blue" type="password" value="{{ old('password') }}"
                        placeholder="{{ $user ? 'パスワードを変更する場合は入力してください' : 'パスワードを入力してください' }}" name="password" />
                </td>
            </tr>
            <tr>
                <th class="text-start">Confirm Password</th>
                <td>
                    <x-input color="blue" type="password"
                        placeholder="{{ $user ? 'パスワードを変更する場合は入力してください' : '再度パスワードを入力してください' }}"
                        name="password_confirmation" />
                </td>
            </tr>
        </table>

    </div>
    <div class="flex gap-2 justify-end mt-5">
        <x-link color="red" href="{{ route('admin.index') }}">戻る</x-link>
        <x-button>
            @if ($method === 'PUT')
                更新
            @else
                作成
            @endif
        </x-button>
    </div>
</form>
