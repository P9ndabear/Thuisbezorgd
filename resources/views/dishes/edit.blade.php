<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerecht Bewerken') }}: {{ $dish->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-600 text-red-700 dark:text-red-200 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">{{ __('Oeps! Er ging iets mis.') }}</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('dishes.update', $dish) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Name --}}
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Naam') }}</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $dish->name) }}" required
                                   class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Beschrijving') }}</label>
                            <textarea name="description" id="description" rows="4" required
                                      class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $dish->description) }}</textarea>
                        </div>

                        {{-- Price --}}
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Prijs') }}</label>
                            <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price', $dish->price) }}" required
                                   class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        {{-- Current Image --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Huidige Afbeelding') }}</label>
                            @if($dish->image)
                                <img src="{{ Storage::url($dish->image) }}" alt="{{ $dish->name }}" class="mt-1 h-32 w-auto rounded-md object-cover">
                                <label class="mt-2 flex items-center">
                                    <input type="checkbox" name="keep_image" value="1" checked class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-indigo-500">
                                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Huidige afbeelding behouden') }}</span>
                                </label>
                            @else
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ __('Geen afbeelding ingesteld.') }}</p>
                            @endif
                        </div>

                        {{-- New Image --}}
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Nieuwe Afbeelding (optioneel)') }}</label>
                            <input type="file" name="image" id="image"
                                   class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-md file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-indigo-50 dark:file:bg-indigo-900 file:text-indigo-700 dark:file:text-indigo-300
                                          hover:file:bg-indigo-100 dark:hover:file:bg-indigo-800">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ __('Laat leeg om de huidige afbeelding te behouden (als aangevinkt) of te verwijderen (als niet aangevinkt).') }}</p>
                        </div>

                        {{-- Is Available --}}
                        <div class="mb-4">
                            <label for="is_available" class="flex items-center">
                                <input type="checkbox" name="is_available" id="is_available" {{ old('is_available', $dish->is_available) ? 'checked' : '' }}
                                       class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-indigo-500">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Beschikbaar') }}</span>
                            </label>
                        </div>

                        {{-- Buttons --}}
                        <div class="flex justify-end mt-6">
                            <a href="{{ route('dishes.index') }}" class="mr-4 inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-500 active:bg-gray-400 dark:active:bg-gray-400 focus:outline-none focus:border-gray-500 focus:ring focus:ring-gray-300 dark:focus:ring-gray-700 disabled:opacity-25 transition">
                                {{ __('Annuleren') }}
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                                {{ __('Wijzigingen Opslaan') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 