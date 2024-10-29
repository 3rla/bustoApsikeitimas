<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="mb-6 text-2xl font-bold text-gray-800">Manage Reviews</h2>

    <div class="mb-6">
        <input wire:model.debounce.300ms="search" type="text" placeholder="Search reviews..."
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    @if ($reviews->isEmpty())
        <p class="text-gray-600">No reviews found.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full mb-6 table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left">
                            <button wire:click="sortBy('comment')"
                                class="flex items-center font-bold text-gray-700 hover:text-blue-500">
                                Comment
                                @if ($sortField === 'comment')
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="{{ $sortDirection === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}">
                                        </path>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-4 py-2 text-left">
                            <button wire:click="sortBy('rating')"
                                class="flex items-center font-bold text-gray-700 hover:text-blue-500">
                                Rating
                                @if ($sortField === 'rating')
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="{{ $sortDirection === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}">
                                        </path>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-4 py-2 text-left">Reviewer</th>
                        <th class="px-4 py-2 text-left">Reviewed</th>
                        <th class="px-4 py-2 text-left">Listing</th>
                        <th class="px-4 py-2 text-left">
                            <button wire:click="sortBy('created_at')"
                                class="flex items-center font-bold text-gray-700 hover:text-blue-500">
                                Created At
                                @if ($sortField === 'created_at')
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="{{ $sortDirection === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}">
                                        </path>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-4 py-2 font-bold text-left text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ Str::limit($review->comment, 50) }}</td>
                            <td class="px-4 py-2">{{ $review->rating }}</td>
                            <td class="px-4 py-2">{{ $review->reviewer->name }}</td>
                            <td class="px-4 py-2">{{ $review->reviewed->name }}</td>
                            <td class="px-4 py-2">
                                @if ($review->home_swap && $review->home_swap->receiverListing)
                                    <a href="{{ route('listing.details', ['id' => $review->home_swap->receiverListing->id]) }}"
                                        class="text-blue-500 hover:underline">
                                        {{ $review->listing_title }}
                                    </a>
                                @else
                                    <span class="text-gray-400">{{ $review->listing_title }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $review->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-4 py-2">
                                <button wire:click="deleteReview({{ $review->id }})"
                                    class="px-2 py-1 text-xs font-semibold text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $reviews->links() }}
        </div>
    @endif
</div>
