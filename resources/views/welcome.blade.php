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

    <!-- Hero Section -->
    <livewire:hero-section />

    <!-- Explore Homes Section -->
    <livewire:explore-homes />

    <!-- User Experiences Section -->
    <section class="py-12 bg-gray-50">
        <div class="px-2 mx-auto text-center max-w-7xl sm:px-4 lg:px-6">
            <h2 class="text-3xl font-bold text-gray-900">User Experiences</h2>
            <livewire:random-reviews />
        </div>
    </section>

    <!-- Footer -->
    <livewire:footer />
    @livewireScripts
</body>

</html>
