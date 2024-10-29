<!-- Hero Section -->
<section class="py-12 bg-gray-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col items-center lg:flex-row lg:justify-between">
            <!-- Text Content (Left Side) -->
            <div class="w-full mb-8 text-left lg:w-1/2 lg:pr-8 lg:mb-0">
                <h1 class="text-4xl font-extrabold text-gray-900">
                    Find Your Perfect Home Exchange
                </h1>
                <p class="mt-4 text-lg text-gray-500">
                    Discover new places by swapping homes with others. Start exploring today!
                </p>
                <div class="mt-6">
                    <a href="#" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Learn
                        More</a>
                    @guest
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 ml-4 text-gray-900 border border-gray-300 rounded-md hover:bg-gray-100">Sign
                            In</a>
                    @endguest
                </div>
            </div>

            <!-- Hero Image (Right Side) -->
            <div class="flex items-center justify-center w-full lg:w-1/2">
                <div class="relative w-full max-w-lg mx-auto overflow-hidden rounded-lg shadow-lg">
                    <div class="aspect-w-16 aspect-h-9">
                        <img wire:loading.delay.class="opacity-50" src="{{ Storage::url('images/hero-image.png') }}"
                            alt="Home Swap" class="object-cover w-full h-full" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
