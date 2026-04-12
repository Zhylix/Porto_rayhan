<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased overflow-hidden">

<div class="h-screen flex">

    <!-- LEFT -->
    <div class="hidden lg:flex w-1/2 items-center justify-center
        bg-gray-900
        text-white relative overflow-hidden">

        <!-- Glow -->
        <div class="absolute w-[500px] h-[500px] bg-white/10 rounded-full blur-3xl -top-32 -left-32"></div>
        <div class="absolute w-[400px] h-[400px] bg-white/10 rounded-full blur-3xl -bottom-32 -right-32"></div>

        <!-- Content -->
        <div class="z-10 max-w-md text-center px-6">
            <h1 class="text-4xl font-bold mb-4 leading-tight">
                Welcome Back 👋
            </h1>
            <p class="text-lg opacity-90 leading-relaxed">
                Kelola akun dan data kamu dengan lebih cepat,
                aman, dan nyaman.
            </p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="w-full lg:w-1/2 flex items-center justify-center bg-gray-100 px-6">

        <div class="w-full max-w-md">

            
            <!-- CARD -->
            <!-- TITLE -->
            {{-- <div class="text-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">
                    Sign in
                </h2>
                <p class="text-sm text-gray-500">
                    Masuk ke akun kamu
                </p>
            </div> --}}
            <div class="bg-white rounded-2xl shadow-2xl p-8 border border-gray-100">
                {{ $slot }}
            </div>

        </div>

    </div>

</div>

</body>
</html>