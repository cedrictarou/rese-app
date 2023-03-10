@push('scripts')
    <script src="{{ asset('js/detail.js') }}" defer></script>
@endpush

<x-app-layout>

    {{-- shop詳細ページ --}}
    <section class="text-gray-600 body-font">

        <div class="grid grid-cols-2 gap-10">

            <div class="rounded-lg border-solid">
                <div class="flex mb-5">
                    <x-link href="{{ url()->previous() ?? route('index') }}" color="white" class="shadow">
                        <i class="fa-solid fa-chevron-left text-black"></i>
                    </x-link>

                    <x-title2 id="shop-name" title="仙人" class="ml-4" />

                </div>

                {{-- shop card --}}
                <x-shop-card color="gray">
                    <x-slot name="cardHeader">
                        <img class="rounded w-full object-cover object-center"
                            src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg"
                            alt="content">
                    </x-slot>
                    {{-- card body --}}
                    <div class="mt-5 text-black">
                        <div class="text-sm text-gray-500 mb-5">
                            <span>#東京</span>
                            <span>#寿司</span>
                        </div>
                        <div class="flex justify-between">
                            <p>料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。
                            </p>
                        </div>
                    </div>
                </x-shop-card>
            </div>

            {{-- reserve card --}}
            <x-reserve-card class="relative -mt-24">
                <x-title2 title="予約" class="mb-4" />
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-4 w-1/3">
                        <x-input id="date" type="date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="日付を選択してください" required />
                    </div>
                    <div class="mb-4">
                        <x-select
                            class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:bg-white"
                            type="select" id="time" name="time" required>
                            <option selected>時間</option>
                            @for ($hour = 12; $hour <= 20; $hour++)
                                @for ($minute = 0; $minute <= 30; $minute += 30)
                                    @php
                                        $time = sprintf('%02d:%02d', $hour, $minute);
                                    @endphp
                                    <option value="{{ $time }}">{{ $time }}</option>
                                @endfor
                            @endfor
                        </x-select>
                    </div>
                    <div class="mb-4">
                        <x-select
                            class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:bg-white"
                            type="select" id="number" name="num_of_people required">
                            <option selected>ご利用人数</option>
                            @for ($i = 1; $i < 11; $i++)
                                <option value="{{ $i }}">{{ $i }}人</option>
                            @endfor
                        </x-select>
                    </div>

                    <div class="bg-primary-light shadow p-5 text-white rounded">
                        <table class="w-full">
                            <tr>
                                <th class="text-start w-1/3">Shop</th>
                                <td id="confirm-shop-name" class="text-start w-2/3"></td>
                            </tr>
                            <tr>
                                <th class="text-start ">Date</th>
                                <td id="confirm-date" class="text-start">日付を選んでください。</td>
                            </tr>
                            <tr>
                                <th class="text-start ">Time</th>
                                <td id="confirm-time" class="text-start">時間を選んでください。</td>
                            </tr>
                            <tr>
                                <th class="text-start ">Number</th>
                                <td id="confirm-number" class="text-start">人数を選んでください。</td>
                            </tr>
                        </table>
                    </div>

                    <div class="w-full absolute bottom-0 left-0 rounded">
                        <x-button class="w-full text-lg flex justify-center bg-primary-dark py-4">
                            予約する
                        </x-button>
                    </div>
                </form>
            </x-reserve-card>

        </div>
    </section>

</x-app-layout>
