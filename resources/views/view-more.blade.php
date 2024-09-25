<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View More</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>
    <!-- Navbar -->
    <livewire:navbar />
    <section class="container mx-auto p-6">
        <!-- Search and Filter -->
        <div class="flex justify-center my-6">
            <div class="flex items-center w-full max-w-md">
                <input type="text" placeholder="Search"
                    class="border px-4 py-2 w-full rounded-l-lg focus:outline-none">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-r-lg">Filter</button>
            </div>
        </div>

        <!-- Categories with Scroll -->
        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-2 py-4 overflow-x-auto">
            <!-- Category Items -->
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Loft</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Mountain House</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Beach House</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Cabin</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Villa</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Condo</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Cardboard box</p>
            </div>
            <div class="text-center min-w-[100px]">
                <div class="bg-gray-300 w-16 h-16 mx-auto rounded-full"></div>
                <p class="mt-1 text-sm">Garbage bin</p>
            </div>
        </div>
    </section>
    <section class="container mx-auto py-12">
        <!-- Housing Grid Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Repeat this block for each house -->
            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <div class="bg-gray-300 h-48 w-full"></div>
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Kaunas</h3>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 inline-block text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 .587l3.668 7.431 8.332 1.209-6.04 5.884 1.424 8.306L12 18.896l-7.384 3.881 1.424-8.306-6.04-5.884 8.332-1.209z" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-600">4.5</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet. </p>
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600">2 beds</span>
                            <span class="ml-4 text-sm text-gray-600">4 guests</span>
                        </div>
                        <span class="text-sm text-gray-600">Jun 1 - Jun 7</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Send Offer</button>
                        <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Send Message</button>
                    </div>
                </div>
            </div>

            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <div class="bg-gray-300 h-48 w-full"></div>
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Vilnius</h3>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 inline-block text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 .587l3.668 7.431 8.332 1.209-6.04 5.884 1.424 8.306L12 18.896l-7.384 3.881 1.424-8.306-6.04-5.884 8.332-1.209z" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-600">4.7</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Cozy apartment in the city center. </p>
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600">1 bed</span>
                            <span class="ml-4 text-sm text-gray-600">2 guests</span>
                        </div>
                        <span class="text-sm text-gray-600">Jul 5 - Jul 12</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Send Offer</button>
                        <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Send Message</button>
                    </div>
                </div>
            </div>

            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <div class="bg-gray-300 h-48 w-full"></div>
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Klaipėda</h3>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 inline-block text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 .587l3.668 7.431 8.332 1.209-6.04 5.884 1.424 8.306L12 18.896l-7.384 3.881 1.424-8.306-6.04-5.884 8.332-1.209z" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-600">4.3</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Seaside villa with stunning views. </p>
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600">3 beds</span>
                            <span class="ml-4 text-sm text-gray-600">6 guests</span>
                        </div>
                        <span class="text-sm text-gray-600">Aug 10 - Aug 17</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Send Offer</button>
                        <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Send Message</button>
                    </div>
                </div>
            </div>

            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <div class="bg-gray-300 h-48 w-full"></div>
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Šiauliai</h3>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 inline-block text-yellow-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 .587l3.668 7.431 8.332 1.209-6.04 5.884 1.424 8.306L12 18.896l-7.384 3.881 1.424-8.306-6.04-5.884 8.332-1.209z" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-600">4.6</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Modern loft in a quiet neighborhood. </p>
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600">2 beds</span>
                            <span class="ml-4 text-sm text-gray-600">3 guests</span>
                        </div>
                        <span class="text-sm text-gray-600">Sep 1 - Sep 8</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Send Offer</button>
                        <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Send Message</button>
                    </div>
                </div>
            </div>

            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <div class="bg-gray-300 h-48 w-full"></div>
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Palanga</h3>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 inline-block text-yellow-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 .587l3.668 7.431 8.332 1.209-6.04 5.884 1.424 8.306L12 18.896l-7.384 3.881 1.424-8.306-6.04-5.884 8.332-1.209z" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-600">4.8</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Beachfront apartment with panoramic views. </p>
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600">2 beds</span>
                            <span class="ml-4 text-sm text-gray-600">4 guests</span>
                        </div>
                        <span class="text-sm text-gray-600">Jul 15 - Jul 22</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Send Offer</button>
                        <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Send Message</button>
                    </div>
                </div>
            </div>

            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <div class="bg-gray-300 h-48 w-full"></div>
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Palanga</h3>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 inline-block text-yellow-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 .587l3.668 7.431 8.332 1.209-6.04 5.884 1.424 8.306L12 18.896l-7.384 3.881 1.424-8.306-6.04-5.884 8.332-1.209z" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-600">4.8</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Beachfront apartment with panoramic views. </p>
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600">2 beds</span>
                            <span class="ml-4 text-sm text-gray-600">4 guests</span>
                        </div>
                        <span class="text-sm text-gray-600">Jul 15 - Jul 22</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Send Offer</button>
                        <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Send Message</button>
                    </div>
                </div>
            </div>

            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <div class="bg-gray-300 h-48 w-full"></div>
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Palanga</h3>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 inline-block text-yellow-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 .587l3.668 7.431 8.332 1.209-6.04 5.884 1.424 8.306L12 18.896l-7.384 3.881 1.424-8.306-6.04-5.884 8.332-1.209z" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-600">4.8</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Beachfront apartment with panoramic views. </p>
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600">2 beds</span>
                            <span class="ml-4 text-sm text-gray-600">4 guests</span>
                        </div>
                        <span class="text-sm text-gray-600">Jul 15 - Jul 22</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Send Offer</button>
                        <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Send Message</button>
                    </div>
                </div>
            </div>
            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <div class="bg-gray-300 h-48 w-full"></div>
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Palanga</h3>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 inline-block text-yellow-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 .587l3.668 7.431 8.332 1.209-6.04 5.884 1.424 8.306L12 18.896l-7.384 3.881 1.424-8.306-6.04-5.884 8.332-1.209z" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-600">4.8</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Beachfront apartment with panoramic views. </p>
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600">2 beds</span>
                            <span class="ml-4 text-sm text-gray-600">4 guests</span>
                        </div>
                        <span class="text-sm text-gray-600">Jul 15 - Jul 22</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Send Offer</button>
                        <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Send Message</button>
                    </div>
                </div>
            </div>
            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <div class="bg-gray-300 h-48 w-full"></div>
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Palanga</h3>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 inline-block text-yellow-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 .587l3.668 7.431 8.332 1.209-6.04 5.884 1.424 8.306L12 18.896l-7.384 3.881 1.424-8.306-6.04-5.884 8.332-1.209z" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-600">4.8</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Beachfront apartment with panoramic views. </p>
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600">2 beds</span>
                            <span class="ml-4 text-sm text-gray-600">4 guests</span>
                        </div>
                        <span class="text-sm text-gray-600">Jul 15 - Jul 22</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Send Offer</button>
                        <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Send Message</button>
                    </div>
                </div>
            </div>
            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <div class="bg-gray-300 h-48 w-full"></div>
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Palanga</h3>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 inline-block text-yellow-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 .587l3.668 7.431 8.332 1.209-6.04 5.884 1.424 8.306L12 18.896l-7.384 3.881 1.424-8.306-6.04-5.884 8.332-1.209z" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-600">4.8</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Beachfront apartment with panoramic views. </p>
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600">2 beds</span>
                            <span class="ml-4 text-sm text-gray-600">4 guests</span>
                        </div>
                        <span class="text-sm text-gray-600">Jul 15 - Jul 22</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Send Offer</button>
                        <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Send Message</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <button class="px-4 py-2 bg-gray-100 rounded-l-md border border-gray-300">1</button>
            <button class="px-4 py-2 bg-white border border-gray-300">2</button>
            <button class="px-4 py-2 bg-white border border-gray-300">3</button>
            <button class="px-4 py-2 bg-white border border-gray-300">4</button>
            <button class="px-4 py-2 bg-white rounded-r-md border border-gray-300">Next</button>
        </div>

    </section>

    <!-- Footer -->
    <livewire:footer />
    @livewireScripts
</body>

</html>
