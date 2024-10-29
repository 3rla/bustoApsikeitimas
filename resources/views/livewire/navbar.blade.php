<div>
    <header x-data="{ isOpen: false }" class="bg-white shadow">
        <div class="px-2 mx-auto sm:px-4 lg:px-6">
            <div class="flex items-center justify-between h-16">
                <!-- Logo Section -->
                <div class="flex-shrink-0">
                    @if (Auth::check())
                        <a href="/dashboard">
                            <img class="w-8 h-8" src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo">
                        </a>
                    @else
                        <a href="/">
                            <img class="w-8 h-8" src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo">
                        </a>
                    @endif
                </div>

                <!-- Navigation Menu (Hidden on Mobile) -->
                <div class="items-center hidden space-x-4 md:flex">
                    @if (Auth::check())
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            @if ($isAdmin)
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700">
                                            Admin
                                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link href="{{ route('admin-panel') }}">
                                            {{ __('Admin Panel') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link href="{{ route('admin.users') }}">
                                            {{ __('Users') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link href="{{ route('admin.swaps') }}">
                                            {{ __('Swaps') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link href="{{ route('admin.reviews') }}">
                                            {{ __('Reviews') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link href="{{ route('admin.reports') }}">
                                            {{ __('Reports') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link href="{{ route('admin.listing-approvals') }}">
                                            {{ __('Listing Approvals') }}
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>
                            @endif
                        </div>
                        <div class="relative" x-data="{ isOpen: false, search: '' }" @click.away="isOpen = false">
                            <input type="text"
                                class="w-64 px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded-full focus:outline-none focus:bg-white focus:ring-2 focus:ring-indigo-400"
                                placeholder="Search users..." x-model="search"
                                @input.debounce.300ms="$wire.searchUsers(search)" @focus="isOpen = true">
                            <div x-show="isOpen && search.length > 0"
                                class="absolute z-50 w-full mt-2 bg-white rounded-md shadow-lg">
                                @foreach ($searchResults as $user)
                                    <a href="{{ route('user.profile', $user->id) }}"
                                        class="flex items-center px-4 py-3 cursor-pointer hover:bg-gray-100">
                                        <img src="{{ $user->profile_photo_url }}"
                                            alt="{{ $user->name }} {{ substr($user->last_name, 0, 1) . '.' }}"
                                            class="w-10 h-10 rounded-full">
                                        <span class="ml-4 text-sm text-gray-700">{{ $user->name }}
                                            {{ substr($user->last_name, 0, 1) . '.' }}</span>
                                    </a>
                                @endforeach
                                @if (count($searchResults) === 0)
                                    <div class="px-4 py-3 text-sm text-gray-700">No results found</div>
                                @endif
                            </div>
                        </div>
                        <a href="/dashboard"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 border-b-2 border-transparent hover:border-gray-300">
                            Home
                        </a>
                    @else
                        <a href="/"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 border-b-2 border-transparent hover:border-gray-300">
                            Home
                        </a>
                    @endif
                    <a href="/how-it-works"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 border-b-2 border-transparent hover:border-gray-300">
                        How It Works
                    </a>
                    @if (Auth::check())
                        <a href="{{ route('my-houses') }}"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 border-b-2 border-transparent hover:border-gray-300">
                            My Houses
                        </a>
                        <a href="{{ route('profile.show') }}"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 border-b-2 border-transparent hover:border-gray-300">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 border-b-2 border-transparent hover:border-gray-300">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('register') }}"
                            class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">Register</a>
                        <a href="{{ route('login') }}"
                            class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">Login</a>
                    @endif
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button @click="isOpen = !isOpen" class="text-gray-500 hover:text-gray-600 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                        class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">Home</a>
                @else
                    <a href="/"
                        class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">Home</a>
                @endif
                <a href="/how-it-works"
                    class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">How
                    It Works</a>
                @if (Auth::check())
                    <a href="{{ route('my-houses') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">My
                        Houses</a>
                    <a href="{{ route('profile.show') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full px-3 py-2 text-base font-medium text-left text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('register') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">Register</a>
                    <a href="{{ route('login') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">Login</a>
                @endif
            </div>
        </div>
    </header>
</div>
