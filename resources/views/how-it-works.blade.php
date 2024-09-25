<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How it works</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <livewire:navbar />

    <!-- Main How It Works Section -->
    <section class="container mx-auto my-16 max-w-4xl">
        <h1 class="text-center text-4xl font-semibold mb-6">How it Works</h1>
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-10">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, reprehenderit.
        </p>

        <div class="space-y-10 relative">
            <div class="absolute left-5 top-14 bottom-14 w-0.5 bg-blue-300"></div>

            <!-- Step 1 -->
            <div class="flex items-center">
                <div
                    class="flex-none bg-blue-500 text-white w-10 h-10 flex items-center justify-center rounded-full z-10">
                    1</div>
                <div class="flex-grow ml-6">
                    <h2 class="text-xl font-bold">Step 1: Register or Log In</h2>
                    <p>Create an account to start exploring!</p>
                </div>
                <div class="flex-none w-24 h-24 bg-gray-300 rounded-lg"></div>
            </div>

            <!-- Step 2 -->
            <div class="flex items-center">
                <div
                    class="flex-none bg-blue-500 text-white w-10 h-10 flex items-center justify-center rounded-full z-10">
                    2</div>
                <div class="flex-grow ml-6">
                    <h2 class="text-xl font-bold">Step 2: Create Your Listing</h2>
                    <p>Share your home and its details.</p>
                </div>
                <div class="flex-none w-24 h-24 bg-gray-300 rounded-lg"></div>
            </div>

            <!-- Step 3 -->
            <div class="flex items-center">
                <div
                    class="flex-none bg-blue-500 text-white w-10 h-10 flex items-center justify-center rounded-full z-10">
                    3</div>
                <div class="flex-grow ml-6">
                    <h2 class="text-xl font-bold">Step 3: Browse Available Homes</h2>
                    <p>Discover unique homes for swap.</p>
                </div>
                <div class="flex-none w-24 h-24 bg-gray-300 rounded-lg"></div>
            </div>

            <!-- Step 4 -->
            <div class="flex items-center">
                <div
                    class="flex-none bg-blue-500 text-white w-10 h-10 flex items-center justify-center rounded-full z-10">
                    4</div>
                <div class="flex-grow ml-6">
                    <h2 class="text-xl font-bold">Step 4: Send Swap Request</h2>
                    <p>Connect with other users and propose a swap.</p>
                </div>
                <div class="flex-none w-24 h-24 bg-gray-300 rounded-lg"></div>
            </div>

            <!-- Step 5 -->
            <div class="flex items-center">
                <div
                    class="flex-none bg-blue-500 text-white w-10 h-10 flex items-center justify-center rounded-full z-10">
                    5</div>
                <div class="flex-grow ml-6">
                    <h2 class="text-xl font-bold">Step 5: Communicate and Confirm</h2>
                    <p>Discuss details and finalize your exchange.</p>
                </div>
                <div class="flex-none w-24 h-24 bg-gray-300 rounded-lg"></div>
            </div>

            <!-- Step 6 -->
            <div class="flex items-center">
                <div
                    class="flex-none bg-blue-500 text-white w-10 h-10 flex items-center justify-center rounded-full z-10">
                    6</div>
                <div class="flex-grow ml-6">
                    <h2 class="text-xl font-bold">Step 6: Leave Feedback</h2>
                    <p>Share your experience and help others!</p>
                </div>
                <div class="flex-none w-24 h-24 bg-gray-300 rounded-lg"></div>
            </div>

        </div>
    </section>

    <!-- Contact Section -->
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold">Still Have Questions?</h2>
            <p class="text-gray-600 mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="/contact" class="bg-blue-600 text-white px-6 py-3 rounded">Contact</a>
        </div>
    </section>

    <!-- Footer -->
    <livewire:footer />

</body>

</html>
