@push('scripts')
    <script src="{{ asset('js/shop-admin/create.js') }}" defer></script>
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    <main class="mx-auto container pb-10 px-5">

        <section class="w-3/4 mx-auto">
            <div class="flex justify-between">
                <x-title2 title="登録ページ" />
            </div>
            <div class="mt-5">
                <form action="{{ route('shop-admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <th class="text-start w-1/4">店舗名</th>
                                <td class="text-start w-3/4">
                                    <x-input class="md:bg-transparent" type="text" value="{{ old('name') }}"
                                        name="name" required placeholder="お店の名前を入力してください" />
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">ジャンル</th>
                                <td>
                                    <x-select required name="genre_id" class="w-full bg-transparent">
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre['id'] }}">{{ $genre['genre'] }}</option>
                                        @endforeach
                                    </x-select>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">地域</th>
                                <td>
                                    <x-select required name="region_id" class="w-full bg-transparent">
                                        @foreach ($regions as $region)
                                            <option value="{{ $region['id'] }}">{{ $region['region'] }}</option>
                                        @endforeach
                                    </x-select>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">説明</th>
                                <td>
                                    <x-textarea name="description" placeholder="お店の詳しい説明を255字以内で入力してください" required>
                                        {{ old('description') }}
                                    </x-textarea>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">画像</th>
                                <td>
                                    <div class="mb-2">
                                        <div class="object-cover">
                                            <img id="image-before" src="{{ old('image') }}">
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
                        <x-link class="text-base" color="red" href="{{ route('shop-admin.index') }}">キャンセル</x-link>
                        <x-button>登録する</x-button>
                    </div>
                </form>
            </div>
        </section>
    </main>

</x-app-layout>
