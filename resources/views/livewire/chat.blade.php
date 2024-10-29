<div class="flex flex-col h-full bg-gray-100 rounded-lg shadow-lg">
    <div class="flex-1 p-4 overflow-y-auto" style="max-height: calc(100vh - 200px);">
        @foreach ($messages as $message)
            <div class="mb-4 {{ $message->sender_id === auth()->id() ? 'text-right' : 'text-left' }}">
                <div
                    class="inline-block max-w-xs lg:max-w-md px-4 py-2 rounded-lg shadow-md break-words
                    {{ $message->sender_id === auth()->id() ? 'bg-blue-600 text-black' : 'bg-white text-gray-800' }}">
                    <p class="text-sm font-medium">{{ $message->content }}</p>
                    <p
                        class="mt-1 text-xs {{ $message->sender_id === auth()->id() ? 'text-blue-200' : 'text-gray-600' }}">
                        {{ $message->created_at->format('M d, H:i') }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-4 bg-white border-t border-gray-200">
        <form wire:submit.prevent="sendMessage" class="flex items-center space-x-2">
            <input wire:model.defer="newMessage" type="text" placeholder="Type your message..."
                class="flex-grow px-4 py-2 text-gray-700 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit"
                class="px-6 py-2 font-semibold text-black transition duration-300 ease-in-out bg-black rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Send
            </button>
        </form>
    </div>
</div>
