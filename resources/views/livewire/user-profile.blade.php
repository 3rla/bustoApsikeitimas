<div class="px-4 py-12 mx-auto max-w-8xl sm:px-6 lg:px-8 xl:max-w-[1600px] 2xl:max-w-[1800px]">
    <div class="mb-8 overflow-hidden bg-white shadow-lg sm:rounded-lg">
        <div class="px-6 py-8 sm:p-10 bg-gradient-to-r from-blue-500 to-indigo-600">
            <div class="flex flex-col items-center space-y-6 sm:flex-row sm:space-y-0 sm:space-x-10">
                <div class="flex-shrink-0">
                    <img class="object-cover w-32 h-32 border-4 border-white rounded-full shadow-xl"
                        src="{{ $user->profile_photo_url }}"
                        alt="{{ $user->name }} {{ substr($user->last_name, 0, 1) . '.' }}">
                </div>
                <div class="flex-1 min-w-0 text-center sm:text-left">
                    <h1 class="mb-2 text-4xl font-bold text-white">
                        {{ $user->name }} {{ substr($user->last_name, 0, 1) . '.' }}
                    </h1>
                    <p class="text-lg font-medium text-blue-100">
                        {{ $user->email }}
                    </p>
                    <p class="mt-2 text-sm font-medium text-blue-200">
                        Member since {{ $user->created_at->format('F d, Y') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-200">
            <dl class="grid grid-cols-1 p-6 gap-x-4 gap-y-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Full name</dt>
                    <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $user->name }}
                        {{ substr($user->last_name, 0, 1) . '.' }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Email address</dt>
                    <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $user->email }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Phone number</dt>
                    <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $user->phone ?? 'Not provided' }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Member since</dt>
                    <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $user->created_at->format('F d, Y') }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mb-12">
        <h2 class="mb-6 text-2xl font-semibold text-gray-800">Home Listings</h2>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($listings as $listing)
                <div class="flex flex-col h-full overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md">
                    <div class="relative w-full h-48">
                        @if ($listing->images && is_array($listing->images) && count($listing->images) > 0)
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
                            <h3 class="text-xl font-bold text-gray-800 truncate">{{ $listing->title }}</h3>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="ml-1 text-xs font-medium text-gray-600">New</span>
                            </div>
                        </div>
                        <h4 class="h-5 mb-2 overflow-hidden text-sm text-gray-600">{{ $listing->city }},
                            {{ $listing->country }}</h4>
                        <p class="h-12 mb-2 overflow-hidden text-sm text-gray-600">
                            {{ Str::limit($listing->description, 90) }}</p>
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
                                {{ $listing->available_from->format('M d') }} -
                                {{ $listing->available_to->format('M d, Y') }}
                            </span>
                        </div>

                        <div class="flex-grow mb-2">
                            <h4 class="mb-2 text-sm font-semibold text-gray-700">Amenities:</h4>
                            <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 lg:grid-cols-2 xl:grid-cols-3">
                                @foreach ($listing->processedAmenities['display'] as $amenity)
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-sm text-gray-600">{{ $amenity }}</span>
                                    </div>
                                @endforeach
                            </div>
                            @if ($listing->processedAmenities['remaining'] > 0)
                                <p class="mt-2 text-sm text-gray-500">
                                    +{{ $listing->processedAmenities['remaining'] }} more amenities
                                </p>
                            @endif
                        </div>
                        <div class="flex items-center justify-center mt-auto">
                            <a href="{{ route('listing.details', $listing->id) }}"
                                class="px-4 py-2 text-sm font-medium text-white transition duration-300 ease-in-out bg-blue-600 rounded-full shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:shadow-lg">
                                View Listing
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="w-full mt-12">
        <h2 class="mb-6 text-3xl font-bold text-gray-800">Reviews</h2>

        @if ($reviews && $reviews->isNotEmpty())
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($reviews as $review)
                    <div
                        class="overflow-hidden transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105">
                        <div class="p-6">
                            {{-- Reviewer Information --}}
                            <div class="flex items-center mb-4">
                                <a href="{{ route('user.profile', ['userId' => $listing->user->id]) }}">
                                    <img src="{{ $listing->user->profile_photo_url }}"
                                        alt="{{ $listing->user->name }} {{ substr($listing->user->last_name, 0, 1) . '.' }}"
                                        class="w-10 h-10 mr-3 rounded-full" loading="lazy">
                                </a>
                                <div class="ml-4">
                                    <p class="font-semibold text-gray-900">{{ $review->reviewer->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>

                            {{-- Star Rating --}}
                            <div class="flex items-center mb-3">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="h-5 w-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                                <span class="ml-2 text-sm font-medium text-gray-600">{{ $review->rating }}/5</span>
                            </div>

                            {{-- Review Content --}}
                            <p class="mb-4 text-gray-700 line-clamp-3">{{ $review->comment }}</p>
                            <p class="text-sm text-gray-500">For swap: #{{ $review->home_swap->id ?? 'N/A' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-6 bg-white rounded-lg shadow-md">
                <p class="text-center text-gray-600">No reviews yet.</p>
            </div>
        @endif
    </div>
</div>
