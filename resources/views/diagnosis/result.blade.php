<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Diagnosis Result - Menphy AI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Hasil Diagnosis</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold mb-4">Didiagnosis:</h2>
            <div class="flex gap-12">
                <p class="text-xl mb-6">{{ $diagnosis->mentalDisorder->name }}</p>
                <p class="text-xl mb-6">{{ $diagnosis->cf }}%</p>
            </div>

            <h2 class="text-2xl font-bold mb-4">Rekomendasi:</h2>
            <p class="text-xl mb-6">
                {{ $diagnosis->recommendation->recommendation_text ?? 'Rekomendasi belum tersedia.' }}</p>
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Return to Home
            </a>
        </div>
    </div>
</body>

</html>
