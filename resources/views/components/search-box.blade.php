<form action="{{ route('index') }}" method="GET"
    class="flex bg-white rounded-lg py-2 px-2 shadow items-center w-1/2 gap-2">
    <div class="flex border-r-2 border-r-gray-100">
        <x-select class="mx-2" type="select" id="area" name="region">
            <option value="0" selected>All area</option>
            @foreach ($shops->unique('region.id') as $shop)
                <option value="{{ $shop->region['id'] }}">{{ $shop->region['region'] }}</option>
            @endforeach

        </x-select>
    </div>

    <div class="flex border-r-2 border-r-gray-100">
        <x-select class="mx-2" type="select" id="genre" name="genre">
            <option value="0" selected>All genre</option>
            @foreach ($shops->unique('genre.id') as $shop)
                <option value="{{ $shop->genre['id'] }}">{{ $shop->genre['genre'] }}</option>
            @endforeach
        </x-select>
    </div>

    <div class="flex items-center w-full">
        {{-- <label for="search"><i class="fa-solid fa-magnifying-glass text-gray-300"></i></label> --}}
        <x-input class="mx-2" type="text" id="search" name="words" placeholder="Search ..." />
    </div>
    <button type="submit">
        <i class="fa-solid fa-magnifying-glass text-gray-300"></i>
    </button>
</form>
