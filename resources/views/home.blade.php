<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Menphy AI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-gray-100">
    <div class="bg-white px-8 py-4 flex justify-between">
        <div class="shrink-0 flex items-center">
            <a href="{{ route('home') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
        </div>
        <a href="{{ route('login') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</a>
    </div>
    <div class="mt-40 mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8">Welcome to Menphy AI</h1>
        <p class="text-xl text-center mb-8">Your personal mental health therapy assistant</p>
        <div class="text-center">
            <a href="{{ route('diagnosis.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Start Self-Diagnosis
            </a>
        </div>
    </div>
</body>

</html>
