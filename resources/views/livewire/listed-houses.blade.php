<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <h2 class="pb-4 mb-8 text-3xl font-bold text-gray-800 border-b">Your Listed Houses</h2>

    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="transition-all duration-500 ease-in-out">
        @if (session()->has('message'))
            <div class="p-4 mb-6 text-green-700 bg-green-100 border-l-4 border-green-500 rounded-md">
                <p class="font-medium">{{ session('message') }}</p>
            </div>
        @endif
    </div>

    <div class="space-y-8">
        @forelse($houses as $house)
            <div
                class="flex flex-col overflow-hidden transition-shadow duration-300 border border-gray-300 rounded-lg shadow-md hover:shadow-lg md:flex-row md:h-96">
                <!-- Image carousel -->
                <div class="relative w-full h-64 md:w-1/2 md:h-full" x-data="{ currentIndex: 0 }">
                    @if (isset($houseImages[$house->id]) && count($houseImages[$house->id]) > 0)
                        @foreach ($houseImages[$house->id] as $index => $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="House image"
                                class="absolute inset-0 object-cover object-center w-full h-full transition-opacity duration-500 ease-in-out"
                                x-show="currentIndex === {{ $index }}"
                                x-transition:enter="transition ease-in-out duration-500"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in-out duration-500"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                loading="lazy">
                        @endforeach

                        @if (count($houseImages[$house->id]) > 1)
                            <!-- Image count -->
                            <div class="absolute px-2 py-1 text-white bg-black bg-opacity-50 rounded top-2 right-2">
                                <span
                                    x-text="currentIndex + 1"></span>/<span>{{ count($houseImages[$house->id]) }}</span>
                            </div>

                            <!-- Left arrow -->
                            <button
                                @click="currentIndex = (currentIndex - 1 + {{ count($houseImages[$house->id]) }}) % {{ count($houseImages[$house->id]) }}"
                                class="absolute p-2 transform -translate-y-1/2 bg-black bg-opacity-50 rounded-full left-2 top-1/2 focus:outline-none">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>

                            <!-- Right arrow -->
                            <button @click="currentIndex = (currentIndex + 1) % {{ count($houseImages[$house->id]) }}"
                                class="absolute p-2 transform -translate-y-1/2 bg-black bg-opacity-50 rounded-full right-2 top-1/2 focus:outline-none">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        @endif
                    @else
                        <!-- No image placeholder -->
                        <div class="flex items-center justify-center w-full h-full bg-gray-200">
                            <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 22V12h6v10">
                                </path>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- House details -->
                <div class="flex flex-col justify-between w-full p-6 md:w-1/2">
                    <div>
                        <div class="flex flex-col items-start justify-between mb-4 md:flex-row md:items-center">
                            <h3
                                class="text-2xl font-semibold text-gray-800 transition-colors duration-300 hover:text-blue-600">
                                {{ $house->title }}
                            </h3>
                            <span class="mt-2 text-sm text-gray-500 md:mt-0">
                                {{ $house->city }}, {{ $house->country }}
                            </span>
                        </div>

                        <div class="mb-4">
                            @switch($house->approval_status)
                                @case('pending')
                                    <span class="px-2 py-1 text-sm font-semibold text-yellow-700 bg-yellow-100 rounded-full">
                                        Pending Approval
                                    </span>
                                @break

                                @case('approved')
                                    <span class="px-2 py-1 text-sm font-semibold text-green-700 bg-green-100 rounded-full">
                                        Approved
                                    </span>
                                @break

                                @case('rejected')
                                    <span class="px-2 py-1 text-sm font-semibold text-red-700 bg-red-100 rounded-full">
                                        Denied
                                    </span>
                                @break

                                @default
                                    <span class="px-2 py-1 text-sm font-semibold text-gray-700 bg-gray-100 rounded-full">
                                        Status Unknown
                                    </span>
                            @endswitch
                        </div>

                        <p class="mb-6 text-gray-600">{{ Str::limit($house->description, 150) }}</p>
                    </div>

                    <div class="mt-auto">
                        <div class="flex flex-col items-center mb-4">
                            <div class="relative w-full mb-4" x-data="{ scroll: 0 }">
                                <div class="flex items-center">
                                    <!-- Left Arrow -->
                                    <button
                                        @click="scroll = Math.max(scroll - 200, 0); $refs.scrollContainer.scrollLeft = scroll"
                                        class="p-2 mr-2 transition duration-200 bg-gray-200 rounded-full focus:outline-none hover:bg-gray-300"
                                        :class="{ 'opacity-50 cursor-not-allowed': scroll <= 0 }">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>

                                    <!-- Scrollable Content -->
                                    <div x-ref="scrollContainer"
                                        class="flex flex-1 gap-4 overflow-x-auto scroll-smooth scrollbar-hide"
                                        @scroll="scroll = $event.target.scrollLeft">
                                        <div
                                            class="flex items-center px-3 py-2 text-sm bg-blue-100 rounded-lg shadow-sm min-w-max">
                                            <i class="mr-2 text-xl text-blue-600 fas fa-bed"></i>
                                            <span class="font-medium text-blue-800">{{ $house->bedrooms }}</span>
                                            <span
                                                class="ml-1 text-blue-600">{{ Str::plural('Bedroom', $house->bedrooms) }}</span>
                                        </div>
                                        <div
                                            class="flex items-center px-3 py-2 text-sm bg-green-100 rounded-lg shadow-sm min-w-max">
                                            <i class="mr-2 text-xl text-green-600 fas fa-bath"></i>
                                            <span class="font-medium text-green-800">{{ $house->bathrooms }}</span>
                                            <span
                                                class="ml-1 text-green-600">{{ Str::plural('Bathroom', $house->bathrooms) }}</span>
                                        </div>
                                        <div
                                            class="flex items-center px-3 py-2 text-sm bg-purple-100 rounded-lg shadow-sm min-w-max">
                                            <i class="mr-2 text-xl text-purple-600 fas fa-users"></i>
                                            <span class="font-medium text-purple-800">{{ $house->guest_amount }}</span>
                                            <span
                                                class="ml-1 text-purple-600">{{ Str::plural('Guest', $house->guest_amount) }}</span>
                                        </div>

                                        <!-- Amenities -->
                                        @if (is_array($house->amenities) && count($house->amenities) > 0)
                                            @foreach ($house->amenities as $amenity)
                                                <div
                                                    class="flex items-center px-3 py-2 text-sm bg-yellow-100 rounded-lg shadow-sm min-w-max">
                                                    <i class="mr-2 text-xl text-yellow-600 fas fa-concierge-bell"></i>
                                                    <span
                                                        class="font-medium text-yellow-800">{{ $amenity }}</span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <!-- Right Arrow -->
                                    <button
                                        @click="scroll = Math.min(scroll + 200, $refs.scrollContainer.scrollWidth - $refs.scrollContainer.clientWidth); $refs.scrollContainer.scrollLeft = scroll"
                                        class="p-2 ml-2 transition duration-200 bg-gray-200 rounded-full focus:outline-none hover:bg-gray-300"
                                        :class="{
                                            'opacity-50 cursor-not-allowed': scroll >= $refs.scrollContainer
                                                .scrollWidth - $refs.scrollContainer.clientWidth
                                        }">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Edit and Delete Buttons -->
                            <div class="flex justify-center mt-4 space-x-2">
                                <button
                                    class="px-4 py-2 text-sm font-medium text-white transition duration-200 bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <i class="mr-1 fas fa-edit"></i> Edit
                                </button>
                                <button
                                    class="px-4 py-2 text-sm font-medium text-red-600 transition duration-200 bg-white border border-red-600 rounded-md hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <i class="mr-1 fas fa-trash-alt"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="py-12 text-center rounded-lg col-span-full bg-gray-50">
                    <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No houses listed</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by adding a new house.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $houses->links() }}
        </div>
    </div>
