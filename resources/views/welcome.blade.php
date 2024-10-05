<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="text-gray-800 bg-gray-100">

    <!-- Navbar -->
    <livewire:navbar />

    <!-- Hero Section -->
    <section class="py-12 bg-gray-50">
        <div class="flex items-center px-2 mx-auto max-w-7xl sm:px-4 lg:px-6">
            <!-- Text Content (Left Side) -->
            <div class="w-full text-left lg:w-1/2">
                <h1 class="text-4xl font-extrabold text-gray-900">
                    Find Your Perfect Home Exchange
                </h1>
                <p class="mt-4 text-lg text-gray-500">
                    Discover new places by swapping homes with others. Start exploring today!
                </p>
                <div class="mt-6">
                    <a href="#" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Learn
                        More</a>
                    @guest
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 ml-4 text-gray-900 border border-gray-300 rounded-md hover:bg-gray-100">Sign
                            In</a>
                    @endguest
                </div>
            </div>

            <!-- Hero Image (Right Side) -->
            <div class="flex justify-end w-full lg:w-1/2">
                <div class="w-full h-64 bg-gray-200 lg:h-96"></div> <!-- Image Placeholder -->
            </div>
        </div>
    </section>

    <!-- Explore Homes Section -->
    <section class="py-12">
        <div class="px-2 mx-auto text-center max-w-7xl sm:px-4 lg:px-6">
            <h2 class="text-3xl font-bold text-gray-900">Explore Homes Waiting For You</h2>
            <p class="mt-4 text-gray-500">Discover unique homes across different cities for your next stay.</p>
            <div class="grid grid-cols-1 gap-6 mt-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
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
        <div class="px-2 mx-auto text-center max-w-7xl sm:px-4 lg:px-6">
            <h2 class="text-3xl font-bold text-gray-900">User Experiences</h2>
            <div class="grid grid-cols-1 gap-6 mt-8 sm:grid-cols-2 md:grid-cols-3">
                <!-- User Reviews -->
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="User 1">
                        </div>
                        <div class="ml-4 text-left">
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
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="User 2">
                        </div>
                        <div class="ml-4 text-left">
                            <h4 class="text-lg font-bold">User 2</h4>
                            <p class="text-sm text-gray-500">Another City</p>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-500">Had a wonderful time, will do it again!</p>
                    <div class="mt-2">
                        <span class="text-yellow-400">&#9733;</span>
                        <span class="text-yellow-400">&#9733;</span>
                        <span class="text-yellow-400">&#9733;</span>
                        <span class="text-yellow-400">&#9733;</span>
                        <span class="text-gray-300">&#9733;</span>
                    </div>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="User 3">
                        </div>
                        <div class="ml-4 text-left">
                            <h4 class="text-lg font-bold">User 3</h4>
                            <p class="text-sm text-gray-500">Yet Another City</p>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-500">Great experience, highly recommended!</p>
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
    <livewire:footer />
    @livewireScripts
</body>

</html>
