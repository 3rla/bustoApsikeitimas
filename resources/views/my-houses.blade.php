<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Houses</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="text-gray-800 bg-gray-100">
    <x-cookie-banner />

    <!-- Navbar -->
    <livewire:navbar />

    <div class="container mx-auto my-8">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <!-- Add House Component -->
            <div class="p-6 bg-white rounded shadow-md">
                @livewire('add-house')
            </div>

            <!-- Listed House Component -->
            <div class="p-6 bg-white rounded shadow-md">
                @livewire('listed-houses')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <livewire:footer />

</body>

</html>
