<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat with {{ $user->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-gray-100">
    <div class="container px-4 py-8 mx-auto">
        <div class="flex max-w-6xl mx-auto space-x-4">
            <!-- Sidebar with recent chats -->
            <div class="w-1/4 bg-white rounded-lg shadow-md">
                <div class="p-4 bg-gray-800 rounded-t-lg">
                    <h2 class="text-xl font-semibold text-white">Recent Chats</h2>
                </div>
                <div class="p-2 space-y-2">
                    @foreach ($recentChats as $recentUser)
                        <a href="{{ route('chat.show', $recentUser) }}"
                            class="flex items-center p-2 space-x-3 transition duration-200 rounded-lg hover:bg-gray-100">
                            <img class="w-10 h-10 rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode($recentUser->name) }}&color=7F9CF5&background=EBF4FF"
                                alt="{{ $recentUser->name }}">
                            <div>
                                <p class="font-medium text-gray-800">{{ $recentUser->name }}</p>
                                <p class="text-sm text-gray-500">{{ $recentUser->email }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Main chat area -->
            <div class="w-3/4 overflow-hidden bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between px-6 py-4 text-white bg-gray-800">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('chat.index') }}" class="text-gray-300 hover:text-white">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </a>
                        <img class="w-10 h-10 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF"
                            alt="{{ $user->name }}">
                        <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                    </div>
                    <div class="text-sm text-gray-300">
                        {{ $user->email }}
                    </div>
                </div>
                <div class="p-6">
                    <livewire:chat :user="$user" />
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>
