@props(['reserve', 'isAdmin' => false])

@php
    switch ($reserve['status']) {
        case 0: // 予約済み
            $addStyle = 'bg-primary text-white';
            break;
        case 1: // 来店済み
            $addStyle = 'bg-primary-light text-white';
            break;
        case 2: // キャンセル済み
            $addStyle = 'bg-secondary-dark text-white';
            break;
        default:
            $addStyle = 'bg-primary text-white';
            break;
    }
@endphp

<div {{ $attributes->merge(['class' => "shadow p-5 rounded mb-3 {$addStyle}"]) }}>
    <div class="flex justify-between mb-5">

        <x-title4>
            <span class="mr-2">
                <i class="fa-regular fa-clock"></i>
            </span>
            @switch($reserve['status'])
                @case(0)
                    予約済み
                @break

                @case(1)
                    来店済み
                    @if (!$isAdmin)
                        レビューを書く
                    @endif
                @break

                @case(2)
                    キャンセル済み
                @break

                @default
            @endswitch
        </x-title4>
        @if ($reserve['status'] === 0)
            <form action="{{ route('cancel', $reserve['id']) }}" method="POST" onsubmit="return confirm('本当に削除しますか？')">
                @method('PUT')
                @csrf
                <button class="cancel-btn" type="submit">
                    <i class="fa-solid fa-xmark text-white"></i>
                </button>
            </form>
        @endif
    </div>

    <table class="w-full h-full">
        <tr>
            @if ($isAdmin)
                <th class="text-start w-1/3">User</th>
                <td class="text-start w-2/3">{{ $reserve->user['name'] }}</td>
            @else
                <th class="text-start w-1/3">Shop</th>
                <td class="text-start w-2/3">{{ $reserve->shop['name'] }}</td>
            @endif
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
    @if ($reserve['status'] === 0)
        <div class="flex justify-end">
            <form action="{{ route('came', $reserve['id']) }}" method="POST"
                onsubmit="return confirm('お客さんが来店しましたか？')">
                @method('PUT')
                @csrf
                <x-button>来店確認</x-button>
            </form>

        </div>
    @endif
</div>
