<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="../css/styles.css">
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-50">
    <div class=" flex p-2 w-10/12 mx-auto mt-20">
        <div>
            <p class="text-5xl mb-3 dark:text-white">HOTEL HEBAT</p>
        </div>
        <div class="ml-auto my-auto flex gap-3">
            <a href="{{ route('welcome') }}" class="text-xl mb-3 dark:text-white">HOME</a>
            <p class="text-xl mb-3 dark:text-white">|</p>
            <a href="{{ route('kamar.index') }}" class="text-xl mb-3 dark:text-white">KAMAR</a>
            <p class="text-xl mb-3 dark:text-white">|</p>
            <a href="{{ route('sampul_fasilitas') }}" class="text-xl mb-3 dark:text-white">FASILITAS</a>
            <p class="text-xl mb-3 dark:text-white">|</p>
            @if (Route::has('login'))
            @auth
            <a href="{{ route('fasilitas.index') }}" class="text-xl mb-3 dark:text-white">DASHBOARD</a>
            @else
            <a href="{{ route('login') }}" class="text-xl mb-3 dark:text-white">LOG IN</a>
            @endauth
            @endif
        </div>
    </div>

    <div class="gambar-container mx-auto w-10/12 h-96">
        <img src="{{ asset('storage/gambar_hotel/baner.png') }}" alt="Foto Hotel">
    </div>

    <div class="mt-10 mx-auto w-3/12">
        <p class="text-4xl mb-3 dark:text-white text-center">Fasilitas</p>
    </div>
    <div class="mt-10 mb-10 mx-auto w-10/12 flex gap-2">
        <div class="w-1/3">
            <img src="{{ asset('storage/fasilitas/lobi.webp') }}" alt="Foto Hotel">
        </div>
        <div class="w-1/3">
            <img src="{{ asset('storage/fasilitas/kolam.webp') }}" alt="Foto Hotel">
        </div>
        <div class="w-1/3">
            <img src="{{ asset('storage/fasilitas/restoran.webp') }}" alt="Foto Hotel">
        </div>
    </div>

</body>

</html>