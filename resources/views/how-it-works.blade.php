<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How it works</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <x-cookie-banner />

    <!-- Navbar -->
    <livewire:navbar />

    <!-- Main How It Works Section -->
    <section class="container max-w-4xl mx-auto my-16">
        <h1 class="mb-6 text-4xl font-semibold text-center">How it Works</h1>
        <p class="max-w-2xl mx-auto mb-10 text-center text-gray-600">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, reprehenderit.
        </p>

        <div class="relative space-y-10">
            <div class="absolute left-5 top-14 bottom-14 w-0.5 bg-blue-300"></div>

            <!-- Step 1 -->
            <div class="flex items-center">
                <div
                    class="z-10 flex items-center justify-center flex-none w-10 h-10 text-white bg-blue-500 rounded-full">
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
                    class="z-10 flex items-center justify-center flex-none w-10 h-10 text-white bg-blue-500 rounded-full">
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
                    class="z-10 flex items-center justify-center flex-none w-10 h-10 text-white bg-blue-500 rounded-full">
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
                    class="z-10 flex items-center justify-center flex-none w-10 h-10 text-white bg-blue-500 rounded-full">
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
                    class="z-10 flex items-center justify-center flex-none w-10 h-10 text-white bg-blue-500 rounded-full">
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
                    class="z-10 flex items-center justify-center flex-none w-10 h-10 text-white bg-blue-500 rounded-full">
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
    <section class="py-8 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold">Still Have Questions?</h2>
            <p class="mb-6 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="/contact" class="px-6 py-3 text-white bg-blue-600 rounded">Contact</a>
        </div>
    </section>

    <!-- Footer -->
    <livewire:footer />

</body>

</html>
