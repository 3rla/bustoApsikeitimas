<div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($listings as $listing)
        <div class="flex flex-col overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md">
            <div class="relative w-full h-48">
                @if ($listing->images && count($listing->images) > 0)
                    <img src="{{ Storage::url($listing->images[0]) }}" alt="{{ $listing->title }}"
                        class="object-cover w-full h-full">
                @else
                    <div class="flex items-center justify-center w-full h-full bg-gray-200">
                        <span class="text-gray-500">No image available</span>
                    </div>
                @endif
            </div>
            <div class="flex flex-col flex-grow p-4">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-xl font-bold text-gray-800">{{ $listing->title }}</h2>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="ml-1 text-xs font-medium text-gray-600">New</span>
                    </div>
                </div>
                <h3 class="mb-2 text-sm text-gray-600">{{ $listing->city }}, {{ $listing->country }}</h3>
                <p class="mb-2 overflow-hidden text-sm text-gray-600">{{ Str::limit($listing->description, 100) }}</p>
                <div class="grid grid-cols-2 gap-2 mb-2 text-xs">
                    <span class="flex items-center text-gray-600">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        {{ $listing->bedrooms }} bedrooms
                    </span>
                    <span class="flex items-center text-gray-600">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        {{ $listing->guest_amount }} guests
                    </span>
                    <span class="flex items-center col-span-2 text-gray-600">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ $listing->available_from->format('M d') }} - {{ $listing->available_to->format('M d, Y') }}
                    </span>
                </div>
                <div class="mb-2">
                    <h4 class="text-xs font-semibold text-gray-700">Amenities:</h4>
                    <div class="flex flex-wrap gap-1">
                        @foreach ($listing->processedAmenities['display'] as $amenity)
                            <span
                                class="px-1.5 py-0.5 text-xs text-gray-600 bg-gray-100 rounded-full">{{ $amenity }}</span>
                        @endforeach
                        @if ($listing->processedAmenities['remaining'] > 0)
                            <span class="px-1.5 py-0.5 text-xs text-gray-600 bg-gray-100 rounded-full">
                                +{{ $listing->processedAmenities['remaining'] }} more
                            </span>
                        @endif
                    </div>
                </div>
                <div class="flex justify-center mt-auto">
                    <a href="{{ route('listing.details', ['id' => $listing->id]) }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        View Details
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
