<div class="max-w-4xl pt-0 mx-auto mt-0">
    <h2 class="mb-6 text-3xl font-bold text-gray-800">Reviews</h2>
    @if ($reviews->count() > 0)
        <div class="space-y-6">
            @foreach ($reviews as $review)
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <img class="w-10 h-10 mr-4 rounded-full" src="{{ $review->reviewer->profile_photo_url }}"
                                alt="{{ $review->reviewer->name }}">
                            <div>
                                <p class="text-lg font-semibold text-gray-800">{{ $review->reviewer->name }}</p>
                                <p class="text-sm text-gray-600">{{ $review->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            @endfor
                        </div>
                    </div>
                    <p class="mb-4 text-gray-700">{{ $review->comment }}</p>
                    @if ($review->review)
                        <div class="p-4 bg-gray-100 rounded-lg">
                            <p class="text-sm italic text-gray-600">"{{ $review->review }}"</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $reviews->links() }}
        </div>
    @else
        <div class="p-6 text-center bg-gray-100 border border-gray-200 rounded-lg">
            <p class="text-lg text-gray-600">No reviews yet for this listing.</p>
        </div>
    @endif
</div>
