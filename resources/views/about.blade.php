<x-app-layout>

  <section class="w-full flex flex-col items-center px-3">

    <article class="flex flex-col shadow my-4">
      <!-- Article Image -->
      <a href="#" class="hover:opacity-75">
        <img src="/storage/{{ $widget->image }}" alt="{{ $widget->title }}" class="w-full object-cover h-64">
      </a>
      <div class="bg-white flex flex-col justify-start p-6">
        <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">
          {{ $widget->title }}
        </h1>
        {!! $widget->content !!}
      </div>
    </article>

  </section>

</x-app-layout>