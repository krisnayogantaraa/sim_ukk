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

    <div class="gambar-container mx-auto w-9/12 h-82 p-3 shadow-md">
        <div>
            <p class=" text-xl font-semibold mb-3 dark:text-white">Basic</p>
        </div>
        <div>
            <div class="flex">
                <img src="{{ asset('storage/gambar_hotel/kamar_basic.webp') }}" class=" w-72" alt="Foto Hotel">
                <div class="p-3 w-full">
                    <p class=" ml-5 mb-3 dark:text-white text-xl font-semibold">Kamar Basic</p>
                    <div class="flex">
                        <div class="flex">
                            <div class="flex gap-0">
                                <svg class="mt-1 ml-5" xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" />
                                </svg>
                                <p class=" ml-1 mb-3 dark:text-white text-xl">1 Double bed</p>
                            </div>
                            <div class="flex">
                                <svg class="mt-1 ml-5" xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z" />
                                </svg>
                                <p class=" ml-1 mb-3 dark:text-white text-xl">2 Tamu</p>
                            </div>
                        </div>
                        <div class=" ml-auto">
                            <p class=" ml-5 mb-3 text-xl font-semibold text-red-600">Sisa {{$basicCount}} Kamar</p>
                        </div>
                    </div>
                    <?php
                    $basic = "basic";
                    ?>
                    <div class="flex mt-10">
                        <p class=" ml-5 mb-3 text-orange-500 text-3xl font-semibold">Rp. {{$harga_basic}}</p>
                        <a href="{{ route('reservasi.edit', $basic) }}" style="margin-left: auto;">
                            <button type="button" class="focus:outline-none text-white font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-40">Pesan Sekarang</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gambar-container mx-auto w-9/12 h-82 p-3 shadow-md">
        <div>
            <p class=" text-xl font-semibold mb-3 dark:text-white">Deluxe</p>
        </div>
        <div>
            <div class="flex">
                <img src="{{ asset('storage/gambar_hotel/kamar_deluxe.webp') }}" class=" w-72" alt="Foto Hotel">
                <div class="p-3 w-full">
                    <p class=" ml-5 mb-3 dark:text-white text-xl font-semibold">Kamar Deluxe</p>
                    <div class="flex">
                        <div class="flex">
                            <div class="flex gap-0">
                                <svg class="mt-1 ml-5" xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" />
                                </svg>
                                <p class=" ml-1 mb-3 dark:text-white text-xl">1 Double bed 1 Single Bed</p>
                            </div>
                            <div class="flex">
                                <svg class="mt-1 ml-5" xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z" />
                                </svg>
                                <p class=" ml-1 mb-3 dark:text-white text-xl">3 Tamu</p>
                            </div>
                        </div>
                        <div class=" ml-auto">
                            <p class=" ml-5 mb-3 text-xl font-semibold text-red-600">Sisa {{$deluxeCount}} Kamar</p>
                        </div>
                    </div>
                    <?php
                    $basic = "basic";
                    ?>
                    <div class="flex mt-10">
                        <p class=" ml-5 mb-3 text-orange-500 text-3xl font-semibold">Rp. {{$harga_deluxe}}</p>
                        <a href="{{ route('reservasi.edit', $basic) }}" style="margin-left: auto;">
                            <button type="button" class="focus:outline-none text-white font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-40">Pesan Sekarang</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gambar-container mx-auto w-9/12 h-82 p-3 shadow-md">
        <div>
            <p class=" text-xl font-semibold mb-3 dark:text-white">Executive</p>
        </div>
        <div>
            <div class="flex">
                <img src="{{ asset('storage/gambar_hotel/kamar_executive.webp') }}" class=" w-72" alt="Foto Hotel">
                <div class="p-3 w-full">
                    <p class=" ml-5 mb-3 dark:text-white text-xl font-semibold">Kamar Executive</p>
                    <div class="flex">
                        <div class="flex">
                            <div class="flex gap-0">
                                <svg class="mt-1 ml-5" xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" />
                                </svg>
                                <p class=" ml-1 mb-3 dark:text-white text-xl">1 Double bed</p>
                            </div>
                            <div class="flex">
                                <svg class="mt-1 ml-5" xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z" />
                                </svg>
                                <p class=" ml-1 mb-3 dark:text-white text-xl">2 Tamu</p>
                            </div>
                        </div>
                        <div class=" ml-auto">
                        <p class=" ml-5 mb-3 text-xl font-semibold text-red-600">Sisa  {{$executivewebCount}} Kamar</p>
                        </div>
                    </div>
                    <?php
                    $basic = "basic";
                    ?>
                    <div class="flex mt-10">
                        <p class=" ml-5 mb-3 text-orange-500 text-3xl font-semibold">Rp. {{$harga_executive}}</p>
                        <a href="{{ route('reservasi.edit', $basic) }}" style="margin-left: auto;">
                            <button type="button" class="focus:outline-none text-white font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-40">Pesan Sekarang</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>