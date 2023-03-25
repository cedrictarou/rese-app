@push('scripts')
    <script src="{{ asset('js/detail.js') }}" defer></script>
    <script src="{{ asset('js/accordion.js') }}" defer></script>
@endpush

<x-app-layout>
    {{-- header part --}}
    <div class="h-16 my-10">
        <x-header />
    </div>

    {{-- shop詳細ページ --}}
    <main>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            {{-- shop info --}}
            <div class="col-span-1">
                <div class="flex items-center mb-5">
                    <x-link href="{{ url()->previous() == url()->current() ? url()->previous() : route('index') }}"
                        color="white" class="shadow">
                        <i class="fa-solid fa-chevron-left text-black"></i>
                    </x-link>
                    <x-title2 title="{{ $shop['name'] }}" class="ml-4" />
                    <a href="#comments-box" class="ml-auto">
                        <x-star-rating :reviews="$reviews" />
                    </a>
                </div>

                {{-- shop card --}}
                <x-shop-card color="gray">
                    <x-slot name="cardHeader">
                        <img class="rounded w-full object-cover object-center" src="{{ $shop['image'] }}"
                            alt="content">
                    </x-slot>
                    {{-- card body --}}
                    <div class="mt-5 text-black">
                        <div class="text-sm text-gray-500 mb-5 flex gap-2">
                            <span>#{{ $shop->region['region'] }}</span>
                            <span>#{{ $shop->genre['genre'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <p>{{ $shop['description'] }}
                            </p>
                        </div>
                    </div>
                </x-shop-card>

                {{-- comments area --}}
                <x-comment :reviews="$reviews" />
                {{-- comment modal --}}
                <x-modal :shop="$shop" />
            </div>

            {{-- reserve card --}}
            <div class="col-span-1">
                <x-reserve-card>
                    <x-title2 title="予約" class="mb-4" />
                    <x-reserve-form :action="route('reservation', $shop['id'])" method="POST" csrf dateValue=""
                        dateMin="{{ now()->format('Y-m-d') }}" :timeOptions="$timeOptionsForReservation" timeSelected="" numOfPeopleValue=""
                        numOfPeopleSelected="0" :shopName="$shop['name']" dateText="日付を選んでください。" timeText="時間を選んでください。"
                        numOfPeopleText="人数を選んでください。" buttonText="予約する" />
                </x-reserve-card>
            </div>

        </div>
    </main>

</x-app-layout>
