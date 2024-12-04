<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Diagnose - Menphy AI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Diagnosis Kesehatan Mental</h1>

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form action="{{ route('diagnose.submit') }}" method="POST">
            @csrf
            @foreach ($questions as $question)
                <div class="mb-4">
                    <p class="text-lg mb-2">{{ $question->question_text }}</p>
                    <div class="flex items-center">
                        <input type="radio" id="yes_{{ $question->id }}" name="answers[{{ $question->id }}]"
                            value="yes" class="mr-2" required>
                        <label for="yes_{{ $question->id }}" class="mr-4">Ya</label>
                        <input type="radio" id="no_{{ $question->id }}" name="answers[{{ $question->id }}]"
                            value="no" class="mr-2" required>
                        <label for="no_{{ $question->id }}">Tidak</label>
                    </div>
                </div>
            @endforeach
            <div class="text-center mt-8">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Kirim Diagnosis
                </button>
            </div>
        </form>
    </div>
</body>

</html>
