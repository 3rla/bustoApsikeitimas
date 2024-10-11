<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Swaps</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <livewire:navbar />

    <!-- Admin Users CRUD -->
    @livewire('admin-swaps-table')

    <!-- Footer -->
    {{-- <livewire:footer /> --}}
    @livewireScripts
</body>

</html>
