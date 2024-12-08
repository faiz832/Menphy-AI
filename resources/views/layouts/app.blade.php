<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        <!-- Navbar -->
        <x-navbar />

        <div class="flex">
            <div class="w-full max-w-7xl relative flex items-start mx-auto py-4 lg:py-8 px-4 sm:px-6 lg:px-8 gap-8">
                <!-- Sidebar -->
                <x-sidebar-dashboard />

                <div class="w-full min-h-screen lg:w-5/6 flex flex-col gap-6 pb-8">
                    <!-- Content -->
                    {{ $slot }}
                </div>
            </div>
        </div>

        <!-- Footer -->
        <x-footer />
    </div>
</body>

</html>
