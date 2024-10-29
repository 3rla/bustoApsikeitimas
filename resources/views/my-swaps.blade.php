<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Swaps</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <x-cookie-banner />

    <!-- Navbar -->
    <livewire:navbar />

    <livewire:user-swaps />

    <!-- Footer -->
    <livewire:footer />
    @livewireScripts
</body>

</html>
