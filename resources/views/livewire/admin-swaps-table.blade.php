<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="mb-6 text-2xl font-bold text-gray-800">Manage Home Swaps</h2>

    <div class="mb-6">
        <input wire:model.lazy="search" type="text" placeholder="Search swaps..."
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    @if ($successMessage)
        <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90" x-init="setTimeout(() => show = false, 5000)"
            class="p-4 mb-4 text-sm text-green-700 bg-green-100 border-l-4 border-green-500 rounded-r-lg shadow-md"
            role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                <p class="font-bold">{{ $successMessage }}</p>
            </div>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full mb-6 table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left">
                        <button wire:click="sortBy('sender_user_id')"
                            class="flex items-center font-bold text-gray-700 hover:text-blue-500">
                            Requester
                            @if ($sortField === 'sender_user_id')
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    @if ($sortDirection === 'asc')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    @endif
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="px-4 py-2 text-left">
                        <button wire:click="sortBy('receiver_user_id')"
                            class="flex items-center font-bold text-gray-700 hover:text-blue-500">
                            Receiver
                            @if ($sortField === 'receiver_user_id')
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    @if ($sortDirection === 'asc')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    @endif
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="px-4 py-2 font-bold text-left text-gray-700">Requested Home</th>
                    <th class="px-4 py-2 font-bold text-left text-gray-700">Receiver Home</th>
                    <th class="px-4 py-2 font-bold text-left text-gray-700">Swap Period</th>
                    <th class="px-4 py-2 font-bold text-left text-gray-700">Message</th>
                    <th class="px-4 py-2 text-left">
                        <button wire:click="sortBy('status')"
                            class="flex items-center font-bold text-gray-700 hover:text-blue-500">
                            Status
                            @if ($sortField === 'status')
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    @if ($sortDirection === 'asc')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    @endif
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="px-4 py-2 font-bold text-left text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($swaps as $swap)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $swap->senderUser->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $swap->receiverUser->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('listing.details', ['id' => $swap->sender_listing_id]) }}"
                                class="text-blue-600 hover:underline" title="{{ $swap->senderHome->title ?? 'N/A' }}">
                                {{ $swap->sender_listing_id }}
                            </a>
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('listing.details', ['id' => $swap->receiver_listing_id]) }}"
                                class="text-blue-600 hover:underline" title="{{ $swap->receiverHome->title ?? 'N/A' }}">
                                {{ $swap->receiver_listing_id }}
                            </a>
                        </td>
                        <td class="px-4 py-2">
                            @if ($swap->start_date && $swap->end_date)
                                <span
                                    title="From {{ $swap->start_date->format('Y-m-d') }} to {{ $swap->end_date->format('Y-m-d') }}">
                                    {{ $swap->start_date->format('M d') }} - {{ $swap->end_date->format('M d, Y') }}
                                </span>
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <span class="inline-block max-w-xs overflow-hidden text-sm text-gray-600 truncate"
                                title="{{ $swap->message }}">
                                {{ $swap->message ?? 'No message' }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <span
                                class="{{ $swap->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($swap->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }} px-2 py-1 text-xs font-semibold rounded-full">
                                {{ ucfirst($swap->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <button
                                class="px-2 py-1 mr-2 text-sm text-white bg-blue-500 rounded hover:bg-blue-600">Edit</button>
                            <button wire:click="confirmSwapDeletion({{ $swap->id }})"
                                class="px-2 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $swaps->links() }}
    </div>

    <!-- Delete Confirmation Modal (unchanged) -->
    @if ($confirmingSwapDeletion)
        <div class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                                    Delete Swap
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Are you sure you want to delete this swap? This action cannot be undone.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="deleteSwap" type="button"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Delete
                        </button>
                        <button wire:click="cancelDeletion" type="button"
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
