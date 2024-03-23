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
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="relative min-h-screen bg-dots-darker bg-center bg-gray-200 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white overflow-x-hidden bg-[url('../images/bg.jpg')] bg-cover bg-blend-overlay">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/" wire:navigate>
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
    
            <div
                class="w-full flex space-x-2 sm:max-w-3xl min-h-[350px] border-2 border-t-red-400 mt-6 px-1 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-2xl">
    
                <div class="md:w-1/2 bg-cover rounded-lg bg-[url('../images/login.jpg')]">
    
                </div>
                <div class="sm:w-full md:w-1/2 md:px-2">
                    {{ $slot }}
    
                </div>
            </div>
        </div>

    </div>
</body>

</html>
