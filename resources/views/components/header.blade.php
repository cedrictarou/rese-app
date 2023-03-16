<!-- header -->
<header class="flex justify-between items-center">
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
        <x-application-logo />
    </div>

    {{-- indexページの時だけ表示する --}}
    @if (request()->routeIs('index'))
        {{-- search box --}}
        <x-search-box :shops="$shops" />
    @endif
</header>
