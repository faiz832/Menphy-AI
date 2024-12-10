<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Terms of Service - Menpy AI</title>

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

<body class="font-sans antialiased">
    <div class="min-h-screen">
        <!-- Navbar -->
        <x-navbar />

        <div class="pt-0 pb-6 md:py-12 bg-white">
            <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
                <h1 class="text-6xl text-center font-bold py-2 mb-2">
                    Terms of Service</h1>
                <p class="text-center text-gray-500 mb-12">Last updated: {{ date('F d, Y') }}</p>
                <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                    <div class="p-6 lg:p-8">
                        @php
                            $terms = [
                                [
                                    'title' => 'Penerimaan Syarat dan Ketentuan',
                                    'content' =>
                                        'Dengan mengakses dan menggunakan platform Menpy AI, kamu menyetujui syarat dan ketentuan yang berlaku. Jika kamu tidak setuju dengan salah satu syarat ini, harap hentikan penggunaan layanan kami.',
                                ],
                                [
                                    'title' => 'Penggunaan Layanan',
                                    'content' =>
                                        'Layanan Menpy AI hanya boleh digunakan untuk tujuan yang sah, khususnya dalam mendukung kesehatan mentalmu. Segala bentuk penyalahgunaan, seperti eksploitasi, pelanggaran privasi, atau penggunaan untuk tujuan penipuan, sangat dilarang.',
                                ],
                                [
                                    'title' => 'Registrasi Akun',
                                    'content' =>
                                        'Saat membuat akun di Menpy AI, kamu wajib memberikan informasi yang akurat, terkini, dan lengkap. Kamu bertanggung jawab untuk menjaga keamanan akunmu dan segera melaporkan aktivitas mencurigakan pada akunmu.',
                                ],
                                [
                                    'title' => 'Perubahan Syarat dan Ketentuan',
                                    'content' =>
                                        'Menpy AI berhak untuk mengubah atau memperbarui syarat dan ketentuan kapan saja. Perubahan akan diberlakukan setelah dipublikasikan, dan penggunaan platform setelah perubahan dianggap sebagai persetujuan terhadap syarat yang diperbarui.',
                                ],
                                [
                                    'title' => 'Penghentian Layanan',
                                    'content' =>
                                        'Menpy AI dapat menangguhkan atau mengakhiri akunmu jika ditemukan pelanggaran terhadap syarat dan ketentuan ini. Penghentian akun dapat menyebabkan hilangnya akses ke layanan dan data yang ada di platform.',
                                ],
                                [
                                    'title' => 'Keterbatasan Layanan',
                                    'content' =>
                                        'Menpy AI tidak menggantikan konsultasi langsung dengan ahli kesehatan mental. Kami hanya menyediakan informasi berbasis teknologi AI yang bertujuan untuk mendukung pemahaman dan pengelolaan kesehatan mentalmu.',
                                ],
                                [
                                    'title' => 'Privasi Data',
                                    'content' =>
                                        'Kami menjaga privasi data pribadimu sesuai dengan Kebijakan Privasi kami. Pastikan untuk membaca kebijakan tersebut untuk memahami bagaimana kami mengelola dan melindungi datamu.',
                                ],
                                [
                                    'title' => 'Tanggung Jawab Pengguna',
                                    'content' =>
                                        'Kamu bertanggung jawab atas semua aktivitas yang dilakukan menggunakan akunmu. Pastikan untuk menggunakan platform ini secara bertanggung jawab dan tidak melanggar hukum atau norma yang berlaku.',
                                ],
                            ];
                        @endphp

                        <div class="space-y-6">
                            @foreach ($terms as $index => $term)
                                <div class="border-b border-gray-200 pb-6 last:border-b-0 last:pb-0">
                                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $index + 1 }}.
                                        {{ $term['title'] }}</h2>
                                    <p class="text-gray-600">{{ $term['content'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-footer />
    </div>
</body>

</html>
