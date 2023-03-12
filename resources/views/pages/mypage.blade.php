<x-app-layout>

    {{-- my page --}}
    <section>
        <div class="grid grid-cols-3 gap-10">
            {{-- reserve card area --}}
            <div class="col-span-1 ">
                <x-title3 title="予約状況" class="mb-4" />
                @for ($i = 1; $i < 5; $i++)
                    {{-- reserve card --}}
                    <div class="bg-primary text-white shadow p-5 rounded mb-3">
                        <div class="flex justify-between mb-5">
                            <x-title4>
                                <span class="mr-2">
                                    <i class="fa-regular fa-clock"></i>
                                </span>
                                予約{{ $i }}
                            </x-title4>
                            <form action="" method="POST">
                                @csrf
                                <button>
                                    <i class="fa-regular fa-xmark fa-lg"></i>
                                </button>
                            </form>
                        </div>

                        <table class="w-full">
                            <tr>
                                <th class="text-start w-1/3">Shop</th>
                                <td class="text-start w-2/3">仙人</td>
                            </tr>
                            <tr>
                                <th class="text-start">Date</th>
                                <td class="text-start">2021-04-01</td>
                            </tr>
                            <tr>
                                <th class="text-start">Time</th>
                                <td class="text-start">17:00</td>
                            </tr>
                            <tr>
                                <th class="text-start">Number</th>
                                <td class="text-start">1人</td>
                            </tr>
                        </table>
                    </div>
                @endfor
            </div>

            <div class="col-span-2 relative">
                <x-title2 class="absolute -top-14" title="testさん" />

                <x-title3 title="お気に入り店舗" class="mb-4" />
                {{-- shop card arae 2 col --}}
                <div class=" grid grid-cols-2 gap-x-2 gap-y-4">

                    @for ($i = 0; $i < 5; $i++)
                        {{-- shop card --}}
                        <x-shop-card>
                            {{-- card-header --}}
                            <x-slot name="cardHeader">
                                <img class="h-40 rounded w-full object-cover object-center"
                                    src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg"
                                    alt="content">
                            </x-slot>
                            {{-- card-body --}}
                            <div class="p-5">
                                <x-title4 class="text-black">お店の名前</x-title4>
                                <div class="text-sm text-secondary-dark mb-5">
                                    <span>#東京</span>
                                    <span>#寿司</span>
                                </div>
                                {{-- card-footer --}}
                                <div class="flex justify-between">
                                    <x-link href="/detail/{{ $i + 1 }}">詳しくみる</x-link>
                                    <form action="#" method="POST">
                                        @csrf
                                        <button type="submit"> <i class="far fa-heart fa-lg text-accent"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </x-shop-card>
                    @endfor
                </div>
            </div>

        </div>
    </section>

</x-app-layout>
