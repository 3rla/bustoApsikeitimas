<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-6">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo Section -->
                <div class="flex-shrink-0">
                    <a href="/">
                        <img class="h-8 w-8" src="/logo.svg" alt="Logo">
                    </a>
                </div>

                <!-- Navigation Menu (Hidden on Mobile) -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#"
                        class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gray-300 text-sm font-medium">
                        Home
                    </a>
                    <a href="#"
                        class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gray-300 text-sm font-medium">
                        How It Works
                    </a>
                    <a href="{{ route('register') }}"
                        class="text-white inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md bg-blue-600 hover:bg-blue-700">
                        Register
                    </a>
                    <a href="{{ route('login') }}"
                        class="text-gray-900 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium hover:bg-gray-100">
                        Sign In
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Home</a>
                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">How
                    It Works</a>
                <a href="{{ route('register') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Register</a>
                <a href="{{ route('login') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Sign
                    In</a>
            </div>
        </div>
    </header>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            var mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <!-- Hero Section -->
    <section class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-6 flex items-center">
            <!-- Text Content (Left Side) -->
            <div class="w-full lg:w-1/2 text-left">
                <h1 class="text-4xl font-extrabold text-gray-900">
                    Find Your Perfect Home Exchange
                </h1>
                <p class="mt-4 text-lg text-gray-500">
                    Discover new places by swapping homes with others. Start exploring today!
                </p>
                <div class="mt-6">
                    <a href="#" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md">Learn
                        More</a>
                    <a href="/signup"
                        class="ml-4 text-gray-900 border border-gray-300 px-4 py-2 rounded-md hover:bg-gray-100">Sign
                        Up</a>
                </div>
            </div>

            <!-- Hero Image (Right Side) -->
            <div class="w-full lg:w-1/2 flex justify-end">
                <div class="w-full h-64 lg:h-96 bg-gray-200"></div> <!-- Image Placeholder -->
            </div>
        </div>
    </section>

    <!-- Explore Homes Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-900">Explore Homes Waiting For You</h2>
            <p class="mt-4 text-gray-500">Discover unique homes across different cities for your next stay.</p>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Home Image Placeholders -->
                <div class="w-full h-40 bg-gray-200"></div>
                <div class="w-full h-40 bg-gray-200"></div>
                <div class="w-full h-40 bg-gray-200"></div>
                <div class="w-full h-40 bg-gray-200"></div>
                <div class="w-full h-40 bg-gray-200"></div>
            </div>
        </div>
    </section>

    <!-- User Experiences Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-900">User Experiences</h2>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- User Review 1 -->
                <div class="p-6 bg-white shadow-md rounded-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="/user1.jpg" alt="User 1">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-bold">User 1</h4>
                            <p class="text-sm text-gray-500">City Name</p>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-500">Amazing experience! Highly recommend.</p>
                    <div class="mt-2">
                        <span class="text-yellow-400">&#9733;</span>
                        <span class="text-yellow-400">&#9733;</span>
                        <span class="text-yellow-400">&#9733;</span>
                        <span class="text-yellow-400">&#9733;</span>
                        <span class="text-gray-300">&#9733;</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-100 dark:border-gray-700 mt-auto">
        <div class="max-w-7xl mx-auto py-6 px-2 sm:px-4 lg:px-6">
            <div class="flex justify-center space-x-4">
                <a href="#" class="text-gray-500 hover:text-gray-900">How it works</a>
                <a href="#" class="text-gray-500 hover:text-gray-900">About Us</a>
                <a href="#" class="text-gray-500 hover:text-gray-900">FAQs</a>
                <a href="#" class="text-gray-500 hover:text-gray-900">Email Us</a>
            </div>
            <p class="mt-4 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} Laravel. All rights reserved.
            </p>
        </div>
    </footer>

</body>

</html>
