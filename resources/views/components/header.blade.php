<!-- header -->
{{-- <header {{ $attributes->merge(['class' => 'flex justify-between items-center h-16 md:my-10 my-5']) }}> --}}
<header {{ $attributes->merge(['class' => 'my-5 py-5 sticky top-0 z-10 bg-secondary-light']) }}>
    <div class="container mx-auto flex justify-between items-center px-5">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <x-application-logo />
        </div>

        {{-- indexページの時だけ表示する --}}
        @if (request()->routeIs('index'))
            {{-- search box --}}
            <x-search-box :regions="$regions" :genres="$genres" />
        @endif
    </div>
</header>
