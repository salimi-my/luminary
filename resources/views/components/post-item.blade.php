<article class="bg-white flex flex-col shadow my-4">
    <!-- Article Image -->
    <a href="{{ route('view', $post) }}" class="transition-opacity ease-in-out duration-300 hover:opacity-75">
        <img src="{{ $post->postThumbnail() }}" alt="{{ $post->title }}" class="aspect-[4/3] object-cover">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        <div class="flex gap-4 min-h-[36px]">
            @foreach($post->categories as $category)
            <a href="{{ route('by-category', $category->slug) }}"
                class="bg-yellow-500 text-white text-sm font-bold uppercase mb-4 px-2 rounded hover:bg-primary transition-colors ease-in-out duration-200">
                {{ $category->title }}
            </a>
            @endforeach
        </div>
        <a href="{{ route('view', $post) }}" class="text-3xl font-bold hover:text-gray-700 mb-4 line-clamp-1">
            {{ $post->title }}
        </a>
        @if ($showAuthor)
        <p class="text-sm pb-3">
            By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on {{
            $post->postDate() }} &nbsp;&bull;&nbsp; {{ $post->post_read_time }}
        </p>
        @endif
        <a href="{{ route('view', $post) }}" class="pb-6 {{ $showAuthor ? '' : 'min-h-[144px]' }}">
            <span class="line-clamp-5">
                {{ $post->excerpt() }}
            </span>
        </a>
        <a href="{{ route('view', $post) }}"
            class="uppercase text-black transition-color ease-in-out duration-100 hover:text-yellow-500">
            Continue Reading <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</article>