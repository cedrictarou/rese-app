<!-- header -->
<header class="flex justify-between items-center">
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
        <x-application-logo />
    </div>

    {{-- indexページの時だけ表示する --}}
    @if (request()->routeIs('index'))
        {{-- search box --}}
        <div class="flex bg-white rounded-lg py-2 px-2 shadow items-center w-1/2 gap-2">
            <x-search-box />
        </div>
    @endif
</header>
