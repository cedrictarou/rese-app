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

                <x-shop-card color="gray" :shop="$shop" description=true />

                {{-- comments area --}}

                <x-comment :reviews="$reviews">
                    <div class="flex flex-wrap my-5 gap-2 items-center">
                        <x-title3 title="過去のレビュー" />
                        <x-button class="ml-auto" id="open-modal">
                            新しいレビュー
                        </x-button>
                    </div>
                </x-comment>

                {{-- comment modal --}}
                <x-modal :shop="$shop" :reserve="$reserve" />
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
