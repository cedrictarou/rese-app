<form action="{{ route('index') }}" method="GET"
    class="flex bg-white rounded-lg py-2 px-2 shadow items-center w-1/2 gap-2">
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
                <option value="{{ $genre['id'] }}" {{ session('search_key.genre') == $genre['id'] ? 'selected' : '' }}>
                    {{ $genre['genre'] }}</option>
            @endforeach
        </x-select>
    </div>

    <div class="flex items-center w-full">
        <x-input class="mx-2" type="text" id="search" name="words" placeholder="Search ..."
            value="{{ session('search_key.words') }}" />
    </div>
    <button type="submit" class="px-2">
        <i class="fa-solid fa-magnifying-glass text-secondary-dark"></i>
    </button>
</form>
