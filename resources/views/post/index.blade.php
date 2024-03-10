<x-app-layout :meta-title="($category->title.' Posts' ?: 'All Posts') . ' — Luminary'"
  meta-description="Discover brilliant perspectives on diverse insights at Luminary. Thought-provoking content covering a wide range of topics.">

  <div class="w-full max-w-7xl mx-auto flex flex-col lg:flex-row py-6 gap-4 max-xl:px-3">

    <section class="w-full md:w-2/3 flex flex-col items-center">

      @foreach ($posts as $post)
      <x-post-item :post="$post" />
      @endforeach

      {{ $posts->onEachSide(1)->links() }}

    </section>

    <x-sidebar />

  </div>

</x-app-layout>