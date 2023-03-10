<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

    <div
        class="w-full h-80 flex items-center justify-center flex-col  sm:max-w-md bg-white shadow-md overflow-hidden sm:rounded-lg pb-2">
        {{-- テキスト --}}
        <div>
            {{ $text }}
        </div>

        {{-- ボタン --}}
        <div class="flex  justify-center mt-10">
            {{ $slot }}
        </div>
    </div>

</div>
