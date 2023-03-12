<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

    <div class="w-full sm:max-w-md bg-white shadow-md overflow-hidden sm:rounded-lg pb-2">
        {{-- card--top --}}
        <div class="bg-blue-600 font-bold px-3 py-4 text-white">
            {{ $title }}
        </div>

        {{-- card--body --}}
        <div class="my-5 px-5">
            {{ $slot }}
        </div>
    </div>
</div>
