<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View More</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <x-cookie-banner />

    <!-- Navbar -->
    <livewire:navbar />

    <section class="container p-6 mx-auto">
        <livewire:search-bar />
    </section>

    <section class="container py-12 mx-auto">
        <!-- Housing Grid Section -->
        @livewire('home-listings')
    </section>

    <!-- Footer -->
    <livewire:footer />
    @livewireScripts
</body>

</html>
