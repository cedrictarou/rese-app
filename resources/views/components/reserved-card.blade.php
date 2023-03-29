@props(['reserve', 'loop'])

<div {{ $attributes->merge(['class' => 'bg-primary text-white shadow p-5 rounded mb-3']) }}>
    <div class="flex justify-between mb-5">
        <x-title4>
            <span class="mr-2">
                <i class="fa-regular fa-clock"></i>
            </span>
            予約{{ $loop->index + 1 }}
        </x-title4>
        <form action="{{ route('cancel', $reserve['id']) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="cancel-btn" type="submit">
                <i class="fa-solid fa-xmark text-white"></i>
            </button>
        </form>
    </div>

    <table class="w-full h-full">
        <tr>
            <th class="text-start w-1/3">Shop</th>
            <td class="text-start w-2/3">{{ $reserve->shop['name'] }}</td>
        </tr>
        <tr>
            <th class="text-start">Date</th>
            <td class="text-start">{{ $reserve->getDate() }}</td>
        </tr>
        <tr>
            <th class="text-start">Time</th>
            <td class="text-start">{{ $reserve->getTime() }}</td>
        </tr>
        <tr>
            <th class="text-start">Number</th>
            <td class="text-start">{{ $reserve['num_of_people'] . '人' }}</td>
        </tr>
    </table>
</div>
