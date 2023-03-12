<x-app-layout>

    {{-- shop一覧ページ --}}
    <section>

        <div class="grid grid-cols-4 gap-x-2 gap-y-4">

            @for ($i = 0; $i < 10; $i++)
                {{-- shop card --}}
                <x-shop-card>
                    {{-- card-header --}}
                    <x-slot name="cardHeader">
                        <img class="h-40 rounded w-full object-cover object-center"
                            src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="content">
                    </x-slot>

                    {{-- card-body --}}
                    <div class="p-5">
                        <h2 class="text-lg text-gray-900 font-medium title-font">お店の名前</h2>
                        <div class="text-sm text-gray-500 mb-5">
                            <span>#東京</span>
                            <span>#寿司</span>
                        </div>
                        <div class="flex justify-between">
                            <x-link href="/detail/{{ $i + 1 }}">詳しくみる</x-link>
                            <form action="#" method="POST">
                                @csrf
                                <button type="submit"> <i class="far fa-heart text-gray-300 fa-lg"></i> </button>
                            </form>
                        </div>
                    </div>
                </x-shop-card>
            @endfor
        </div>

    </section>

</x-app-layout>
