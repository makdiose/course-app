<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link 
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" 
            rel="stylesheet" 
        />

        <!-- Livewire Styles -->
        @livewireStyles

        <!-- Scripts (Vite) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>


   <body class="font-sans antialiased bg-gray-100 text-gray-900">
    <!-- Site Container -->
    <div class="min-h-screen flex flex-col">

        <!-- Top Navigation -->
        <header class="bg-white shadow z-50">
            <livewire:layouts.navigation />
        </header>

        <!-- Optional Page Header (only shows if $header is set) -->
        @if (isset($header))
            <div class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </div>
        @endif

        <!-- Main Content Area -->
        <main class="flex-1">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow-inner">
            <div class="max-w-7xl mx-auto py-4 px-4 text-center text-gray-500 text-sm">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </div>
        </footer>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>

</html>
