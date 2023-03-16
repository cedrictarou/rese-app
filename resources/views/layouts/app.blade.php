<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')

</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- フラッシュメッセージ --}}
        @if (session()->has('message'))
            <x-flash-card>
                {{ session()->get('message') }}
            </x-flash-card>
        @endif

        {{-- navigation  --}}
        <x-nav />

        <!-- Page Content -->
        <div class="container mt-10 mx-auto">
            {{ $slot }}
        </div>
    </div>


</body>

</html>
