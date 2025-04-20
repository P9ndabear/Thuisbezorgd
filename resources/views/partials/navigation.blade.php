<!-- Simple Navigation -->
<nav class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left: Brand/Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold text-orange-500">
                    Pizza Bestellijn {{-- Or change to Domino's --}}
                </a>
            </div>

            <!-- Right: Navigation Links & Auth -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('home') ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }} transition duration-150 ease-in-out">
                    Home
                </a>
                <a href="{{ route('menu') }}" class="px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('menu') ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }} transition duration-150 ease-in-out">
                    Menu
                </a>
                <a href="{{ route('contact.show') }}" class="px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('contact.show') ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }} transition duration-150 ease-in-out">
                    Contact
                </a>

                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('dashboard') }}" class="px-3 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white rounded-md transition duration-150 ease-in-out">
                            Dashboard
                        </a>
                    @endif
                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-3 py-2 text-sm font-medium text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 rounded-md transition duration-150 ease-in-out">
                            Uitloggen
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white rounded-md transition duration-150 ease-in-out">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-2 px-3 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white rounded-md transition duration-150 ease-in-out">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</nav> 