<x-app-layout>

    {{-- shop一覧ページ --}}
    <section class="text-gray-600 body-font">

        <div class="grid grid-cols-4 gap-2">

            @for ($i = 0; $i < 10; $i++)
                {{-- shop card --}}
                <div class="bg-white rounded-lg  border-solid">
                    <img class="h-40 rounded w-full object-cover object-center"
                        src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="content">
                    <div class="p-5">
                        <h2 class="text-lg text-gray-900 font-medium title-font">お店の名前</h2>
                        <div class="text-sm text-gray-500 mb-5">
                            <span>#東京</span>
                            <span>#寿司</span>
                        </div>
                        <div class="flex justify-between">
                            <x-link href="#">詳しくみる</x-link>
                            <button> <i class="fa-solid fa-heart text-gray-300 fa-lg"></i> </button>

                        </div>
                    </div>
                </div>
            @endfor




        </div>
    </section>

</x-app-layout>
