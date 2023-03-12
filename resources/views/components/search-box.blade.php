<form action="/" method="GET" class="flex bg-white rounded-lg py-2 px-2 shadow items-center w-1/2 gap-2">
    <div class="flex border-r-2 border-r-gray-100">
        <x-select class="mx-2" type="select" id="area" name="area">
            <option value="0" selected>All area</option>
            <option value="1">東京</option>
            <option value="2">大阪</option>
            <option value="3">福岡</option>
        </x-select>
    </div>

    <div class="flex border-r-2 border-r-gray-100">
        <x-select class="mx-2" type="select" id="genre" name="genre">
            <option value="0" selected>All genre</option>
            <option value="1">寿司</option>
            <option value="2">焼肉</option>
            <option value="3">居酒屋</option>
            <option value="4">イタリアン</option>
            <option value="5">ラーメン</option>
        </x-select>
    </div>

    <div class="flex items-center w-full">
        <label for="search"><i class="fa-solid fa-magnifying-glass text-gray-300"></i></label>
        <x-input class="mx-2" type="text" id="search" name="search" placeholder="Search ..." />
    </div>
</form>
