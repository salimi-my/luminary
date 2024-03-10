<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Primary Meta Tags -->
    <title>{{ $metaTitle ?: 'Luminary — Brilliant perspectives on diverse insights' }}</title>
    <meta name="title" content="{{ $metaTitle ?: 'Luminary — Brilliant perspectives on diverse insights' }}" />
    <meta name="description"
        content="{{ $metaDescription ?: 'Discover brilliant perspectives on diverse insights at Luminary. Thought-provoking content covering a wide range of topics.' }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="{{ $metaTitle ?: 'Luminary — Brilliant perspectives on diverse insights' }}" />
    <meta property="og:description"
        content="{{ $metaDescription ?: 'Discover brilliant perspectives on diverse insights at Luminary. Thought-provoking content covering a wide range of topics.' }}" />
    <meta property="og:image" content="{{ $metaImage ?: url('/luminary-meta-image.png') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ url()->current() }}" />
    <meta property="twitter:title"
        content="{{ $metaTitle ?: 'Luminary — Brilliant perspectives on diverse insights' }}" />
    <meta property="twitter:description"
        content="{{ $metaDescription ?: 'Discover brilliant perspectives on diverse insights at Luminary. Thought-provoking content covering a wide range of topics.' }}" />
    <meta property="twitter:image" content="{{ $metaImage ?: url('/luminary-meta-image.png') }}" />

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    </style>

    <!-- Scripts -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-family-karla">
    <!-- Livewire scripts -->
    @livewireScripts

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-primary shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-black uppercase no-underline">
                    <li><a class="hover:text-black/90 hover:underline px-4" href="#">Blog</a></li>
                    <li><a class="hover:text-black/90 hover:underline px-4" href="{{ route('about-us') }}">About</a>
                    </li>
                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline text-black pr-6">
                <a class="" href="#">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
            </div>
        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="{{ route('home') }}">
                Luminary
            </a>
            <p class="text-lg text-gray-600">
                {{ \App\Models\TextWidget::getTitle('header') }}
            </p>
        </div>
    </header>

    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b border-yellow-400/10 bg-yellow-300/5" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#" class="md:hidden text-base font-bold uppercase text-left flex justify-start items-center px-4"
                @click="open = !open">
                <i :class="open ? 'fa-xmark': 'fa-bars'" class="fa-solid mr-2"></i> Menu
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div
                class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-between text-sm font-bold uppercase mt-0 px-6 py-2">
                <div class="flex flex-col md:flex-row justify-center items-center gap-2">
                    <a href="{{ route('home') }}"
                        class="hover:bg-primary hover:text-black transition-color ease-in-out duration-200 rounded py-2 px-4 {{ request()->routeIs('home') ? 'text-yellow-500' : ''}}">Home</a>
                    @foreach ($categories as $category)
                    <a href="{{ route('by-category', $category->slug) }}"
                        class="hover:bg-primary hover:text-black transition-color ease-in-out duration-200 rounded py-2 px-4 {{ request('category')?->slug == $category->slug ? 'text-yellow-500' : ''}}">{{
                        $category->title }}</a>
                    @endforeach
                    <a href="{{ route('about-us') }}"
                        class="hover:bg-primary hover:text-black transition-color ease-in-out duration-200 rounded py-2 px-4 {{ request()->routeIs('about-us') ? 'text-yellow-500' : ''}}">About
                        Us</a>
                </div>

                <div class="flex flex-col md:flex-row justify-center items-center gap-2">
                    <form method="get" action="{{ route('search') }}">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <x-heroicon-o-magnifying-glass class="w-5 h-5 text-gray-500" />
                            </div>
                            <input name="search" value="{{ request()->get('search') }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-yellow-300 placeholder:text-gray-400 focus:ring-2 focus:ring-primary focus:ring-inset sm:text-sm sm:leading-6 font-medium pl-10"
                                placeholder="Search..." />
                        </div>
                    </form>

                    @auth
                    <div class="flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="hover:bg-primary transition-color ease-in-out duration-200 flex items-center rounded py-2 px-4">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @else
                    <a href="{{ route('login') }}"
                        class="hover:bg-primary transition-color ease-in-out duration-200 rounded py-2 px-4">Login</a>
                    <a href="{{ route('register') }}"
                        class="bg-primary hover:bg-yellow-400 transition-color ease-in-out duration-200 rounded py-2 px-4">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>


    <div class="container mx-auto flex flex-wrap py-6">

        {{ $slot }}

    </div>

    <footer class="w-full border-t bg-white py-12">
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="{{ route('about-us') }}"
                    class="uppercase px-3 hover:text-yellow-500 transition-color ease-in-out duration-200">About Us</a>
                <a href="#"
                    class="uppercase px-3 hover:text-yellow-500 transition-color ease-in-out duration-200">Privacy
                    Policy</a>
                <a href="#" class="uppercase px-3 hover:text-yellow-500 transition-color ease-in-out duration-200">Terms
                    & Conditions</a>
                <a href="#"
                    class="uppercase px-3 hover:text-yellow-500 transition-color ease-in-out duration-200">Contact
                    Us</a>
            </div>
            <div class="uppercase pb-6">&copy; Luminary
                <?php echo date('Y'); ?>. Created by <a href="https://www.salimi.my" target="_blank" rel="noopener"
                    class="hover:underline hover:text-yellow-500 transition-color ease-in-out duration-200">Salimi</a>
            </div>
        </div>
    </footer>

</body>

</html>