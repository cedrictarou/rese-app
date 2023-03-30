@push('scripts')
    <script src="{{ asset('js/detail.js') }}" defer></script>
@endpush

<x-app-layout>
    {{-- header part --}}
    <x-header />

    {{-- shop詳細ページ --}}
    <main class="mx-auto container pb-10 px-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            {{-- shop info --}}
            <div class="col-span-1">
                <x-detail-top :shop="$shop" />
                {{-- shop card --}}
                <x-shop-card :shop="$shop" color="gray" description=true />

                {{-- comments area --}}
                <x-comment :reviews="$shop->reviews">
                    <div class="flex flex-wrap my-5 gap-2 items-center">
                        <x-title3 title="お店のレビュー" />
                    </div>
                </x-comment>

            </div>

            {{-- reserve card --}}
            @php
                // 予約状況をセット
                $reserve['status'] = 0;
            @endphp
            <div class="col-span-1">
                <x-reserve-card>
                    <x-title2 title="予約" class="mb-4" />
                    <x-reserve-form :action="route('reservation', $shop['id'])" method="POST" csrf dateValue=""
                        dateMin="{{ now()->format('Y-m-d') }}" :timeOptions="$timeOptionsForReservation" timeSelected="" numOfPeopleValue=""
                        numOfPeopleSelected="0" :shopName="$shop['name']" dateText="日付を選んでください。" timeText="時間を選んでください。"
                        numOfPeopleText="人数を選んでください。" buttonText="予約する" :reserve="$reserve" />
                </x-reserve-card>
            </div>

        </div>
    </main>

</x-app-layout>
