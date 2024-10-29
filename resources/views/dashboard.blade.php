<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="text-gray-800 bg-gray-100">
    <x-cookie-banner />

    <!-- Navbar -->
    <livewire:navbar />

    <section class="container p-6 mx-auto">
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

        <!-- See All Home listings -->
        <section class="my-10">
            <h2 class="mb-4 text-2xl font-semibold">See All Home listings</h2>
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
