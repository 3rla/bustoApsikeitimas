<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <livewire:navbar />

    <section class="container mx-auto p-6">
        <!-- Search and Filter -->
        <div class="flex justify-center my-6">
            <div class="flex items-center w-full max-w-md">
                <input type="text" placeholder="Search"
                    class="border px-4 py-2 w-full rounded-l-lg focus:outline-none">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-r-lg">Filter</button>
            </div>
        </div>

        <!-- Categories with Scroll -->
        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-2 py-4 overflow-x-auto">
            <!-- Category Items -->
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Loft</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Mountain House</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Beach House</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Cabin</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Villa</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Condo</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Cardboard box</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Garbage bin</p>
            </div>
        </div>

        <!-- Discover Most Popular Cities -->
        <section class="my-10">
            <h2 class="text-2xl font-semibold mb-4">Discover Most Popular Cities</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-gray-300 w-full h-40"></div>
                <div class="bg-gray-300 w-full h-40"></div>
                <div class="bg-gray-300 w-full h-40"></div>
                <div class="bg-gray-300 w-full h-40"></div>
            </div>
            <a href="{{ route('view-more') }}"
                class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg inline-block">View More</a>
        </section>

        <!-- See Who's Searching in Your City -->
        <section class="my-10">
            <h2 class="text-2xl font-semibold mb-4">See Who's Searching in Your City</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-gray-300 w-full h-40"></div>
                <div class="bg-gray-300 w-full h-40"></div>
                <div class="bg-gray-300 w-full h-40"></div>
                <div class="bg-gray-300 w-full h-40"></div>
            </div>
            <a href="{{ route('view-more') }}"
                class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg inline-block">View More</a>
        </section>

        <!-- Looking for a Long-Term Exchange -->
        <section class="my-10">
            <h2 class="text-2xl font-semibold mb-4">Looking for a Long-Term Exchange</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-gray-300 w-full h-40"></div>
                <div class="bg-gray-300 w-full h-40"></div>
                <div class="bg-gray-300 w-full h-40"></div>
                <div class="bg-gray-300 w-full h-40"></div>
            </div>
            <a href="{{ route('view-more') }}"
                class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg inline-block">View More</a>
        </section>
    </section>

    <!-- Footer -->
    <livewire:footer />
    @livewireScripts
</body>

</html>
