<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Menphy AI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        .hero-img {
            background-image: url('{{ asset('assets/images/hero-img.jpeg') }}');
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="bg-white h-[9999px]">
    <x-navbar />
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="hero-img min-h-[calc(100vh-100px)] my-2 flex items-center bg-white rounded-3xl shadow-lg">
            <div class="px-8 md:max-w-lg lg:max-w-xl xl:max-w-2xl">
                <h1 class="text-white font-bold text-4xl sm:text-5xl lg:text-7xl tracking-tight">
                    Take care of your mentality with Menphy AI
                </h1>
                <p class="max-w-sm text-white my-6">
                    Seimbangankan Mental Anda dengan Diagnosis Cepat dan Rekomendasi
                    Terpersonalisasi
                </p>
                <div class="">
                    <a href="{{ route('diagnosis.index') }}"
                        class="w-max flex font-semibold text-center text-sm rounded-full px-4 py-2 text-white bg-gray-900 hover:bg-gray-700 transition">
                        Start Self-Diagnosis
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
