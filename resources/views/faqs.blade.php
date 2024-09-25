<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <livewire:navbar />

    <!-- FAQ Section -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900">FAQs</h1>
            <p class="mt-4 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nunc maximus nulla ut
                commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat.</p>

            <!-- FAQ Items -->
            <div class="mt-8 space-y-4">
                <livewire:faq-list />
            </div>

            <div class="mt-12">
                <h3 class="text-lg font-semibold">Still have questions?</h3>
                <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet, consectetur.</p>
                <a href="#"
                    class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Contact</a>
            </div>
            @livewireScripts
        </div>
    </section>

    <!-- Footer -->
    <livewire:footer />

</body>

</html>
