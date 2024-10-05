<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View More</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
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

        {{-- <!-- Category Section -->
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
    </section>
    <section class="container py-12 mx-auto">
        <!-- Housing Grid Section -->
        @livewire('home-listings')

        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            <button class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-l-md">1</button>
            <button class="px-4 py-2 bg-white border border-gray-300">2</button>
            <button class="px-4 py-2 bg-white border border-gray-300">3</button>
            <button class="px-4 py-2 bg-white border border-gray-300">4</button>
            <button class="px-4 py-2 bg-white border border-gray-300 rounded-r-md">Next</button>
        </div>
    </section>

    <!-- Footer -->
    <livewire:footer />
    @livewireScripts
</body>

</html>
