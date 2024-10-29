<div class="container px-4 py-8 mx-auto max-w-7xl">

    <h2 class="mb-8 text-3xl font-bold text-gray-800">My Swaps</h2>

    @if ($currentSwaps->isNotEmpty())
        <div class="mb-12">
            <h3 class="mb-4 text-2xl font-semibold text-gray-700">Current Swaps</h3>
            @foreach ($currentSwaps as $currentSwap)
                <div class="mb-6 overflow-hidden transition-shadow bg-white rounded-lg shadow-lg hover:shadow-xl">
                    <div class="p-6">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-5">
                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-gray-500">With</span>
                                <a href="{{ route('user.profile', ['userId' => $currentSwap->sender_user_id == Auth::id() ? $currentSwap->receiver_user_id : $currentSwap->sender_user_id]) }}"
                                    class="mt-1 text-lg font-semibold text-gray-800 transition-colors duration-200 hover:text-blue-600">
                                    {{ $currentSwap->sender_user_id == Auth::id() ? $currentSwap->receiverUser->name : $currentSwap->senderUser->name }}
                                </a>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-gray-500">Your Home</span>
                                <span class="mt-1 text-lg font-semibold text-gray-800">
                                    {{ $currentSwap->sender_user_id == Auth::id() ? $currentSwap->senderListing->title : $currentSwap->receiverListing->title }}
                                </span>
                            </div>
                            <div class="flex flex-col">
                                <span
                                    class="text-sm font-medium text-gray-500">{{ $currentSwap->sender_user_id == Auth::id() ? $currentSwap->receiverUser->name : $currentSwap->senderUser->name }}
                                    Home</span>
                                <span class="mt-1 text-lg font-semibold text-gray-800">
                                    {{ $currentSwap->sender_user_id == Auth::id() ? $currentSwap->receiverListing->title : $currentSwap->senderListing->title }}
                                </span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-gray-500">Swap Period</span>
                                <span class="mt-1 text-lg font-semibold text-gray-800">
                                    {{ $currentSwap->start_date->format('M d, Y') }} -
                                    {{ $currentSwap->end_date->format('M d, Y') }}
                                </span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-gray-500">Message</span>
                                <span class="mt-1 text-lg font-semibold text-gray-800">
                                    {{ $currentSwap->message ?? 'No message' }}
                                </span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-gray-500">Status</span>
                                <div class="mt-1 space-y-2">
                                    @php
                                        $isUserSender = $currentSwap->sender_user_id == Auth::id();
                                        $userStatus = $isUserSender
                                            ? $currentSwap->sender_status
                                            : $currentSwap->receiver_status;
                                        $otherPersonStatus = $isUserSender
                                            ? $currentSwap->receiver_status
                                            : $currentSwap->sender_status;
                                    @endphp
                                    <div>
                                        <span class="text-xs font-medium text-gray-600">Your status:</span>
                                        <span
                                            class="ml-2 px-2 py-1 text-xs font-medium {{ $this->getStatusClass($userStatus) }} rounded-full">
                                            {{ ucfirst($userStatus) }}
                                        </span>
                                    </div>
                                    <div>
                                        <span
                                            class="text-xs font-medium text-gray-600">{{ $currentSwap->sender_user_id == Auth::id() ? $currentSwap->receiverUser->name : $currentSwap->senderUser->name }}
                                            status:</span>
                                        <span
                                            class="ml-2 px-2 py-1 text-xs font-medium {{ $this->getStatusClass($otherPersonStatus) }} rounded-full">
                                            {{ ucfirst($otherPersonStatus) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if ($offers->isNotEmpty())
        <div class="mb-12">
            <h3 class="mb-4 text-2xl font-semibold text-gray-700">Pending Offers</h3>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($offers as $offer)
                    <div
                        class="overflow-hidden transition-all transform bg-white rounded-lg shadow-md hover:shadow-lg hover:-translate-y-1">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <a href="{{ route('user.profile', ['userId' => $offer->sender_user_id == Auth::id() ? $offer->receiver_user_id : $offer->sender_user_id]) }}"
                                    class="text-lg font-semibold text-gray-800 transition-colors duration-200 hover:text-blue-600">
                                    {{ $offer->sender_user_id == Auth::id() ? $offer->receiverUser->name : $offer->senderUser->name }}
                                </a>
                                <span class="px-2 py-1 text-xs font-medium text-blue-600 bg-blue-100 rounded-full">
                                    {{ $offer->sender_user_id == Auth::id() ? ucfirst($offer->sender_status) : ucfirst($offer->receiver_status) }}
                                </span>
                            </div>
                            <div class="space-y-2">
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Your Home:</span>
                                    <p class="text-gray-800">
                                        {{ $offer->sender_user_id == Auth::id() ? $offer->senderListing->title : $offer->receiverListing->title }}
                                    </p>
                                </div>
                                <div>
                                    <span
                                        class="text-sm font-medium text-gray-500">{{ $offer->sender_user_id == Auth::id() ? $offer->receiverUser->name : $offer->senderUser->name }}
                                        Home:</span>
                                    <p class="text-gray-800">
                                        {{ $offer->sender_user_id == Auth::id() ? $offer->receiverListing->title : $offer->senderListing->title }}
                                    </p>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Swap Period:</span>
                                    <p class="text-gray-800">
                                        {{ $offer->start_date->format('M d, Y') }} -
                                        {{ $offer->end_date->format('M d, Y') }}
                                    </p>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Message:</span>
                                    <p class="text-gray-800">
                                        {{ $offer->message ?? 'No message' }}
                                    </p>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Your Role:</span>
                                    <p class="text-gray-800">
                                        {{ $offer->sender_user_id == Auth::id() ? 'Sender' : 'Receiver' }}
                                    </p>
                                </div>
                            </div>
                            @if ($offer->sender_user_id == Auth::id() ? $offer->sender_status === 'pending' : $offer->receiver_status === 'pending')
                                <div class="flex items-center mt-4 space-x-2">
                                    @livewire('document-signing', ['homeSwapId' => $offer->id], key('document-signing-' . $offer->id))
                                    {{-- <button wire:click="acceptOffer({{ $offer->id }})"
                                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        Accept
                                    </button> --}}
                                    <button wire:click="rejectOffer({{ $offer->id }})"
                                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        Reject
                                    </button>
                                </div>
                            @elseif (
                                $offer->sender_user_id == Auth::id()
                                    ? $offer->sender_status === 'accepted'
                                    : $offer->receiver_status === 'accepted')
                                <div class="mt-4">
                                    <p class="text-sm text-gray-600">Waiting for the other person to accept or reject.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if ($swapHistory->isNotEmpty())
        <div>
            <h3 class="mb-4 text-2xl font-semibold text-gray-700">Swap History</h3>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($swapHistory as $swap)
                    <div class="overflow-hidden transition-all bg-white rounded-lg shadow-md hover:shadow-lg">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <a href="{{ route('user.profile', ['userId' => $swap->sender_user_id == Auth::id() ? $swap->receiver_user_id : $swap->sender_user_id]) }}"
                                    class="text-lg font-semibold text-gray-800 transition-colors duration-200 hover:text-blue-600">
                                    {{ $swap->sender_user_id == Auth::id() ? $swap->receiverUser->name : $swap->senderUser->name }}
                                </a>
                                @php
                                    $status = $this->getSwapStatus($swap);
                                @endphp
                                @if ($status === 'completed')
                                    <span
                                        class="px-2 py-1 text-xs font-medium text-green-600 bg-green-100 rounded-full">
                                        Completed
                                    </span>
                                @elseif($status === 'rejected')
                                    <span class="px-2 py-1 text-xs font-medium text-red-600 bg-red-100 rounded-full">
                                        Rejected
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs font-medium text-blue-600 bg-blue-100 rounded-full">
                                        {{ ucfirst($status) }}
                                    </span>
                                @endif
                            </div>
                            <div class="space-y-2">
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Your Home:</span>
                                    <p class="text-gray-800">
                                        {{ $swap->sender_user_id == Auth::id() ? $swap->senderListing->title : $swap->receiverListing->title }}
                                    </p>
                                </div>
                                <div>
                                    <span
                                        class="text-sm font-medium text-gray-500">{{ $swap->sender_user_id == Auth::id() ? $swap->receiverUser->name : $swap->senderUser->name }}
                                        Home:</span>
                                    <p class="text-gray-800">
                                        {{ $swap->sender_user_id == Auth::id() ? $swap->receiverListing->title : $swap->senderListing->title }}
                                    </p>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Swap Period:</span>
                                    <p class="text-gray-800">
                                        {{ $swap->start_date->format('M d, Y') }} -
                                        {{ $swap->end_date->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
