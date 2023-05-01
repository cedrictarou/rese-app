@props(['action', 'method', 'shop' => null, 'genres', 'regions'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <table class="w-full">
        <tbody>
            <tr>
                <th class="text-start w-1/4">店舗名</th>
                <td class="text-start w-3/4">
                    @if ($shop)
                        <x-input class="md:bg-transparent" type="text" value="{{ old('name', $shop['name']) }}"
                            name="name" required placeholder="お店の名前を入力してください" />
                    @else
                        <x-input class="md:bg-transparent" type="text" value="{{ old('name') }}" name="name"
                            required placeholder="お店の名前を入力してください" />
                    @endif
                </td>
            </tr>
            <tr>
                <th class="text-start">ジャンル</th>
                <td>
                    @if ($shop)
                        <x-select required name="genre_id" class="w-full bg-transparent">
                            @foreach ($genres as $genre)
                                <option value="{{ $genre['id'] }}"
                                    {{ $shop->genre['id'] == $genre['id'] ? 'selected' : '' }}>
                                    {{ $genre['genre'] }}
                                </option>
                            @endforeach
                        </x-select>
                    @else
                        <x-select required name="genre_id" class="w-full bg-transparent">
                            @foreach ($genres as $genre)
                                <option value="{{ $genre['id'] }}">
                                    {{ $genre['genre'] }}
                                </option>
                            @endforeach
                        </x-select>
                    @endif
                </td>
            </tr>
            <tr>
                <th class="text-start">地域</th>
                <td>
                    <x-select required name="region_id" class="w-full bg-transparent">
                        @foreach ($regions as $region)
                            @if ($shop)
                                <option value="{{ $region['id'] }}"
                                    {{ $shop->region['id'] == $region['id'] ? 'selected' : '' }}>
                                    {{ $region['region'] }}
                                </option>
                            @else
                                <option value="{{ $region['id'] }}">
                                    {{ $region['region'] }}
                                </option>
                            @endif
                        @endforeach
                    </x-select>
                </td>
            </tr>
            <tr>
                <th class="text-start">説明</th>
                <td>
                    @if ($shop)
                        <x-textarea name="description" placeholder="お店の詳しい説明を255字以内で入力してください" required>
                            {{ old('description', $shop['description']) }}
                        </x-textarea>
                    @else
                        <x-textarea name="description" placeholder="お店の詳しい説明を255字以内で入力してください" required>
                            {{ old('description') }}
                        </x-textarea>
                    @endif
                </td>
            </tr>
            <tr>
                <th class="text-start">画像</th>
                <td>
                    <div class="mb-2">
                        <div class="object-cover">
                            @if ($shop)
                                <img id="image-before" src="{{ old('image', asset($shop['image'])) }}">
                            @else
                                <img id="image-before" src="{{ old('image') }}">
                            @endif
                        </div>

                        <img id="image-after" class="hidden" src="" alt="Image Preview">
                    </div>
                    <div class="flex flex-end">
                        <x-input class="w-full" type="file" id="image-input" name="image"
                            accept=".jpeg,.jpg,.png" />
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="flex justify-between mt-5">
        @if ($shop)
            <x-link class="text-base" color="red" href="{{ route('shop-admin.show', $shop['id']) }}">キャンセル
            </x-link>
        @else
            <x-link class="text-base" color="red" href="{{ route('shop-admin.index') }}">キャンセル
            </x-link>
        @endif
        <x-button>
            @if ($shop)
                更新する
            @else
                登録する
            @endif
        </x-button>
    </div>
</form>
