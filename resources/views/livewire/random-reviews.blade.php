<div class="grid grid-cols-1 gap-6 mt-8 sm:grid-cols-2 md:grid-cols-3">
    @foreach ($reviews as $review)
        <div class="p-6 bg-white rounded-lg shadow-md">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="w-10 h-10 rounded-full" src="{{ $review->reviewer->profile_photo_url }}"
                        alt="{{ $review->reviewer->name }}" loading="lazy">
                </div>
                <div class="ml-4 text-left">
                    <h4 class="text-lg font-bold">{{ $review->reviewer->name }}</h4>
                    <p class="text-sm text-gray-500">{{ $review->home_swap->receiverListing->city }}</p>
                </div>
            </div>
            <p class="mt-4 text-gray-500">{{ Str::limit($review->comment, 100) }}</p>
            <div class="mt-2">
                @for ($i = 1; $i <= 5; $i++)
                    <span class="{{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}">&#9733;</span>
                @endfor
            </div>
        </div>
    @endforeach
</div>
