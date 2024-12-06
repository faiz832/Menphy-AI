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

<body class="bg-white">
    <!-- Navbar -->
    <x-navbar />

    <!-- Hero Section -->
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

    <!-- Features Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-40">
            <h2 class="text-3xl font-bold text-center mb-8">Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <img src="{{ asset('assets/images/feature-1.png') }}" alt="" class="w-full">
                    </div>
                    <h3 class="text-xl font-bold mb-2">Fast Diagnosis</h3>
                    <p class="text-gray-600">Menphy AI memudahkan Anda dalam melakukan diagnosis mental secara cepat dan
                        akurat.</p>
                </div>
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <img src="{{ asset('assets/images/feature-2.png') }}" alt="" class="w-full">
                    </div>
                    <h3 class="text-xl font-bold mb-2">Personalized Recommendations</h3>
                    <p class="text-gray-600">Menphy AI memberikan rekomendasi terpersonalisasi sesuai dengan tingkat
                        kepastian
                        Anda.</p>
                </div>
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <img src="{{ asset('assets/images/feature-3.png') }}" alt="" class="w-full">
                    </div>
                    <h3 class="text-xl font-bold mb-2">Interactive Self-Diagnosis</h3>
                    <p class="text-gray-600">Menphy AI menyediakan fitur interaktif untuk memudahkan Anda dalam
                        melakukan
                        diagnosis mental secara langsung.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />
</body>

</html>
