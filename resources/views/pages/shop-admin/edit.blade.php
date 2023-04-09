@push('scripts')
    <script src="{{ asset('js/shop-admin/edit.js') }}" defer></script>
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    <main class="mx-auto container pb-10 px-5">
        {{-- エラーメッセージ --}}
        @if ($errors->any())
            <x-error-message :errors="$errors" class="mb-10" />
        @endif

        <section class="w-3/4 mx-auto">
            <div class="flex justify-between">
                <x-title2 title="編集ページ" />
            </div>
            <div class="mt-5">
                <form action="{{ route('shop-admin.update', $shop['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <th class="text-start w-1/4">ID</th>
                                <td class="w-3/4">
                                    <span class="ml-3">
                                        {{ $shop['id'] }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">店舗名</th>
                                <td>
                                    <x-input class="md:bg-transparent" type="text" value="{{ $shop['name'] }}"
                                        name="name" required />
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
                            <th class="text-start">地域</th>
                            <td>
                                <x-select required name="region_id" class="w-full bg-transparent">
                                    @foreach ($regions as $region)
                                        <option value="{{ $region['id'] }}">{{ $region['region'] }}</option>
                                    @endforeach
                                </x-select>
                            </td>
                            <tr>
                                <th class="text-start">説明</th>
                                <td>
                                    <x-textarea name="description" required>{{ $shop['description'] }}</x-textarea>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start align-top">画像</th>
                                <td>
                                    <div class="mb-2">
                                        <div class="object-cover">
                                            <img id="image-before" src="{{ asset($shop['image']) }}">
                                        </div>

                                        <img id="image-after" class="hidden" src="" alt="Image Preview">
                                    </div>
                                    <div class="flex flex-end">
                                        <x-input class="w-full" type="file" id="image-input" name="image"
                                            accept=".jpeg,.jpg,.png" required />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-between mt-5">
                        <x-link color="red" class="text-base" href="{{ route('shop-admin.show', $shop['id']) }}">
                            キャンセル</x-link>
                        <x-button>更新する</x-button>
                    </div>

                </form>
            </div>
        </section>
    </main>

</x-app-layout>
