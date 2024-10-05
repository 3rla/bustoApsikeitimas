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

    <section class="container p-6 mx-auto">
        <!-- Search and Filter -->
        <div class="flex justify-center my-6">
            <div class="flex items-center w-full max-w-md">
                <input type="text" placeholder="Search"
                    class="w-full px-4 py-2 border rounded-l-lg focus:outline-none">
                <button class="px-4 py-2 text-white bg-blue-500 rounded-r-lg">Filter</button>
            </div>
        </div>

        {{-- <!-- Categories with Scroll -->
        <div class="grid grid-cols-3 gap-2 py-4 overflow-x-auto sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8">
            <div class="text-center min-w-[100px]">
                <div class="w-16 h-16 mx-auto bg-gray-300 rounded-full"></div>
                <p class="mt-1 text-sm">Loft</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="w-16 h-16 mx-auto bg-gray-300 rounded-full"></div>
                <p class="mt-1 text-sm">Mountain House</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="w-16 h-16 mx-auto bg-gray-300 rounded-full"></div>
                <p class="mt-1 text-sm">Beach House</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="w-16 h-16 mx-auto bg-gray-300 rounded-full"></div>
                <p class="mt-1 text-sm">Cabin</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="w-16 h-16 mx-auto bg-gray-300 rounded-full"></div>
                <p class="mt-1 text-sm">Villa</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="w-16 h-16 mx-auto bg-gray-300 rounded-full"></div>
                <p class="mt-1 text-sm">Condo</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="w-16 h-16 mx-auto bg-gray-300 rounded-full"></div>
                <p class="mt-1 text-sm">Cardboard box</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="w-16 h-16 mx-auto bg-gray-300 rounded-full"></div>
                <p class="mt-1 text-sm">Garbage bin</p>
            </div>
        </div> --}}

        <!-- Discover Most Popular Cities -->
        <section class="my-10">
            <h2 class="mb-4 text-2xl font-semibold">Discover Most Popular Cities</h2>
            <div class="grid grid-cols-2 gap-6 md:grid-cols-4">
                <div class="w-full h-40 bg-gray-300"></div>
                <div class="w-full h-40 bg-gray-300"></div>
                <div class="w-full h-40 bg-gray-300"></div>
                <div class="w-full h-40 bg-gray-300"></div>
            </div>
            <a href="{{ route('view-more') }}"
                class="inline-block px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">View More</a>
        </section>

        <!-- See Who's Searching in Your City -->
        <section class="my-10">
            <h2 class="mb-4 text-2xl font-semibold">See Who's Searching in Your City</h2>
            <div class="grid grid-cols-2 gap-6 md:grid-cols-4">
                <div class="w-full h-40 bg-gray-300"></div>
                <div class="w-full h-40 bg-gray-300"></div>
                <div class="w-full h-40 bg-gray-300"></div>
                <div class="w-full h-40 bg-gray-300"></div>
            </div>
            <a href="{{ route('view-more') }}"
                class="inline-block px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">View More</a>
        </section>

        <!-- Looking for a Long-Term Exchange -->
        <section class="my-10">
            <h2 class="mb-4 text-2xl font-semibold">Looking for a Long-Term Exchange</h2>
            <div class="grid grid-cols-2 gap-6 md:grid-cols-4">
                <div class="w-full h-40 bg-gray-300"></div>
                <div class="w-full h-40 bg-gray-300"></div>
                <div class="w-full h-40 bg-gray-300"></div>
                <div class="w-full h-40 bg-gray-300"></div>
            </div>
            <a href="{{ route('view-more') }}"
                class="inline-block px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">View More</a>
        </section>
    </section>

    <!-- Footer -->
    <livewire:footer />
    @livewireScripts
</body>

</html>
