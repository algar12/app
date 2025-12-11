<nav x-data="{ open: false, categoryOpen: false, scrolled: false }"
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    class="sticky top-0 z-50 transition-all duration-300 font-sans"
    :class="{ 'bg-white border-b border-gray-200 shadow-sm': !scrolled, 'bg-white/80 backdrop-blur-lg border-b border-gray-200/50 shadow-md': scrolled }">
    <!-- Breaking News Ticker -->
    <div x-show="!scrolled" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 max-h-10" x-transition:leave-end="opacity-0 max-h-0"
        class="bg-news-red text-white text-xs py-1 overflow-hidden relative transition-all duration-300">
        <div class="container mx-auto px-4 flex items-center">
            <span class="font-bold uppercase tracking-wider mr-4 bg-red-800 px-2 py-0.5 rounded-sm">Breaking News</span>
            <div class="flex-1 overflow-hidden whitespace-nowrap">
                <div class="inline-block animate-marquee">
                    @php
                        $recentPosts = \App\Models\Post::published()->latest('published_at')->take(5)->get();
                    @endphp
                    @forelse($recentPosts as $recentPost)
                        <span class="mx-4">{{ $recentPost->title }}</span>
                    @empty
                        <span class="mx-4">Selamat datang di Kabar Rakyat - Suara Hati Nurani Rakyat.</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>


    <!-- Main Navbar -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between transition-all duration-300" :class="scrolled ? 'h-15' : 'h-20'">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center group">
                        <img src="{{ asset('images/logo.png') }}" alt="Kabar Rakyat"
                            class="w-auto transition-all duration-300" :class="scrolled ? 'h-10' : 'h-20'">
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 md:flex h-full items-center">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')"
                        class="text-base font-medium hover:text-news-red transition">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')"
                        class="text-base font-medium hover:text-news-red transition">
                        {{ __('Berita') }}
                    </x-nav-link>
                    <div class="relative h-full flex items-center" x-data="{ open: false }" @mouseleave="open = false">
                        <button @mouseenter="open = true" @click="open = !open"
                            class="inline-flex items-center text-base font-medium text-gray-700 hover:text-news-red focus:outline-none transition">
                            Kategori
                            <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" :class="{'rotate-180': open}" style="transition: transform 0.2s;">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Dropdown (Alpine.js) -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95" @click.away="open = false"
                            class="absolute left-0 top-full w-56 bg-white border border-gray-100 shadow-lg rounded-b-md py-2 z-50"
                            style="display: none;">
                            @foreach(\App\Models\Category::all() as $category)
                                <a href="{{ route('posts.category', $category->slug) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-news-red transition">
                                    {{ $category->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden md:flex items-center space-x-4">
                <!-- Search Bar -->
                <form action="{{ route('posts.search') }}" method="GET" class="relative">
                    <input type="text" name="query" placeholder="Cari berita..."
                        class="w-64 pl-4 pr-10 py-2 rounded-full border border-gray-300 focus:border-news-blue focus:ring focus:ring-news-blue/20 text-sm transition">
                    <button type="submit" class="absolute right-3 top-2.5 text-gray-400 hover:text-news-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>

                <!-- Auth Links -->
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}"
                        class="text-sm font-medium text-gray-700 hover:text-news-red transition">Log in</a>
                    <a href="{{ route('register') }}"
                        class="ml-4 px-4 py-2 rounded-full bg-news-red text-white text-sm font-medium hover:bg-red-800 transition shadow-sm">Register</a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                {{ __('Berita') }}
            </x-responsive-nav-link>

            <!-- Mobile Categories -->
            <div class="border-t border-gray-100" x-data="{ categoriesOpen: false }">
                <button @click="categoriesOpen = !categoriesOpen"
                    class="w-full flex items-center justify-between px-3 py-2 text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 transition">
                    <span>Kategori</span>
                    <svg class="h-4 w-4 transition-transform" :class="{'rotate-180': categoriesOpen}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="categoriesOpen" x-transition class="bg-gray-50 py-2" style="display: none;">
                    @foreach(\App\Models\Category::all() as $category)
                        <a href="{{ route('posts.category', $category->slug) }}"
                            class="block pl-6 pr-3 py-2 text-sm text-gray-600 hover:text-news-red hover:bg-gray-100 transition">
                            {{ $category->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Mobile Search -->
        <div class="px-4 py-3 border-t border-gray-100">
            <form action="{{ route('posts.search') }}" method="GET" class="relative">
                <input type="text" name="query" placeholder="Cari berita..."
                    class="w-full pl-4 pr-10 py-2 rounded-lg border border-gray-300 focus:border-news-blue focus:ring focus:ring-news-blue/20 text-sm">
                <button type="submit" class="absolute right-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>

        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif
                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-4 pb-4 border-t border-gray-200 px-4 space-y-2">
                <a href="{{ route('login') }}"
                    class="block w-full text-center px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 font-medium">Log
                    in</a>
                <a href="{{ route('register') }}"
                    class="block w-full text-center px-4 py-2 border border-transparent rounded-md text-white bg-news-red hover:bg-red-800 font-medium">Register</a>
            </div>
        @endauth
    </div>
</nav>