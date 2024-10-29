<div class="pt-8 bg-gray-100" x-data="{ showSwapModal: @entangle('showSwapModal') }">
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
                    <h2 class="mb-2 text-3xl font-semibold text-gray-800">{{ $listing->title }}</h2>
                    <h6 class="mb-4 text-sm font-medium text-gray-500">{{ $listing->city }}, {{ $listing->country }}
                    </h6>

                    <!-- Add user information -->
                    <div class="flex items-center mb-4">
                        <a href="{{ route('user.profile', ['userId' => $listing->user->id]) }}">
                            <img src="{{ $listing->user->profile_photo_url }}"
                                alt="{{ $listing->user->name }} {{ substr($listing->user->last_name, 0, 1) . '.' }}"
                                class="w-10 h-10 mr-3 rounded-full">
                        </a>
                        <div>
                            <p class="font-semibold text-gray-800">{{ $listing->user->name }}
                                {{ substr($listing->user->last_name, 0, 1) . '.' }}</p>
                            <p class="text-sm text-gray-600">Listed by</p>
                        </div>
                    </div>

                    <!-- Send Swap Offer Button -->
                    @if (Auth::check() && Auth::id() !== $listing->user_id)
                        <div class="mt-6">
                            <button @click="showSwapModal = true"
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                Send Swap Offer
                            </button>
                        </div>
                    @endif

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
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
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

    <!-- Swap Offer Modal -->
    <div x-show="showSwapModal" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="showSwapModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="showSwapModal" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                    <button @click="showSwapModal = false" type="button"
                        class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="sr-only">Close</span>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="sm:flex sm:items-start">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-indigo-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="w-6 h-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                            Send Swap Offer
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Choose one of your listings to offer for a swap:
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="selectedUserListing" class="block text-sm font-medium text-gray-700">Your
                        Listings</label>
                    <select wire:model.live="selectedUserListing"
                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select a listing</option>
                        @foreach ($userListings as $userListing)
                            <option value="{{ $userListing->id }}">{{ $userListing->title }}</option>
                        @endforeach
                    </select>
                    @error('selectedUserListing')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea id="message" wire:model.live="swapMessage" rows="3"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Enter a message for the owner"></textarea>
                    @error('swapMessage')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                    <button type="button" wire:click="sendSwapOffer"
                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                        Send Offer
                    </button>
                    <button type="button" @click="showSwapModal = false"
                        class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
