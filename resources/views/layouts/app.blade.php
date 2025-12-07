<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    @php
    $currentRouteName = \Illuminate\Support\Facades\Route::currentRouteName();
    @endphp

    <div class="min-h-screen">
        {{-- Top navigation – hide on portfolio page --}}
        @if($currentRouteName !== 'portfolio')
        @include('layouts.navigation')
        @endif

        {{-- Page Heading (optional, only if a child defines it) --}}
        <header class="bg-white shadow">
            @yield('header')
        </header>

        {{-- Page Content --}}
        <main>
            @yield('content')
        </main>
    </div>
</body>


</html>