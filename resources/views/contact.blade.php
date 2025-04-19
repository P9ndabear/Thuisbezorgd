<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Pizza Bestellijn') }} - Contact</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        
        @include('partials.navigation')

        <!-- Main Content Area -->
        <div class="max-w-2xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Contact</h1>
            
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Naam</label>
                        <input type="text" name="name" id="name" required 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mailadres</label>
                        <input type="email" name="email" id="email" required 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Onderwerp</label>
                        <input type="text" name="subject" id="subject" required 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bericht</label>
                        <textarea name="message" id="message" rows="4" required 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
                    </div>

                    <div>
                        <button type="submit" 
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                            Verstuur bericht
                        </button>
                    </div>
                </form>

                <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-8">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Contactgegevens</h2>
                    <div class="space-y-3 text-gray-600 dark:text-gray-400">
                        <p>
                            <strong class="text-gray-700 dark:text-gray-300">Adres:</strong><br>
                            Voorbeeldstraat 123<br>
                            1234 AB Amsterdam
                        </p>
                        <p>
                            <strong class="text-gray-700 dark:text-gray-300">Telefoon:</strong><br>
                            020-1234567
                        </p>
                        <p>
                            <strong class="text-gray-700 dark:text-gray-300">E-mail:</strong><br>
                            info@pizzabestellijn.nl
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html> 