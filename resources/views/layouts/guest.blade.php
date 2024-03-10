<x-app-layout>

    <div class="w-full flex flex-col justify-center items-center min-h-[calc(100vh-587px)] max-md:px-2">
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
            {{ $slot }}
        </div>
    </div>

</x-app-layout>