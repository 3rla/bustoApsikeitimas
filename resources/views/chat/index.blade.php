<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat - User List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100">
    <div class="container max-w-4xl px-4 py-8 mx-auto">
        <h1 class="mb-8 text-3xl font-bold text-gray-800">Chat with Users</h1>
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-xl font-semibold text-gray-700">Select a user to start chatting:</h2>
            <ul class="space-y-3">
                @foreach ($users as $user)
                    <li class="transition duration-300 ease-in-out transform hover:scale-102">
                        <a href="{{ route('chat.show', $user) }}"
                            class="block p-4 rounded-lg bg-gray-50 hover:bg-blue-50">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="w-12 h-12 border-2 border-blue-200 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF"
                                        alt="{{ $user->name }}">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-gray-900 truncate">
                                        {{ $user->name }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                        {{ $user->email }}
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
