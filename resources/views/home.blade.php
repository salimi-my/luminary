<x-app-layout
    meta-description="Discover brilliant perspectives on diverse insights at Luminary. Thought-provoking content covering a wide range of topics.">

    <div class="container max-w-5xl mx-auto py-6 max-xl:px-4">

        <div class="grid md:grid-cols-3 gap-4">
            <!-- Latest posts -->
            <div class="md:col-span-2">
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Latest Post
                </h2>

                <x-post-item :post="$latestPost" />
            </div>

            <!-- Top 5 popular posts -->
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Popular Posts
                </h2>
                @foreach($popularPosts as $post)
                <div class="grid grid-cols-4 gap-2 my-4 bg-white shadow p-2">
                    <a href="{{ route('view', $post) }}" class="pt-1">
                        <img src="{{ $post->postThumbnail() }}" alt="{{ $post->title }}" />
                    </a>
                    <div class="col-span-3">
                        <a href="{{ route('view', $post) }}">
                            <h3 class="font-bold text-sm uppercase whitespace-nowrap truncate">{{ $post->title }}</h3>
                        </a>
                        <div class="flex gap-2 mb-2">
                            @foreach($post->categories as $category)
                            <a href="{{ route('by-category', $category->slug) }}"
                                class="bg-blue-500 text-white px-2 rounded text-xs font-medium uppercase">
                                {{ $category->title }}
                            </a>
                            @endforeach
                        </div>
                        <div class="text-xs line-clamp-2">
                            {{ $post->excerpt() }}
                        </div>
                        <a href="{{ route('view', $post) }}"
                            class="text-xs uppercase text-gray-800 hover:text-black">Continue
                            Reading <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Recommended posts -->
        <div>
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                Recommended Posts
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                @foreach($recommendedPosts as $post)
                <x-post-item :post="$post" :show-author="false" />
                @endforeach
            </div>
        </div>

        <!-- Latest categories -->
        <div>
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                Recent Categories
            </h2>
        </div>

    </div>

</x-app-layout>