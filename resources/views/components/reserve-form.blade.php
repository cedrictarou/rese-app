@props([
    'action' => '',
    'method' => '',
    'dateValue' => '',
    'dateMin' => '',
    'timeOptions' => [],
    'timeSelected' => '',
    'numOfPeopleValue' => '',
    'numOfPeopleSelected' => 0,
    'shopName' => '',
    'dateText' => '',
    'timeText' => '',
    'numOfPeopleText' => '',
    'buttonText' => '',
])

<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="mb-4 w-1/3">
        <x-input id="date" type="date"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            name="date" placeholder="日付を選択してください" :value="$dateValue" required :min="$dateMin" />
    </div>

    <div class="mb-4">
        <x-select
            class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:bg-white"
            type="select" id="time" name="time" required>
            <option value="" {{ $timeSelected === '' ? 'selected' : '' }}>時間</option>
            @foreach ($timeOptions as $timeOption)
                <option value="{{ $timeOption }}" {{ $timeSelected === $timeOption ? 'selected' : '' }}>
                    {{ $timeOption }}</option>
            @endforeach
        </x-select>
    </div>

    <div class="mb-4">
        <x-select
            class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:bg-white"
            type="select" id="number" name="num_of_people" required>
            <option value="" selected>ご利用人数</option>
            @for ($i = 1; $i < 11; $i++)
                <option value="{{ $i }}" {{ $numOfPeopleValue === $i ? 'selected' : '' }}>
                    {{ $i }}人</option>
            @endfor
        </x-select>
    </div>

    <div class="bg-primary-light shadow p-5 mb-12 text-white rounded">
        <table class="w-full">
            <tr>
                <th class="text-start w-1/3">Shop</th>
                <td id="confirm-shop-name" class="text-start w-2/3">{{ $shopName }}</td>
            </tr>
            <tr>
                <th class="text-start ">Date</th>
                <td id="confirm-date" class="text-start">{{ $dateText }}</td>
            </tr>
            <tr>
                <th class="text-start ">Time</th>
                <td id="confirm-time" class="text-start">{{ $timeText }}</td>
            </tr>
            <tr>
                <th class="text-start ">Number</th>
                <td id="confirm-number" class="text-start">{{ $numOfPeopleText }}</td>
            </tr>
        </table>
    </div>

    <div class="w-full absolute md:bottom-0 left-0 rounded">
        <x-button class="w-full text-lg flex justify-center bg-primary-dark py-4">
            {{ $buttonText }}
        </x-button>
    </div>
</form>
