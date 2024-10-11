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

    <!-- Listing Details Component -->
    <livewire:listing-details :id="$id" />

    <!-- Reviews Section -->
    <div class="mt-8">
        <livewire:listing-reviews :listingId="$id" />
    </div>

    <!-- Footer -->
    <livewire:footer />
    @livewireScripts
</body>

</html>
