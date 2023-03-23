@push('scripts')
    <script src="{{ asset('js/detail.js') }}" defer></script>
    <script src="{{ asset('js/review.js') }}" defer></script>
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
                <div class="flex mb-5">
                    <x-link href="{{ route('mypage') }}" color="white" class="shadow">
                        <i class="fa-solid fa-chevron-left text-black"></i>
                    </x-link>

                    <x-title2 title="{{ $shop['name'] }}" class="ml-4" />
                </div>

                <x-shop-card color="gray">
                    <x-slot name="cardHeader">
                        <img class="rounded w-full aspect-auto object-cover object-center" src="{{ $shop['image'] }}"
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
                <x-comment :reviews="$shop->reviews" />

                {{-- comment modal --}}
                <x-modal :shop="$shop" />
            </div>
            {{-- reserve card --}}
            <div class="col-span-1">
                <x-reserve-card>
                    <x-title2 title="予約の変更" class="mb-4" />
                    <x-reserve-form :action="route('update', $reserve['id'])" method="PUT" :dateValue="$reserve->getDate()" :timeOptions="$timeOptionsForReservation"
                        :numOfPeopleValue="$reserve['num_of_people']" :shopName="$shop['name']" :dateText="$reserve->getDate()" :timeSelected="$reserve->getTime()" :timeText="$reserve->getTime()"
                        :numOfPeopleText="$reserve['num_of_people'] . '人'" buttonText="予約を変更する" />
                </x-reserve-card>
            </div>

        </div>
    </main>

</x-app-layout>
