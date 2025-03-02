<nav class="bg-white shadow-md border-b border-gray-300 px-6 py-2 fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Left Section -->
        <div class="flex items-center space-x-4">
            <a href="{{ route('home') }}" class="flex items-center text-xl font-semibold text-blue-600">
                <x-application-mark />
                <span class="ml-2">NewsPortal</span>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-4 text-base font-medium">
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('menu.home') }}
                </x-nav-link>
                <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('menu.blog') }}
                </x-nav-link>
            </div>
        </div>
        
        <!-- Right Section -->
        <div class="hidden md:flex items-center space-x-4">
            <form action="{{ route('posts.search') }}" method="GET" class="hidden md:flex items-center">
                <input type="text" name="query" placeholder="Search..." 
                    class="px-3 py-1 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-400"
                    value="{{ request('query') }}">
                <button type="submit" class="ml-2 text-blue-600 text-sm">🔍</button>
            </form>
            @auth
                @include('layouts.partial.header-right-auth')
            @else
                @include('layouts.partial.header-right-guest')
            @endauth
        </div>
        
        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
            <button id="menu-toggle" class="text-gray-600 focus:outline-none">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu Dropdown -->
    <div id="mobile-menu" class="hidden md:hidden flex flex-col space-y-2 px-6 py-3 border-t border-gray-300 bg-white shadow-lg">
        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
            {{ __('menu.home') }}
        </x-nav-link>
        <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
            {{ __('menu.blog') }}
        </x-nav-link>
        
        <!-- Pencarian di Mobile Menu -->
        <form action="{{ route('posts.search') }}" method="GET" class="md:hidden flex flex-col space-y-2">
            <input type="text" name="query" placeholder="Search..." 
                class="px-3 py-1 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-400"
                value="{{ request('query') }}">
            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded-md text-sm">
                Search
            </button>
        </form>

        @auth
            @include('layouts.partial.header-right-auth')
        @else
            @include('layouts.partial.header-right-guest')
        @endauth
    </div>
</nav>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
