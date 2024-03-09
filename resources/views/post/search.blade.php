<x-app-layout :meta-title="('Search: '.$search ?: 'All Posts') . ' — Luminary'"
  meta-description="Discover brilliant perspectives on diverse insights at Luminary. Thought-provoking content covering a wide range of topics.">

  <div class="w-full max-w-7xl mx-auto flex flex-col lg:flex-row py-6 gap-4 max-xl:px-3">
    <section class="w-full md:w-2/3 flex flex-col items-center px-3 my-4">

      @if($posts->count() > 0)

      @foreach ($posts as $post)
      <div class="w-full">
        <a href="{{route('view', $post)}}">
          <h2 class="text-blue-500 font-bold text-lg sm:text-xl mb-2">
            {!! preg_replace('/'.preg_quote(request()->get('search'), '/').'/i', '<span
              class="bg-yellow-300">$0</span>',
            $post->title) !!}
          </h2>
        </a>
        <div>
          @if (stripos($post->excerpt(), request()->get('search')) !== false)
          {!! preg_replace('/'.preg_quote(request()->get('search'), '/').'/i', '<span class="bg-yellow-300">$0</span>',
          $post->excerpt()) !!}
          @else
          @php
          $keyword = request()->get('search');
          $body = $post->body;
          $pattern = '/\b' . preg_quote($keyword, '/') . '\b/i';
          $matches = [];
          preg_match_all($pattern, $body, $matches, PREG_OFFSET_CAPTURE);
          if (count($matches[0]) > 0) {
          $startPosition = $matches[0][0][1];
          $shortenedBody = substr($body, $startPosition, 150);
          echo preg_replace($pattern, '<span class="bg-yellow-300">$0</span>', $shortenedBody). '...';
          }
          @endphp
          @endif
        </div>
      </div>
      <hr class="w-full my-4 border-b border-gray-100">
      @endforeach

      {{ $posts->onEachSide(1)->links() }}

      @else

      <p class="text-center text-gray-700">No results found for "{{ request()->get('search') }}".</p>

      @endif

    </section>

    <x-sidebar />
  </div>

</x-app-layout>