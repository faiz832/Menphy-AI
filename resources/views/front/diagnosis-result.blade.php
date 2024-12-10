<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Diagnosis Result - Menpy AI</title>

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
            <h2 class="text-2xl font-semibold mb-4">
                @if ($diagnosis->mentalDisorder)
                    {{ $diagnosis->mentalDisorder->name }}
                @else
                    Tidak Ada Gangguan Mental yang Terdeteksi
                @endif
            </h2>

            <p class="mb-4">
                <strong>Tingkat Kepastian:</strong>
                @if ($diagnosis->cf == 0.0)
                    100%
                @else
                    {{ $diagnosis->cf }}%
                @endif
            </p>

            <p class="mb-4">
                @if ($diagnosis->mentalDisorder)
                    {{ $diagnosis->mentalDisorder->description }}
                @endif
            </p>

            <h3 class="text-xl font-semibold mb-2">Rekomendasi:</h3>
            <p class="mb-4">{{ $diagnosis->recommendation->recommendation_text ?? 'Rekomendasi belum tersedia.' }}</p>

            <p class="text-sm text-gray-600"><span class="font-semibold">Catatan: </span>Hasil ini hanya gambaran awal
                dan tidak
                menggantikan konsultasi dengan
                psikolog atau psikiater.</p>
        </div>
        <a href="{{ route('dashboard') }}"
            class="mt-8 flex justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Kembali ke Dashboard
        </a>
    </div>
</body>

</html>
