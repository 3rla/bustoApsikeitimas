<div class="container px-4 py-8 mx-auto">
    <h2 class="mb-6 text-3xl font-bold">Pending Listings</h2>

    <div class="mb-4">
        <input wire:model.lazy="search" type="text" placeholder="Search by user name, last name, or listing title"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="flex items-center justify-between mb-4">
        <div>
            <label for="sortField" class="mr-2">Sort by:</label>
            <select wire:model.lazy="sortField" id="sortField" class="px-2 py-1 border rounded">
                <option value="title">Title</option>
                <option value="created_at">Date Created</option>
                <option value="user.name">User Name</option>
            </select>
        </div>
        <div>
            <label for="sortDirection" class="mr-2">Order:</label>
            <select wire:model.lazy="sortDirection" id="sortDirection" class="px-2 py-1 border rounded">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>
        </div>
    </div>

    @foreach ($pendingListings as $listing)
        <div class="p-6 mb-6 transition duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl">
            <div class="flex flex-col md:flex-row">
                <div class="w-full mb-4 md:w-1/4 md:mb-0 md:mr-6">
                    <div class="relative w-full h-48" x-data="{ currentIndex: 0 }">
                        @php
                            $images = json_decode($listing->images) ?? [];
                        @endphp
                        @if (count($images) > 0)
                            @foreach ($images as $index => $image)
                                <img src="{{ Storage::url($image) }}" alt="{{ $listing->title }}"
                                    class="absolute inset-0 object-cover w-full h-full transition-opacity duration-500 ease-in-out rounded-lg"
                                    x-show="currentIndex === {{ $index }}"
                                    x-transition:enter="transition ease-in-out duration-500"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in-out duration-500"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                            @endforeach

                            <!-- Image count -->
                            <div class="absolute px-2 py-1 text-white bg-black bg-opacity-50 rounded top-2 right-2">
                                <span x-text="currentIndex + 1"></span>/<span>{{ count($images) }}</span>
                            </div>

                            @if (count($images) > 1)
                                <!-- Left arrow -->
                                <button
                                    @click="currentIndex = (currentIndex - 1 + {{ count($images) }}) % {{ count($images) }}"
                                    class="absolute p-2 transform -translate-y-1/2 bg-black bg-opacity-50 rounded-full left-2 top-1/2 focus:outline-none">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>

                                <!-- Right arrow -->
                                <button @click="currentIndex = (currentIndex + 1) % {{ count($images) }}"
                                    class="absolute p-2 transform -translate-y-1/2 bg-black bg-opacity-50 rounded-full right-2 top-1/2 focus:outline-none">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            @endif
                        @else
                            <div class="flex items-center justify-center w-full h-full bg-gray-200 rounded-lg">
                                <span class="text-gray-500">No image available</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="w-full md:w-3/4">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="mb-2 text-2xl font-bold text-gray-800">{{ $listing->title }}</h3>
                            <p class="mb-2 text-sm text-gray-600">
                                By: <a href="{{ route('user.profile', ['userId' => $listing->user->id]) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $listing->user->name }} {{ $listing->user->last_name }}
                                </a>
                            </p>
                        </div>
                        <span
                            class="px-3 py-1 text-xs font-semibold text-orange-800 bg-orange-200 rounded-full">Pending</span>
                    </div>
                    <p class="mb-4 text-gray-700">{{ Str::limit($listing->description, 150) }}</p>
                    <div class="flex flex-wrap mb-4">
                        <span class="flex items-center mb-2 mr-4 text-sm text-gray-600">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                            {{ $listing->bedrooms }} bedrooms
                        </span>
                        <span class="flex items-center mb-2 mr-4 text-sm text-gray-600">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            {{ $listing->city }}, {{ $listing->country }}
                        </span>
                        <span class="flex items-center mb-2 text-sm text-gray-600">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Created {{ $listing->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <div x-data="{ showApproveModal: false, showRejectModal: false, listingId: null }">
                        <a href="{{ route('listing.details', ['id' => $listing->id]) }}"
                            class="inline-block px-4 py-2 text-sm font-medium text-white transition duration-300 bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            View Details
                        </a>
                        <button @click="showApproveModal = true; listingId = {{ $listing->id }}"
                            class="inline-block px-4 py-2 text-sm font-medium text-white transition duration-300 bg-green-500 rounded-full hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Approve
                        </button>
                        <button @click="showRejectModal = true; listingId = {{ $listing->id }}"
                            class="inline-block px-4 py-2 text-sm font-medium text-white transition duration-300 bg-red-500 rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Reject
                        </button>

                        <!-- Approve Confirmation Modal -->
                        <div x-show="showApproveModal" class="fixed inset-0 z-10 overflow-y-auto"
                            aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div
                                class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                                    aria-hidden="true"></div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                    aria-hidden="true">&#8203;</span>
                                <div
                                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg font-medium leading-6 text-gray-900"
                                                    id="modal-title">
                                                    Approve Listing
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">
                                                        Are you sure you want to approve this listing? This action
                                                        cannot be undone.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="button"
                                            @click="$wire.approveListing(listingId); showApproveModal = false"
                                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Approve
                                        </button>
                                        <button type="button" @click="showApproveModal = false"
                                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reject Confirmation Modal -->
                        <div x-show="showRejectModal" class="fixed inset-0 z-10 overflow-y-auto"
                            aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div
                                class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                                    aria-hidden="true"></div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                    aria-hidden="true">&#8203;</span>
                                <div
                                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg font-medium leading-6 text-gray-900"
                                                    id="modal-title">
                                                    Reject Listing
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">
                                                        Are you sure you want to reject this listing? This action cannot
                                                        be undone.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="button"
                                            @click="$wire.rejectListing(listingId); showRejectModal = false"
                                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Reject
                                        </button>
                                        <button type="button" @click="showRejectModal = false"
                                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $pendingListings->links() }}
    </div>
</div>
