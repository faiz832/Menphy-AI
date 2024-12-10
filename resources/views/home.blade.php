<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Menpy AI</title>

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

<body class="bg-white">
    <!-- Navbar -->
    <x-navbar />

    <!-- Hero Section -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div
            class="relative min-h-[calc(100vh-100px)] my-2 bg-white rounded-3xl shadow-lg lg:shadow-none overflow-hidden">
            <img src="{{ asset('assets/images/hero-img.jpeg') }}" alt="hero-img" loading="lazy"
                class="absolute top-0 right-0 w-full lg:w-1/2 h-full object-cover lg:object-right rounded-3xl">
            <div
                class="hidden lg:flex flex-col gap-6 absolute bottom-12 right-12 w-96 h-max bg-white bg-opacity-50 backdrop-blur-lg rounded-xl p-4">
                <div class="flex justify-between items-center">
                    <p class="text-xl font-bold tracking-tighter">Diagnosis Everyday</p>
                    <p class="text-sm font-bold tracking-tighter mr-2">More 5k users</p>
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-xs w-1/2 font-medium">
                        Jadilah bagian dari Menpy AI untuk kesehatan mentalmu!
                    </p>
                    <div class="flex bg-white rounded-full p-1 overflow-hidden">
                        <img src="{{ asset('assets/images/Avatar1.png') }}" class="w-9" alt="">
                        <img src="{{ asset('assets/images/Avatar2.png') }}" class="-ml-4 w-9" alt="">
                        <img src="{{ asset('assets/images/Avatar3.png') }}" class="-ml-4 w-9" alt="">
                        <img src="{{ asset('assets/images/Avatar4.png') }}" class="-ml-4 w-9" alt="">
                    </div>
                </div>
            </div>
            <div class="absolute top-0 left-0 w-full h-full flex items-center">
                <div class="px-4 md:px-8 w-3/4 md:max-w-lg lg:max-w-xl xl:max-w-2xl text-white lg:text-black">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl xl:text-7xl font-bold tracking-tighter">
                        Take care of your mentality with Menpy AI
                    </h1>
                    <p class="max-w-sm my-6">
                        Seimbangankan Mental Anda dengan Diagnosis Cepat dan Rekomendasi
                        Terpersonalisasi
                    </p>
                    <div class="">
                        <a href="{{ route('front.diagnosis.index') }}"
                            class="w-max flex items-center gap-4 font-semibold text-center text-base tracking-tighter lg:text-lg rounded-full ps-4 pe-2 py-2 text-white bg-gray-900 hover:bg-gray-700 transition group">
                            Start Diagnosis
                            <div class="bg-white rounded-full p-1 lg:p-2 text-black">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 rotate-180 group-hover:translate-x-1 transition-all" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 19l-7-7 7-7M4 12h16">
                                    </path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Section -->
    <div class="py-12 md:py-24 xl:py-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold tracking-tighter text-center">
                Diagnosis Your Mental Health
            </h1>
            <p class="my-6 md:max-w-xl lg:max-w-2xl text-sm lg:text-base mx-auto text-center">
                Yuk, pelajari langkah-langkah gampang buat pakai Menpy AI bareng video tutorial ini, biar kamu makin
                paham dan bisa langsung jago gunain fiturnya!
            </p>

            <div
                class="mt-10 md:mt-20 mx-auto aspect-[0.75] w-full overflow-hidden px-20 pt-12 bg-gradient-to-r from-cyan-400 via-sky-500 to-purple-500 rounded-3xl
                            md:aspect-[1.9] md:px-20 md:pt-20 
                            lg:aspect-[1.9] lg:px-24 lg:pt-24
                            min-[1536px]:w-[min(80vw,1920px)] drop-shadow-2xl">
                <div class="relative h-full w-full overflow-hidden">
                    <video class="hidden md:flex h-full w-full select-none rounded-t-2xl object-cover object-left-top"
                        autoplay muted loop playsinline disablepictureinpicture disableremoteplayback
                        poster="{{ asset('assets/images/poster-desktop.png') }}">
                        <source type="video/mp4" src="{{ asset('assets/videos/demo-desktop.mp4') }}">
                    </video>
                    <video class="flex md:hidden h-full w-full select-none rounded-t-2xl object-cover object-left-top"
                        autoplay muted loop playsinline disablepictureinpicture disableremoteplayback
                        poster="{{ asset('assets/images/poster-mobile.jpg') }}">
                        <source type="video/mp4" src="{{ asset('assets/videos/demo-mobile.mp4') }}">
                    </video>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="pb-12 md:pb-24 xl:pb-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-6 justify-between md:items-center">
                <h1 class="text-5xl lg:text-6xl xl:text-7xl font-bold tracking-tighter">Special Features
                </h1>
                <p class="md:text-sm text-base md:w-1/2 text-justify font-semibold">
                    Kenalan sama fitur spesial Menpy AI yang nggak cuma canggih, tapi juga dibuat khusus
                    buat bantuin kamu jadi versi terbaik dari diri sendiri!
                </p>
            </div>
            @php
                $features = [
                    [
                        'title' => 'Diagnosis Mandiri',
                        'description' =>
                            'Dapatkan hasil diagnosis awal yang akurat hanya dengan menjawab beberapa pertanyaan sederhana.',
                        'image' => 'assets/images/feature-1.jpg',
                        'size' => 'lg:col-span-3 lg:row-span-2',
                    ],
                    [
                        'title' => 'Rekomendasi AI',
                        'description' =>
                            'AI kami memberikan rekomendasi terapi yang personal dan sesuai kebutuhan kamu.',
                        'image' => 'assets/images/feature-2.jpg',
                        'size' => 'lg:col-span-2 lg:row-span-2',
                    ],
                    [
                        'title' => 'Terapi Mandiri',
                        'description' =>
                            'Pantau dan evaluasi perkembangan kesehatan mentalmu secara berkala dengan fitur.',
                        'image' => 'assets/images/feature-3.jpg',
                        'size' => 'lg:col-span-2 lg:row-span-2',
                    ],
                    [
                        'title' => 'Artikel Kesehatan',
                        'description' =>
                            'Perbanyak wawasan dengan artikel informatif yang membahas kesehatan mental secara mendalam.',
                        'image' => 'assets/images/feature-4.jpg',
                        'size' => 'lg:col-span-3 lg:row-span-2',
                    ],
                ];
            @endphp

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                @foreach ($features as $feature)
                    <div class="relative overflow-hidden rounded-xl group h-80 {{ $feature['size'] }}">
                        <div class="absolute inset-0 bg-cover bg-center"
                            style="background-image: url('{{ $feature['image'] }}')">
                            {{-- <div class="absolute inset-0 bg-black bg-opacity-50"></div> --}}
                            <div class="absolute inset-0 bg-gradient-to-r from-sky-600 bg-opacity-25"></div>
                            <div class="absolute inset-0 flex flex-col justify-end p-4">
                                <h2 class="text-5xl font-bold text-white tracking-tighter mb-4">{{ $feature['title'] }}
                                </h2>
                                @if ($feature['description'])
                                    <p class="w-2/3 text-white text-opacity-90 text-sm">
                                        {{ $feature['description'] }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl sm:text-5xl md:text-6xl xl:text-7xl tracking-tighter font-bold text-center">
            What users love about us.
        </h1>
        <div class="relative flex flex-col flex-wrap mt-24 gap-8">
            <div class="w-full columns-1 md:columns-2 lg:columns-3 xl:columns-4 gap-8">
                @php
                    $testimonials = [
                        [
                            'name' => 'Raka Wiratama',
                            'username' => '@rakawira',
                            'image' => 'assets/images/Avatar1.png',
                            'message' => 'AI Assistant-nya bikin saya lebih paham tentang pentingnya kesehatan mental.',
                        ],
                        [
                            'name' => 'Maya Pranindya',
                            'username' => '@mayapran',
                            'image' => 'assets/images/Avatar2.png',
                            'message' =>
                                'Sejak pakai Menpy AI, saya jadi lebih percaya diri untuk mengelola stres dan emosi. Fitur meditasi hariannya sangat membantu menenangkan pikiran. Interface yang user-friendly membuat penggunaan aplikasi menjadi sangat menyenangkan.',
                        ],
                        [
                            'name' => 'Bayu Setiawan',
                            'username' => '@bayuset',
                            'image' => 'assets/images/Avatar3.png',
                            'message' =>
                                'Fitur diagnosis mandirinya membantu saya memahami kondisi saya tanpa perlu langsung ke profesional.',
                        ],
                        [
                            'name' => 'Ayu Kartika',
                            'username' => '@ayukartk',
                            'image' => 'assets/images/Avatar4.png',
                            'message' =>
                                'Artikel-artikelnya sangat informatif dan membantu saya memahami berbagai topik tentang kesehatan mental. Saya jadi lebih aware tentang pentingnya self-care. Terima kasih Menpy AI!',
                        ],
                        [
                            'name' => 'Fajar Nugroho',
                            'username' => '@fajarnugra',
                            'image' => 'assets/images/Avatar5.png',
                            'message' => 'Menpy AI benar-benar seperti teman yang selalu ada untuk membantu.',
                        ],
                        [
                            'name' => 'Sinta Lestari',
                            'username' => '@sintalest',
                            'image' => 'assets/images/Avatar6.png',
                            'message' =>
                                'Rekomendasi terapinya sangat sesuai dan mudah dilakukan sendiri di rumah. Saya merasakan perubahan positif dalam waktu singkat. Aplikasi ini benar-benar mengubah cara saya memandang kesehatan mental.',
                        ],
                        [
                            'name' => 'Alif Ramadhan',
                            'username' => '@aliframadh',
                            'image' => 'assets/images/Avatar7.png',
                            'message' =>
                                'Berkat Menpy AI, saya bisa mengidentifikasi masalah dan mendapatkan solusi dengan lebih cepat.',
                        ],
                        [
                            'name' => 'Putri Anggita',
                            'username' => '@putrianggt',
                            'image' => 'assets/images/Avatar8.png',
                            'message' =>
                                'Fitur terapi mandirinya bikin saya merasa lebih berdaya. Sangat membantu untuk daily mental health check.',
                        ],
                        [
                            'name' => 'Dian Kusuma',
                            'username' => '@diankusuma',
                            'image' => 'assets/images/Avatar1.png',
                            'message' =>
                                'Pengalaman penggunaannya sangat intuitif dan mudah dimengerti. Bahkan untuk orang awam seperti saya.',
                        ],
                        [
                            'name' => 'Arif Nugraha',
                            'username' => '@arifnugraha',
                            'image' => 'assets/images/Avatar2.png',
                            'message' =>
                                'Menpy AI membantu saya mengatasi masalah overthinking yang sudah lama saya alami. Fitur journaling dan mood tracking-nya sangat membantu untuk mengidentifikasi pola pikir dan perasaan saya sehari-hari. Sekarang saya punya alat untuk mengelola kesehatan mental dengan lebih baik. Terima kasih Menpy AI telah menjadi partner setia dalam journey kesehatan mental saya.',
                        ],
                        [
                            'name' => 'Rani Anindita',
                            'username' => '@ranianind',
                            'image' => 'assets/images/Avatar3.png',
                            'message' =>
                                'Artikel-artikelnya sangat membantu saya belajar tentang cara menjaga kesehatan mental. Kontennya selalu up-to-date dan relevan dengan isu-isu terkini. Saya jadi lebih open-minded dan empati terhadap orang lain yang mungkin sedang berjuang dengan kesehatan mentalnya. Platform ini benar-benar memberikan edukasi yang komprehensif tentang pentingnya kesehatan mental.',
                        ],
                        [
                            'name' => 'Budi Santoso',
                            'username' => '@budisantoso',
                            'image' => 'assets/images/Avatar4.png',
                            'message' => 'Menpy AI membantu saya jadi lebih mindful setiap harinya.',
                        ],
                    ];
                @endphp
                @foreach ($testimonials as $index => $testimonial)
                    <div
                        class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8 
                                {{ $index >= 5 ? 'hidden' : '' }}
                                {{ $index == 5 ? 'hidden md:block' : '' }}
                                {{ $index > 5 ? 'hidden lg:block' : '' }}">
                        <div class="flex gap-4 items-center">
                            <img src="{{ asset($testimonial['image']) }}" alt="{{ $testimonial['name'] }}"
                                class="w-16 h-16 rounded-full object-cover object-center">
                            <div>
                                <h1 class="font-bold">
                                    {{ $testimonial['name'] }}
                                </h1>
                                <p class="text-gray-400">
                                    {{ $testimonial['username'] }}
                                </p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-900">
                            {{ $testimonial['message'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <div id="articles" class="pt-40 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="my-12 flex justify-between items-center">
                <h1 class="text-2xl md:text-3xl font-bold tracking-tighter">Related articles</h1>
                <a href="#articles"
                    class="text-xs px-3 py-2 font-semibold rounded-full border hover:bg-gray-100 transition">
                    Browse all articles
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($articles as $article)
                    <a href="{{ route('articles.show', $article->id) }}">
                        <div class="relative w-full md:h-80 lg:h-[500px] overflow-hidden rounded-2xl group">
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
                                class="w-full h-full object-cover rounded-2xl group-hover:scale-105 transition duration-300 ease-in-out"
                                loading="lazy">
                            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-black bg-opacity-25">
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

    <!-- Footer -->
    <x-footer />
</body>

</html>
