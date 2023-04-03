@push('scripts')
    <script src="{{ asset('js/preview-image.js') }}" defer></script>
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    <main class="mx-auto container pb-10 px-5">

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
                                <td class="w-3/4">{{ $shop['id'] }}</td>
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
                                    <x-select required name="genre_id">
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre['id'] }}">{{ $genre['genre'] }}</option>
                                        @endforeach
                                    </x-select>
                                </td>
                            </tr>
                            <th class="text-start">地域</th>
                            <td>
                                <x-select required name="region_id">
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
                                    {{-- <x-input class="md:bg-transparent" type="text" name="image"
                                        value="{{ $shop['image'] }}" required /> --}}

                                    <div class="mb-2">
                                        <img id="image-before" src="{{ asset($shop['image']) }}">
                                        <img id="image-after" class="hidden" src="" alt="Image Preview">
                                    </div>
                                    <div class="flex justify-end">
                                        <input type="file" id="image-input" name="image">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-between mt-2">
                        <x-link class="text-base" href="{{ route('shop-admin.show', $shop['id']) }}">戻る</x-link>
                        <x-button>更新する</x-button>
                    </div>
                </form>
            </div>
        </section>
    </main>

</x-app-layout>
