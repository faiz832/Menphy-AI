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
        <h1 class="text-3xl font-bold text-center mb-8">Mental Health Self-Diagnosis</h1>
        <form action="{{ route('diagnosis.process') }}" method="POST">
            @csrf
            @foreach ($questions as $question)
                <div class="mb-3">
                    <label>{{ $question->question_text }}</label><br>
                    <label>
                        <input type="radio" name="answers[Q{{ $question->id }}]" value="yes" required> Ya
                    </label>
                    <label>
                        <input type="radio" name="answers[Q{{ $question->id }}]" value="no" required> Tidak
                    </label>
                </div>
            @endforeach
            <div class="text-center mt-8">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Submit Diagnosis
                </button>
            </div>
        </form>
    </div>
</body>

</html>
