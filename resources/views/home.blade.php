<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Menpy AI</title>

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
</head>

<body class="bg-white">
    <!-- Navbar -->
    <x-navbar />

    <!-- Hero Section -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative min-h-[calc(100vh-100px)] my-2 bg-white rounded-3xl shadow-lg overflow-hidden">
            <img src="{{ asset('assets/images/hero-img.jpeg') }}" alt="hero-img" loading="lazy"
                class="absolute top-0 left-0 w-full h-full object-cover rounded-3xl">
            <div
                class="hidden xl:flex flex-col gap-6 absolute bottom-12 right-12 w-96 h-max bg-white bg-opacity-50 backdrop-blur-lg rounded-xl p-4">
                <div class="flex justify-between items-center">
                    <p class="text-xl font-semibold tracking-tighter">Diagnosis Everyday</p>
                    <p class="text-sm font-semibold tracking-tighter mr-2">More 5k users</p>
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-xs w-1/2 font-medium">
                        Jadilah bagian dari Menpy AI untuk kesehatan mentalmu!
                    </p>
                    <div class="flex bg-white rounded-full p-1 overflow-hidden">
                        <img src="{{ asset('assets/images/Avatar1.png') }}" class="w-9" alt="">
                        <img src="{{ asset('assets/images/Avatar2.png') }}" class="-ml-4 w-9" alt="">
                        <img src="{{ asset('assets/images/Avatar3.png') }}" class="-ml-4 w-9" alt="">
                        <img src="{{ asset('assets/images/Avatar4.png') }}" class="-ml-4 w-9" alt="">
                    </div>
                </div>
            </div>
            <div class="absolute top-0 left-0 w-full h-full flex items-center">
                <div class="px-4 md:px-8 w-3/4 md:max-w-lg lg:max-w-xl xl:max-w-2xl">
                    <h1 class="text-white font-bold text-4xl sm:text-5xl lg:text-7xl tracking-tighter">
                        Take care of your mentality with Menpy AI
                    </h1>
                    <p class="max-w-sm text-white my-6">
                        Seimbangankan Mental Anda dengan Diagnosis Cepat dan Rekomendasi
                        Terpersonalisasi
                    </p>
                    <div class="">
                        <a href="{{ route('front.diagnosis.index') }}"
                            class="w-max flex font-semibold text-center text-sm tracking-tighter lg:text-lg rounded-full px-4 py-2 text-white bg-gray-900 hover:bg-gray-700 transition">
                            Start Diagnosis
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Articles Section -->
    <div id="articles" class="py-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="my-12 flex justify-between items-center">
                <h1 class="text-2xl md:text-3xl font-bold tracking-tighter">Related articles</h1>
                <a href="#articles" class="text-xs px-3 py-2 rounded-full border hover:bg-gray-100 transition">Browse
                    all
                    articles</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($articles as $article)
                    <a href="{{ route('articles.show', $article->id) }}">
                        <div class="relative w-full md:h-80 lg:h-[500px] overflow-hidden rounded-2xl group">
                            @php
                                $imageUrl = asset('assets/images/article-1.jpg'); // Default image URL

                                if ($article->image) {
                                    if (Str::startsWith($article->image, 'assets/')) {
                                        $imageUrl = asset($article->image);
                                    } elseif (Str::startsWith($article->image, 'articles/')) {
                                        $imageUrl = Storage::url($article->image);
                                    }
                                }

                            @endphp
                            <img src="{{ $imageUrl }}" alt="Article Image"
                                class="w-full h-full object-cover rounded-2xl group-hover:scale-105 transition duration-300 ease-in-out"
                                loading="lazy">
                            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-black bg-opacity-25">
                            </div>
                            <div class="absolute bottom-0 left-0 m-4">
                                <h3 class="text-lg font-semibold text-white">{{ $article->title }}</h3>
                                <p class="mt-2 text-sm text-gray-300 line-clamp-3">{{ $article->content }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />
</body>

</html>
