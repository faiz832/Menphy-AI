<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Privacy Policy - Menpy AI</title>

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

        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
                <h1
                    class="text-6xl text-center font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-sky-500 to-blue-600 py-2 mb-2">
                    Privacy Policy</h1>
                <p class="text-center text-gray-500 mb-12">Last updated: {{ date('F d, Y') }}</p>
                <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                    <div class="p-6 lg:p-8">
                        @php
                            $privacyPolicies = [
                                [
                                    'title' => 'Pengumpulan Data',
                                    'content' =>
                                        'Menpy AI mengumpulkan data pribadi seperti nama, alamat email, dan informasi lain yang kamu berikan secara sukarela saat mendaftar atau menggunakan layanan kami. Kami juga dapat mengumpulkan data non-pribadi seperti statistik penggunaan untuk meningkatkan layanan kami.',
                                ],
                                [
                                    'title' => 'Penggunaan Data',
                                    'content' =>
                                        'Data yang kami kumpulkan digunakan untuk menyediakan layanan terbaik bagi kamu, termasuk analisis kesehatan mental berbasis AI. Kami juga dapat menggunakan data ini untuk meningkatkan pengalaman pengguna, mengembangkan fitur baru, dan memberikan layanan yang lebih relevan.',
                                ],
                                [
                                    'title' => 'Keamanan Data',
                                    'content' =>
                                        'Kami berkomitmen untuk melindungi data pribadi kamu dengan langkah-langkah keamanan yang sesuai. Namun, kami tidak dapat menjamin keamanan mutlak terhadap serangan siber atau pelanggaran keamanan lainnya.',
                                ],
                                [
                                    'title' => 'Berbagi Data',
                                    'content' =>
                                        'Menpy AI tidak akan menjual, menyewakan, atau membagikan data pribadimu kepada pihak ketiga tanpa izinmu, kecuali jika diwajibkan oleh hukum atau untuk mematuhi peraturan yang berlaku.',
                                ],
                                [
                                    'title' => 'Penggunaan Cookie',
                                    'content' =>
                                        'Kami menggunakan cookie dan teknologi serupa untuk meningkatkan pengalaman pengguna di platform kami. Kamu dapat mengatur preferensi cookie melalui pengaturan browsermu.',
                                ],
                                [
                                    'title' => 'Hak Pengguna',
                                    'content' =>
                                        'Kamu memiliki hak untuk mengakses, memperbarui, atau menghapus data pribadimu yang tersimpan di Menpy AI. Jika kamu ingin menggunakan hak ini, silakan hubungi kami melalui kontak yang tersedia.',
                                ],
                                [
                                    'title' => 'Perubahan Kebijakan Privasi',
                                    'content' =>
                                        'Menpy AI berhak untuk memperbarui kebijakan privasi ini kapan saja. Perubahan akan diberlakukan setelah dipublikasikan di platform, dan penggunaan layanan setelah perubahan dianggap sebagai persetujuan terhadap kebijakan yang diperbarui.',
                                ],
                                [
                                    'title' => 'Kontak Kami',
                                    'content' =>
                                        'Jika kamu memiliki pertanyaan atau kekhawatiran tentang kebijakan privasi ini, silakan hubungi kami melalui email di support@menpyai.com.',
                                ],
                            ];

                        @endphp

                        <div class="space-y-6">
                            @foreach ($privacyPolicies as $index => $policy)
                                <div class="border-b border-gray-200 pb-6 last:border-b-0 last:pb-0">
                                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $index + 1 }}.
                                        {{ $policy['title'] }}</h2>
                                    <p class="text-gray-600">{{ $policy['content'] }}</p>
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
