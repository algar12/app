<x-app-layout title="Home Page">
    @section('hero')
        <div class="py-4 sm:py-6 lg:py-8">
            <div class="container mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
                <!-- Featured Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-6 mb-8 sm:mb-12">
                    <!-- Main Featured Post (Left - 8 cols) -->
                    <div class="lg:col-span-8">
                        @if($featuredPosts->count() > 0)
                            @php $mainPost = $featuredPosts->first(); @endphp
                            <div
                                class="relative h-[300px] sm:h-[400px] lg:h-[500px] rounded-lg sm:rounded-xl overflow-hidden group">
                                <img src="{{ $mainPost->getThumbnailUrl() }}" alt="{{ $mainPost->title }}"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-4 sm:p-6 lg:p-8 w-full">
                                    <div class="flex items-center space-x-2 mb-2 sm:mb-3">
                                        <span
                                            class="bg-news-red text-white text-[10px] sm:text-xs font-bold px-2 sm:px-2.5 py-0.5 sm:py-1 uppercase tracking-wider rounded-sm">
                                            {{ $mainPost->categories->first()?->title ?? 'News' }}
                                        </span>
                                        <span
                                            class="text-gray-300 text-xs sm:text-sm">{{ $mainPost->published_at->format('d M Y') }}</span>
                                    </div>
                                    <a href="{{ route('posts.show', $mainPost->slug) }}">
                                        <h2
                                            class="text-lg sm:text-2xl md:text-3xl lg:text-4xl font-serif font-bold text-white leading-tight mb-2 sm:mb-3 hover:text-gray-200 transition line-clamp-3 sm:line-clamp-none">
                                            {{ $mainPost->title }}
                                        </h2>
                                    </a>
                                    <p
                                        class="text-gray-300 line-clamp-2 max-w-2xl text-sm sm:text-base lg:text-lg hidden sm:block">
                                        {{ $mainPost->getExcerpt() }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Side Featured Posts (Right - 4 cols) -->
                    <div class="lg:col-span-4 space-y-3 sm:space-y-4 lg:space-y-6">
                        @foreach($featuredPosts->skip(1)->take(2) as $post)
                            <div
                                class="relative h-[180px] sm:h-[200px] lg:h-[238px] rounded-lg sm:rounded-xl overflow-hidden group">
                                <img src="{{ $post->getThumbnailUrl() }}" alt="{{ $post->title }}"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-3 sm:p-4 lg:p-5 w-full">
                                    <span
                                        class="bg-news-blue text-white text-[9px] sm:text-[10px] font-bold px-1.5 sm:px-2 py-0.5 uppercase tracking-wider rounded-sm mb-1.5 sm:mb-2 inline-block">
                                        {{ $post->categories->first()?->title ?? 'Update' }}
                                    </span>
                                    <a href="{{ route('posts.show', $post->slug) }}">
                                        <h3
                                            class="text-sm sm:text-base lg:text-lg font-serif font-bold text-white leading-snug hover:text-gray-200 transition line-clamp-2">
                                            {{ $post->title }}
                                        </h3>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <div class="container mx-auto px-3 sm:px-4 md:px-6 lg:px-8 mb-8 sm:mb-12 lg:mb-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 lg:gap-12">
            <!-- Main Content (Latest News) -->
            <div class="lg:col-span-8">
                <div class="flex items-center justify-between mb-4 sm:mb-6 lg:mb-8 border-b-2 border-gray-100 pb-2">
                    <h2 class="text-xl sm:text-2xl font-serif font-bold text-gray-900 relative">
                        <span
                            class="border-b-4 border-news-red pb-2 absolute -bottom-[10px] left-0 w-full sm:w-auto">Berita
                            Terkini</span>
                        Berita Terkini
                    </h2>
                    <a href="{{ route('posts.index') }}"
                        class="text-news-red text-sm font-bold hover:text-red-800 flex items-center">
                        Lihat Semua <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                </div>

                <div class="space-y-4 sm:space-y-6 lg:space-y-8">
                    @foreach ($latestPosts as $post)
                        <x-posts.post-card :post="$post" />
                    @endforeach
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 space-y-6 sm:space-y-8 lg:space-y-10">
                <!-- Popular Posts Widget -->
                <div class="bg-gray-50 p-4 sm:p-5 lg:p-6 rounded-lg sm:rounded-xl border border-gray-100">
                    <h3
                        class="text-base sm:text-lg font-bold font-serif text-gray-900 mb-4 sm:mb-5 lg:mb-6 border-l-4 border-news-red pl-3">
                        Terpopuler</h3>
                    <div class="space-y-3 sm:space-y-4 lg:space-y-5">
                        <!-- Mock Popular Posts (Replace with real data later) -->
                        @foreach($latestPosts->take(4) as $index => $post)
                            <div class="flex items-start group">
                                <span
                                    class="text-2xl sm:text-3xl font-black text-gray-200 mr-3 sm:mr-4 -mt-1 sm:-mt-2 group-hover:text-news-red/20 transition">{{ $index + 1 }}</span>
                                <div class="flex-1 min-w-0">
                                    <span
                                        class="text-[10px] sm:text-xs text-news-red font-bold uppercase mb-1 block">{{ $post->categories->first()?->title ?? 'News' }}</span>
                                    <a href="{{ route('posts.show', $post->slug) }}"
                                        class="font-serif font-bold text-sm sm:text-base text-gray-900 hover:text-news-red transition line-clamp-2 leading-snug block">
                                        {{ $post->title }}
                                    </a>
                                    <span
                                        class="text-xs text-gray-400 mt-1 block">{{ $post->published_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Newsletter Widget -->
                <div class="bg-news-blue p-5 sm:p-6 lg:p-8 rounded-lg sm:rounded-xl text-center">
                    <h3 class="text-lg sm:text-xl font-bold text-white font-serif mb-2">Newsletter</h3>
                    <p class="text-blue-100 text-xs sm:text-sm mb-4 sm:mb-6">Dapatkan update berita pilihan setiap pagi.
                    </p>
                    <form>
                        <input type="email" placeholder="Email Address"
                            class="w-full px-4 py-2 rounded-lg text-sm mb-3 focus:ring-2 focus:ring-white/50 border-none">
                        <button
                            class="w-full bg-news-red text-white font-bold py-2 rounded-lg text-sm hover:bg-red-700 transition">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>