<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>

    <!-- Navbar -->
    <livewire:navbar />

    <!-- Admin Reviews -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Admin Reviews</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">User Reviews</h2>
                <div class="flex space-x-2">
                    <input type="text" placeholder="Search reviews..." class="border rounded px-2 py-1">
                    <select class="border rounded px-2 py-1">
                        <option value="">All Ratings</option>
                        <option value="5">5 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="2">2 Stars</option>
                        <option value="1">1 Star</option>
                    </select>
                </div>
            </div>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Reviewer</th>
                        <th class="px-4 py-2 text-left">Received By</th>
                        <th class="px-4 py-2 text-left">Reviewed Home</th>
                        <th class="px-4 py-2 text-left">Rating</th>
                        <th class="px-4 py-2 text-left">Review</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">Mr. Smith</td>
                        <td class="border px-4 py-2">John Doe</td>
                        <td class="border px-4 py-2">Mountain Retreat</td>
                        <td class="border px-4 py-2">4 Stars</td>
                        <td class="border px-4 py-2">Great experience!</td>
                        <td class="border px-4 py-2">
                            <button
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-2">Edit</button>
                            <button
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">Delete</button>
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Mr. Smith</td>
                        <td class="border px-4 py-2">John Doe</td>
                        <td class="border px-4 py-2">Mountain Retreat</td>
                        <td class="border px-4 py-2">4 Stars</td>
                        <td class="border px-4 py-2">Great experience!</td>
                        <td class="border px-4 py-2">
                            <button
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-2">Edit</button>
                            <button
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">Delete</button>
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Mr. Smith</td>
                        <td class="border px-4 py-2">John Doe</td>
                        <td class="border px-4 py-2">Mountain Retreat</td>
                        <td class="border px-4 py-2">4 Stars</td>
                        <td class="border px-4 py-2">Great experience!</td>
                        <td class="border px-4 py-2">
                            <button
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-2">Edit</button>
                            <button
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">Delete</button>
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Mr. Smith</td>
                        <td class="border px-4 py-2">John Doe</td>
                        <td class="border px-4 py-2">Mountain Retreat</td>
                        <td class="border px-4 py-2">4 Stars</td>
                        <td class="border px-4 py-2">Great experience!</td>
                        <td class="border px-4 py-2">
                            <button
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-2">Edit</button>
                            <button
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">Delete</button>
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Mr. Smith</td>
                        <td class="border px-4 py-2">John Doe</td>
                        <td class="border px-4 py-2">Mountain Retreat</td>
                        <td class="border px-4 py-2">4 Stars</td>
                        <td class="border px-4 py-2">Great experience!</td>
                        <td class="border px-4 py-2">
                            <button
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-2">Edit</button>
                            <button
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">Delete</button>
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Mr. Smith</td>
                        <td class="border px-4 py-2">John Doe</td>
                        <td class="border px-4 py-2">Mountain Retreat</td>
                        <td class="border px-4 py-2">4 Stars</td>
                        <td class="border px-4 py-2">Great experience!</td>
                        <td class="border px-4 py-2">
                            <button
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-2">Edit</button>
                            <button
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">Delete</button>
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Mr. Smith</td>
                        <td class="border px-4 py-2">John Doe</td>
                        <td class="border px-4 py-2">Mountain Retreat</td>
                        <td class="border px-4 py-2">4 Stars</td>
                        <td class="border px-4 py-2">Great experience!</td>
                        <td class="border px-4 py-2">
                            <button
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-2">Edit</button>
                            <button
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">Delete</button>
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Details</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-6 flex justify-center">
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#"
                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" aria-current="page"
                    class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    1 </a>
                <a href="#"
                    class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    2 </a>
                <a href="#"
                    class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                    3 </a>
                <span
                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                    ... </span>
                <a href="#"
                    class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                    8 </a>
                <a href="#"
                    class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    9 </a>
                <a href="#"
                    class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    10 </a>
                <a href="#"
                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>

    <!-- Footer -->
    {{-- <livewire:footer /> --}}
    @livewireScripts
</body>

</html>
