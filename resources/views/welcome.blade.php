<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Pizza Bestellijn') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        
        @include('partials.navigation')

        <!-- Main Content Area - Added padding-top to account for sticky nav -->
        <div class="relative min-h-screen flex flex-col items-center justify-center pt-16">
            {{-- Removed old absolute positioned auth links --}}

            <!-- Main Content -->
            <div class="text-center px-4">
                <h1 class="text-5xl sm:text-6xl md:text-7xl font-bold text-gray-800 dark:text-white mb-8">
                    Welkom bij Domino's
                </h1>
                <img src="https://img.freepik.com/free-photo/top-view-pepperoni-pizza-with-mushroom-sausages-bell-pepper-olive-corn-black-wooden_141793-2158.jpg?w=996&t=st=1712752427~exp=1712753027~hmac=4d538201cfde2e485a8f63a3251e35590ae9e9c9a801a3a8cf51f679c2c096b3" 
                     alt="Pizza" 
                     class="w-64 h-64 sm:w-80 sm:h-80 md:w-96 md:h-96 object-cover rounded-full mx-auto shadow-lg border-4 border-white dark:border-gray-700">
            
                 {{-- Optional Link to Menu --}}
                 <div class="mt-8">
                     <a href="{{ route('menu') }}" 
                        class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-full text-lg transition duration-150 ease-in-out">
                         Bekijk ons menu
                     </a>
                 </div>
            </div>
        </div>
    </body>
</html>
