<div class="container px-4 py-8 mx-auto">
    <h1 class="mb-6 text-3xl font-bold">User Reports</h1>

    <div class="flex items-center justify-between mb-4">
        <div class="flex space-x-2">
            <input wire:model.lazy="search" type="text" placeholder="Search reports..." class="px-2 py-1 border rounded">
            <select wire:model.lazy="status" class="px-2 py-1 border rounded">
                <option value="">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="resolved">Resolved</option>
                <option value="dismissed">Dismissed</option>
            </select>
        </div>
    </div>

    @if ($reports->isEmpty())
        <div class="p-4 text-center text-gray-500 bg-gray-100 rounded">
            No reports exist.
        </div>
    @else
        <table class="w-full px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Reporter</th>
                    <th class="px-4 py-2 text-left">Reported User/Listing</th>
                    <th class="px-4 py-2 text-left">Reason</th>
                    <th class="px-4 py-2 text-left">Description</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('user.profile', ['userId' => $report->reporter->id]) }}"
                                class="text-blue-600 hover:underline">
                                {{ $report->reporter->name }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            @if ($report->reported_user_id)
                                <a href="{{ route('user.profile', ['userId' => $report->reportedUser->id]) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $report->reportedUser->name }}
                                </a>
                            @else
                                <a href="{{ route('listing.details', ['id' => $report->home_listing_id]) }}"
                                    class="text-blue-600 hover:underline">
                                    Listing #{{ $report->home_listing_id }}
                                </a>
                            @endif
                        </td>
                        <td class="px-4 py-2 border">{{ $report->reason }}</td>
                        <td class="px-4 py-2 border">
                            <div class="max-w-xs overflow-hidden text-sm text-gray-600">
                                {{ Str::limit($report->description, 100) }}
                            </div>
                        </td>
                        <td class="px-4 py-2 border">{{ ucfirst($report->status) }}</td>
                        <td class="px-4 py-2 border">
                            <button wire:click="updateStatus({{ $report->id }}, 'resolved')"
                                class="px-2 py-1 mr-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">Resolve</button>
                            <button wire:click="updateStatus({{ $report->id }}, 'dismissed')"
                                class="px-2 py-1 font-bold text-white bg-red-500 rounded hover:bg-red-700">Dismiss</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    @endif
</div>
