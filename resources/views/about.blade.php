<x-app-layout meta-title="About Us — Luminary"
  meta-description="Explore our diverse perspectives and thought-provoking content covering a wide range of topics."
  :meta-image="url('/storage/'.$widget->image)">

  <section class="w-full max-w-7xl mx-auto flex flex-col items-center max-xl:px-3">

    <article class="flex flex-col shadow my-4">
      <!-- Article Image -->
      <img src="/storage/{{ $widget->image }}" alt="{{ $widget->title }}" class="w-full aspect-[5/2] object-cover">
      <div class="bg-white flex flex-col justify-start p-6 post-body">
        <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">
          {{ $widget->title }}
        </h1>
        {!! $widget->content !!}
      </div>
    </article>

  </section>

</x-app-layout>