<section class="py-12">
    <div class="px-2 mx-auto text-center max-w-7xl sm:px-4 lg:px-6">
        <h2 class="text-3xl font-bold text-gray-900">Explore Homes Waiting For You</h2>
        <p class="mt-4 text-gray-500">Discover unique homes across different cities for your next stay.</p>
        <div class="grid grid-cols-1 gap-6 mt-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
            @foreach ($homeImages as $image)
                <div class="w-full h-40 overflow-hidden rounded-lg shadow-md">
                    <img src="{{ asset('storage/images/' . $image) }}" alt="Home Image" class="object-cover w-full h-full"
                        loading="lazy"
                        srcset="{{ asset('storage/images/small_' . $image) }} 300w,
                                 {{ asset('storage/images/medium_' . $image) }} 600w,
                                 {{ asset('storage/images/' . $image) }} 1200w"
                        sizes="(max-width: 300px) 300px,
                                (max-width: 600px)
600px,
                                1200px">
                </div>
            @endforeach
        </div>
    </div>
</section>
