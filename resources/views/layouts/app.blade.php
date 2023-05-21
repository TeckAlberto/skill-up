<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            @auth
                @if (auth()->user()->rol === 2 && !auth()->user()->perfilCompletado())
                    <p class="flex items-center justify-center w-screen font-bold text-center bg-yellow-300 border-2 text-slate-50 border-amber-400 text-md">
                        Se aconseja que termine de completar su perfil
                    </p>

                @elseif(auth()->user()->rol === 1 && !auth()->user()->perfilCompletado())
                    <p class="flex items-center justify-center w-screen font-bold text-center bg-yellow-300 border-2 text-slate-50 border-amber-400 text-md">
                        Se aconseja que termine de completar su perfil
                    </p>
                @endif
            @endauth

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
        @stack('scripts')

    </body>
</html>
