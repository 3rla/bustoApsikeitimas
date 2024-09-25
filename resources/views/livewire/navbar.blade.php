<div>
    <header x-data="{ isOpen: false }" class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-6">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo Section -->
                <div class="flex-shrink-0">
                    @if (Auth::check())
                        <a href="/dashboard">
                            <img class="h-8 w-8" src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo">
                        </a>
                    @else
                        <a href="/">
                            <img class="h-8 w-8" src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo">
                        </a>
                    @endif
                </div>

                <!-- Navigation Menu (Hidden on Mobile) -->
                <div class="hidden md:flex items-center space-x-4">
                    @if (Auth::check())
                        <a href="/dashboard"
                            class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gray-300 text-sm font-medium">
                            Home
                        </a>
                    @else
                        <a href="/"
                            class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gray-300 text-sm font-medium">
                            Home
                        </a>
                    @endif
                    <a href="/how-it-works"
                        class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gray-300 text-sm font-medium">
                        How It Works
                    </a>
                    @if (Auth::check())
                        <a href="{{ route('profile.show') }}"
                            class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gray-300 text-sm font-medium">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gray-300 text-sm font-medium">
                                Logout
                            </button>
                        </form>
                        <a href=""
                            class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gray-300 text-sm font-medium">
                            <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                </path>
                            </svg>
                            <span>{{ number_format(Auth::user()->wallet_balance, 2) }}€</span>
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                            class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Register</a>
                        <a href="{{ route('login') }}"
                            class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Sign
                            In</a>
                    @endif
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="isOpen = !isOpen" class="text-gray-500 hover:text-gray-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isOpen" @click.away="isOpen = false" class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                @if (Auth::check())
                    <a href="/dashboard"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Home</a>
                @else
                    <a href="/"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Home</a>
                @endif
                <a href="/how-it-works"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">How
                    It Works</a>
                @if (Auth::check())
                    <a href="{{ route('profile.show') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                            Logout
                        </button>
                    </form>
                    <div class="px-3 py-2">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                </path>
                            </svg>
                            <span class="text-gray-900">{{ number_format(Auth::user()->wallet_balance, 2) }}€</span>
                        </div>
                    </div>
                @else
                    <a href="{{ route('register') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Register</a>
                    <a href="{{ route('login') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Sign
                        In</a>
                @endif
            </div>
        </div>
    </header>
</div>
