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
            <p class="text-xl mb-3 dark:text-white">FASILITAS</p>
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
        <p class="text-4xl mb-3 dark:text-white text-center">TENTANG KAMI</p>
    </div>
    <div class="mt-10 mx-auto w-8/12 text-center">
        <p class="text-lg mb-3 dark:text-white">Selamat datang di hotel kami, sebuah tempat di mana kenyamanan bertemu dengan keanggunan, menciptakan pengalaman tak terlupakan bagi setiap tamu kami. Di sini, kami tidak hanya menyediakan tempat bermalam yang mewah, tetapi juga merangkul Anda dengan keramahan dan pelayanan terbaik. Dengan desain interior yang elegan dan fasilitas modern yang disesuaikan untuk kebutuhan Anda, kami berkomitmen untuk menjadikan setiap kunjungan Anda sebagai momen istimewa. Dari hidangan lezat di restoran kami hingga suasana santai di lobi, setiap detail telah dirancang untuk menciptakan suasana yang menenangkan dan memanjakan. Bersama kami, Anda tidak hanya menginap di sebuah hotel, tetapi Anda memasuki dunia kami yang penuh perhatian terhadap detail dan kepuasan Anda. Selamat menikmati pengalaman tak terlupakan di hotel kami, di mana setiap kunjungan adalah kisah yang kami banggakan.</p>
    </div>

</body>

</html>