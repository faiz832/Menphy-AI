<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $article->title }} - Menpy AI</title>

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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-12 md:my-24 max-w-3xl mx-auto flex flex-col items-center">
            <h1 class="text-4xl md:text-6xl lg:text-7xl text-center font-semibold">{{ $article->title }}</h1>
            <p class="text-sm md:text-base text-gray-600 mt-8">Author: <strong>{{ $article->user->name }}</strong></p>
            <p class="text-sm md:text-base text-gray-600 mt-1">Published: {{ $article->created_at->format('M d, Y') }}
            </p>
        </div>

        @if ($article->image)
            <div class="rounded-3xl overflow-hidden aspect-video">
                <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="max-w-full h-auto">
            </div>
        @endif

        <div class="mt-12 md:mt-24 max-w-3xl mx-auto text-lg">
            {!! nl2br(e($article->content)) !!}
        </div>

        <div class="my-12 md:my-24 flex justify-center">
            <a href="{{ route('home') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-full font-semibold text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 transition">
                Back to Home
            </a>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />
</body>

</html>
