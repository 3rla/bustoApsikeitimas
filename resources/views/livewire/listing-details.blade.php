<div class="pt-8 bg-gray-100">
    <div class="px-4 pb-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white rounded-lg shadow-xl">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                <!-- Image Gallery -->
                <div class="p-6">
                    @if (count($this->images) > 0)
                        <div class="mb-4">
                            <img src="{{ Storage::url($this->images[0]) }}" alt="{{ $this->listing->title }}"
                                class="object-cover w-full h-auto rounded-lg shadow-md" style="max-height: 400px;">
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            @foreach (array_slice($this->images, 1, 4) as $image)
                                <img src="{{ Storage::url($image) }}" alt="{{ $this->listing->title }}"
                                    class="object-cover w-full h-24 transition-opacity rounded-md shadow cursor-pointer hover:opacity-75">
                            @endforeach
                        </div>
                    @else
                        <div class="flex items-center justify-center h-64 bg-gray-200 rounded-lg">
                            <span class="text-gray-500">No images available</span>
                        </div>
                    @endif
                </div>

                <!-- Listing Details -->
                <div class="p-6">
                    <div class="p-6">
                        <h2 class="mb-2 text-3xl font-semibold text-gray-800">{{ $listing->title }}</h2>
                        <h6 class="mb-4 text-sm font-medium text-gray-500">{{ $listing->city }},
                            {{ $listing->country }}</h6>
                        <p class="mb-6 text-gray-600">{{ $listing->description }}</p>

                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div class="p-4 rounded-lg bg-gray-50">
                                <h3 class="font-semibold text-gray-700">Bedrooms</h3>
                                <p class="text-2xl font-bold text-blue-600">{{ $listing->bedrooms }}</p>
                            </div>
                            <div class="p-4 rounded-lg bg-gray-50">
                                <h3 class="font-semibold text-gray-700">Bathrooms</h3>
                                <p class="text-2xl font-bold text-blue-600">{{ $listing->bathrooms }}</p>
                            </div>
                            <div class="p-4 rounded-lg bg-gray-50">
                                <h3 class="font-semibold text-gray-700">Guests</h3>
                                <p class="text-2xl font-bold text-blue-600">{{ $listing->guest_amount }}</p>
                            </div>
                            <div class="p-4 rounded-lg bg-gray-50">
                                <h3 class="font-semibold text-gray-700">Availability</h3>
                                <p class="text-sm text-gray-600">
                                    {{ $listing->available_from->format('M d, Y') }} -
                                    {{ $listing->available_to->format('M d, Y') }}
                                </p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="mb-3 text-xl font-semibold text-gray-800">Amenities</h3>
                            <ul class="grid grid-cols-2 gap-2">
                                @foreach ($this->amenities as $amenity)
                                    <li class="flex items-center text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $amenity }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div>
                            <h3 class="mb-2 text-xl font-semibold text-gray-800">Address</h3>
                            <p class="text-gray-600">{{ $listing->address }}, {{ $listing->postal_code }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
