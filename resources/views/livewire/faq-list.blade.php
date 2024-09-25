<div class="mt-8 space-y-4">
    @foreach ($faqs as $index => $faq)
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-left">{{ $faq['question'] }}</h3>
            <p class="mt-2 text-left text-gray-600">
                {{ $faq['isExpanded'] ? $faq['answer'] : Str::limit($faq['answer'], 150, '...') }}
            </p>
            <div class="flex justify-end mt-2">
                <button wire:click="toggleFaq({{ $faq['id'] }})" class="text-gray-600 hover:text-gray-900">
                    {{ $faq['isExpanded'] ? '▲' : '▼' }}
                </button>
            </div>
        </div>
    @endforeach
</div>
