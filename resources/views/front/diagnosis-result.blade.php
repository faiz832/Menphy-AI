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

<body class="bg-white">
    <!-- Navbar -->
    <x-navbar />

    <div class="pt-0 md:pt-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-6xl font-bold text-center">Diagnosis Result</h1>
            <div class="mt-16 max-w-3xl mx-auto shadow-md p-8 rounded-3xl bg-white border">
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
                <p class="mb-4">{{ $diagnosis->recommendation->recommendation_text ?? 'Rekomendasi belum tersedia.' }}
                </p>

                <p class="text-sm text-gray-600"><span class="font-semibold">Catatan: </span>Hasil ini hanya gambaran
                    awal
                    dan tidak
                    menggantikan konsultasi dengan
                    psikolog atau psikiater.</p>
            </div>
            <div class="my-12 md:my-24 flex justify-center">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-full font-semibold text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 transition">
                    Go to Dasboard
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />
</body>

</html>
