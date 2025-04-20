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
                <h1 class="text-5xl sm:text-6xl md:text-7xl font-bold text-orange-500 mb-4">
                    Welkom bij Domino's
                </h1>
                <p class="text-xl sm:text-2xl text-gray-600 dark:text-gray-300 mb-8">
                    De lekkerste pizza's bestel je bij ons
                </p>
                <img src="https://img.freepik.com/free-photo/top-view-pepperoni-pizza-with-mushroom-sausages-bell-pepper-olive-corn-black-wooden_141793-2158.jpg?w=996&t=st=1712752427~exp=1712753027~hmac=4d538201cfde2e485a8f63a3251e35590ae9e9c9a801a3a8cf51f679c2c096b3" 
                     alt="Pizza" 
                     class="w-64 h-64 sm:w-80 sm:h-80 md:w-96 md:h-96 object-cover rounded-full mx-auto shadow-lg border-4 border-white dark:border-gray-700">
            
                 {{-- Optional Link to Menu --}}
                 <div class="mt-16 flex flex-col items-center justify-center gap-y-16">
                     <a href="{{ route('menu') }}" style="background-color: #FF4B12; min-width: 400px;" class="inline-flex items-center justify-center rounded-lg px-24 py-6 text-xl font-semibold text-white shadow-sm transition-all duration-200 hover:brightness-95 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"><span class="mx-8">Bekijk ons menu</span></a>
                     <a href="{{ route('contact.show') }}" style="background-color: #FF4B12; min-width: 400px;" class="inline-flex items-center justify-center rounded-lg px-24 py-6 text-xl font-semibold text-white shadow-sm transition-all duration-200 hover:brightness-95 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"><span class="mx-8">Contact</span></a>
                 </div>
            </div>
        </div>
    </body>
</html>
