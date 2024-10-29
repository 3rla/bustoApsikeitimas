<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsibility Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-gray-100">
    <div class="container max-w-3xl px-4 py-8 mx-auto">
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <div class="p-6 text-white bg-blue-600">
                <h1 class="text-3xl font-bold">Responsibility Document for Home Swap</h1>
            </div>

            <div class="p-6">
                @if (isset($homeSwap) && isset($user))
                    <div class="p-4 mb-6 border-l-4 border-blue-500 bg-blue-50">
                        <p class="leading-relaxed text-gray-700">
                            This document, dated <span class="font-semibold">{{ now()->format('F d, Y') }}</span>,
                            serves as an official record of responsibility for the home swap arrangement between:
                        </p>
                        <ul class="mt-2 space-y-1 text-gray-700 list-disc list-inside">
                            <li><span class="font-semibold">{{ $user->name }}</span> (User ID: {{ $user->id }})
                            </li>
                            <li><span class="font-semibold">{{ $otherUserName }}</span> (Other Party)</li>
                        </ul>
                        <p class="mt-2 leading-relaxed text-gray-700">
                            Both parties have mutually agreed to participate in a home swap with the unique identifier
                            <span class="font-semibold">{{ $homeSwap->id }}</span>. By signing this document, <span
                                class="font-semibold">{{ $user->name }}</span> acknowledges and agrees to adhere to
                            all terms, conditions, and responsibilities outlined herein for the duration of the swap
                            period.
                        </p>
                    </div>

                    <h2 class="mb-4 text-xl font-semibold text-gray-800">Swap Details:</h2>
                    <div class="p-4 mb-6 rounded-lg bg-gray-50">
                        <ul class="space-y-2">
                            <li class="flex">
                                <span class="w-1/3 font-medium">Start Date:</span>
                                <span>{{ $homeSwap->start_date->format('M d, Y') }}</span>
                            </li>
                            <li class="flex">
                                <span class="w-1/3 font-medium">End Date:</span>
                                <span>{{ $homeSwap->end_date->format('M d, Y') }}</span>
                            </li>
                            <li class="flex">
                                <span class="w-1/3 font-medium">{{ $user->name }}'s Home:</span>
                                <span>{{ $homeSwap->sender_user_id == $user->id ? $homeSwap->senderListing->title : $homeSwap->receiverListing->title }}</span>
                            </li>
                            <li class="flex">
                                <span class="w-1/3 font-medium">{{ $otherUserName }}'s Home:</span>
                                <span>{{ $homeSwap->sender_user_id == $user->id ? $homeSwap->receiverListing->title : $homeSwap->senderListing->title }}</span>
                            </li>
                        </ul>
                    </div>

                    <h2 class="mb-4 text-xl font-semibold text-gray-800">Responsibilities:</h2>
                    <div class="mb-6 space-y-4 text-gray-700">
                        <p>
                            1. <span class="font-medium">Property Care:</span> The user agrees to treat the swapped
                            property with the utmost respect and care, maintaining its cleanliness and condition
                            throughout the stay.
                        </p>
                        <p>
                            2. <span class="font-medium">House Rules:</span> The user commits to adhering to any
                            specific house rules provided by the property owner.
                        </p>
                        <p>
                            3. <span class="font-medium">Damage Liability:</span> The user accepts responsibility for
                            any damage caused to the property during their stay and agrees to report any issues
                            promptly.
                        </p>
                        <p>
                            4. <span class="font-medium">Security:</span> The user agrees to ensure the property is
                            secure at all times, including locking all doors and windows when leaving the premises.
                        </p>
                        <p>
                            5. <span class="font-medium">Neighborly Conduct:</span> The user commits to respecting
                            neighbors and maintaining reasonable noise levels, especially during night hours.
                        </p>
                    </div>

                    <p class="mb-6 text-gray-700">
                        By signing below, the user acknowledges that they have read, understood, and agree to all the
                        responsibilities outlined above. The user also agrees to take full responsibility for the
                        property they will be staying in during the swap period.
                    </p>

                    <div class="flex items-end justify-between pt-6 mt-6 border-t">
                        <p>
                            <span class="font-medium">Date:</span>
                            <span>{{ now()->format('Y-m-d') }}</span>
                        </p>
                        <p class="text-right">
                            <span class="block mb-2 font-medium">Signature:</span>
                            <span class="italic">{{ $signature }}</span>
                        </p>
                    </div>
                @else
                    <p class="font-semibold text-red-600">Error: Missing required information to generate the document
                    </p>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
