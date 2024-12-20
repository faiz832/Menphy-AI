<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Articles - Menpy AI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-white">
    <x-navbar />

    <div class="pt-0 pb-6 md:py-12 bg-white">
        <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
            <h1 class="text-6xl text-center font-bold py-2 mb-2">
                Mental Health Articles
            </h1>
            <p class="my-6 md:max-w-xl lg:max-w-2xl text-sm lg:text-base mx-auto text-center">
                Yuk, baca berbagai artikel menarik tentang mental health yang bisa membantu kamu untuk menjaga kesehatan
                mental!
            </p>
            <div class="mt-12 md:mt-24 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($articles as $article)
                    <a href="{{ route('articles.show', $article->id) }}">
                        <div class="relative w-full md:h-80 lg:h-[300px] overflow-hidden rounded-2xl group">
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
                                class="w-full h-full object-cover rounded-2xl group-hover:scale-105 transition duration-300 ease-in-out">
                            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-black bg-opacity-25">
                            </div>
                            <div class="absolute top-0 right-0 m-4">
                                <div
                                    class="rounded-full p-1 lg:p-2 text-white border border-white group-hover:bg-white group-hover:text-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-[135deg]"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 19l-7-7 7-7M4 12h16">
                                        </path>
                                    </svg>
                                </div>
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

    <x-footer />
</body>

</html>
