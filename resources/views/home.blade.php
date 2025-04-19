<x-app-layout title="Home Page">
    @section('hero')
        <div class="w-full py-32 text-center bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 rounded-lg shadow-lg border border-gray-700">
            <h1 class="text-3xl font-extrabold text-white md:text-4xl lg:text-6xl animate-fade-in">
                {{ __('home.hero.title') }}
                <span class="bg-gradient-to-r from-green-500 to-yellow-500 text-transparent bg-clip-text">&lt;IPNU IPPNU&gt;</span>
                <span class="text-white">TANJUNGHARJO</span>
            </h1>
            <p class="mt-3 text-lg text-gray-300 md:text-xl leading-relaxed">{{ __('home.hero.desc') }}</p>
            <a class="inline-block px-6 py-3 mt-6 text-lg font-semibold text-white transition bg-cyan-500 rounded-full shadow-lg hover:bg-cyan-400 hover:shadow-xl focus:ring-4 focus:ring-cyan-300" href="{{ route('posts.index') }}">
                {{ __('home.hero.cta') }}
            </a>
        </div>
    @endsection

    <div class="w-full mb-10 px-5 md:px-10 text-white">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl font-bold text-cyan-400 border-b-4 border-cyan-600 inline-block">
                {{ __('home.featured_posts') }}
            </h2>
            <div class="grid w-full grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($featuredPosts as $post)
                   <x-posts.post-card :post="$post" class="transform transition duration-300 hover:scale-105 !bg-white p-5 rounded-lg shadow-md border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200" />
                @endforeach
            </div>
            <a class="block mt-10 text-lg font-semibold text-center text-cyan-400 hover:text-cyan-300 transition focus:ring-4 focus:ring-cyan-300" href="{{ route('posts.index') }}">
                {{ __('home.more_posts') }}
            </a>
        </div>
        <hr class="border-gray-700">

        <h2 class="mt-16 mb-5 text-3xl font-bold text-cyan-400 border-b-4 border-cyan-600 inline-block">
            {{ __('home.latest_posts') }}
        </h2>
        <div class="grid w-full grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($latestPosts as $post)
             <x-posts.post-card :post="$post" class="transform transition duration-300 hover:scale-105 !bg-white p-5 rounded-lg shadow-md border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200" />
            @endforeach
        </div>
        <a class="block mt-10 text-lg font-semibold text-center text-cyan-400 hover:text-cyan-300 transition focus:ring-4 focus:ring-cyan-300" href="{{ route('posts.index') }}">
            {{ __('home.more_posts') }}
        </a>
    </div>
</x-app-layout>