{{-- デスクトップ用のレイアウト --}}
<div class="hidden md:block">
    <form action="{{ route('index') }}" method="GET"
        class="flex bg-white rounded-lg py-2 px-2 shadow items-center gap-2">

        <div class="border-r-2 border-r-gray-100">
            <x-select class="mx-2" type="select" id="area" name="region">
                <option value=0>All area</option>
                @foreach ($regions as $region)
                    <option value="{{ $region['id'] }}"
                        {{ session('search_key.region') == $region['id'] ? 'selected' : '' }}>
                        {{ $region['region'] }}</option>
                @endforeach
            </x-select>
        </div>

        <div class="border-r-2 border-r-gray-100">
            <x-select class="mx-2" type="select" id="genre" name="genre">
                <option value="0">All genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre['id'] }}"
                        {{ session('search_key.genre') == $genre['id'] ? 'selected' : '' }}>
                        {{ $genre['genre'] }}</option>
                @endforeach
            </x-select>
        </div>

        <div class="flex items-center w-full">
            <x-input class="mx-2" type="text" id="search" name="words" placeholder="Search ..."
                value="{{ session('search_key.words') }}" />
            <button type="submit" class="px-2">
                <i class="fa-solid fa-magnifying-glass text-secondary-dark"></i>
            </button>
        </div>

    </form>
</div>


{{--  スマホサイズの時に表示する --}}
<div id="search-btn" class="block md:hidden">
    <button type="submit" class="px-2">
        <i class="fa-solid fa-magnifying-glass text-secondary-dark"></i>
    </button>
</div>

<div id="search-box"
    class="md:hidden translate-x-full transition-all duration-500 ease-in-out inset-0 z-50 fixed bg-secondary-light">
    <div class="p-5">
        <form action="{{ route('index') }}" method="GET"
            class="flex flex-col md:flex-row bg-white rounded-lg py-2 px-2 shadow items-center gap-2">

            <div class="border-r-2 border-r-gray-100 w-full">
                <x-select class="mx-2 w-full" type="select" id="area" name="region">
                    <option value=0>All area</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region['id'] }}"
                            {{ session('search_key.region') == $region['id'] ? 'selected' : '' }}>
                            {{ $region['region'] }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="border-r-2 border-r-gray-100 w-full">
                <x-select class="mx-2 w-full" type="select" id="genre" name="genre">
                    <option value="0">All genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre['id'] }}"
                            {{ session('search_key.genre') == $genre['id'] ? 'selected' : '' }}>
                            {{ $genre['genre'] }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="flex items-center w-full">
                <x-input class="mx-2" type="text" id="search" name="words" placeholder="Search ..."
                    value="{{ session('search_key.words') }}" />
                <button type="submit" class="px-2">
                    <i class="fa-solid fa-magnifying-glass text-secondary-dark"></i>
                </button>
            </div>
        </form>
    </div>

    <div id="overlay" class="overlay w-full h-full"></div>
</div>
