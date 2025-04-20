<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Pizza Bestellijn') }} - Contactbericht Bekijken</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        @include('partials.dashboard-navigation')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-semibold">Contactbericht Bekijken</h2>
                            <a href="{{ route('admin.contact-messages.index') }}" class="text-orange-600 hover:text-orange-900 dark:text-orange-400 dark:hover:text-orange-300">
                                Terug naar overzicht
                            </a>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Naam</h3>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $message->name }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">E-mail</h3>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $message->email }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Onderwerp</h3>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $message->subject }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Ontvangen op</h3>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $message->created_at->format('d-m-Y H:i') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Bericht</h3>
                            <p class="text-sm text-gray-900 dark:text-gray-100 whitespace-pre-wrap">{{ $message->message }}</p>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" onclick="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?')">
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html> 