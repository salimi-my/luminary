<!-- Sidebar Section -->
<aside class="w-full md:w-1/3 flex flex-col items-center">

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <h3 class="text-xl font-semibold mb-3">All Categories</h3>
        @foreach ($categories as $category )
        <a href="{{ route('by-category', $category->slug) }}"
            class="font-semibold block py-2 px-3 rounded hover:bg-yellow-400 {{ request('category')?->slug == $category->slug ? 'bg-primary' : ''}}">
            {{ $category->title }} ({{ $category->total }})
        </a>
        @endforeach
    </div>

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">
            {{ \App\Models\TextWidget::getTitle('about-us-sidebar') }}
        </p>
        <p class="pb-2 text-pretty">
            {!! \App\Models\TextWidget::getContent('about-us-sidebar') !!}
        </p>
        <a href="{{ route('about-us') }}"
            class="w-full bg-primary transition-color ease-in-out duration-200 font-bold text-sm uppercase rounded hover:bg-yellow-400 flex items-center justify-center px-2 py-3 mt-4">
            Get to know us
        </a>
    </div>

</aside>