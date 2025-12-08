<x-app-layout title="Home Page">
    @section('hero')
        <div class="py-8">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Featured Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-12">
                    <!-- Main Featured Post (Left - 8 cols) -->
                    <div class="lg:col-span-8">
                        @if($featuredPosts->count() > 0)
                            @php $mainPost = $featuredPosts->first(); @endphp
                            <div class="relative h-[500px] rounded-xl overflow-hidden group">
                                <img src="{{ $mainPost->getThumbnailUrl() }}" alt="{{ $mainPost->title }}"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-8 w-full">
                                    <div class="flex items-center space-x-2 mb-3">
                                        <span
                                            class="bg-news-red text-white text-xs font-bold px-2.5 py-1 uppercase tracking-wider rounded-sm">
                                            {{ $mainPost->categories->first()?->title ?? 'News' }}
                                        </span>
                                        <span
                                            class="text-gray-300 text-sm">{{ $mainPost->published_at->format('d M Y') }}</span>
                                    </div>
                                    <a href="{{ route('posts.show', $mainPost->slug) }}">
                                        <h2
                                            class="text-3xl md:text-4xl font-serif font-bold text-white leading-tight mb-3 hover:text-gray-200 transition">
                                            {{ $mainPost->title }}
                                        </h2>
                                    </a>
                                    <p class="text-gray-300 line-clamp-2 max-w-2xl text-lg">
                                        {{ $mainPost->getExcerpt() }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Side Featured Posts (Right - 4 cols) -->
                    <div class="lg:col-span-4 space-y-6">
                        @foreach($featuredPosts->skip(1)->take(2) as $post)
                            <div class="relative h-[238px] rounded-xl overflow-hidden group">
                                <img src="{{ $post->getThumbnailUrl() }}" alt="{{ $post->title }}"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-5 w-full">
                                    <span
                                        class="bg-news-blue text-white text-[10px] font-bold px-2 py-0.5 uppercase tracking-wider rounded-sm mb-2 inline-block">
                                        {{ $post->categories->first()?->title ?? 'Update' }}
                                    </span>
                                    <a href="{{ route('posts.show', $post->slug) }}">
                                        <h3
                                            class="text-lg font-serif font-bold text-white leading-snug hover:text-gray-200 transition line-clamp-2">
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

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Main Content (Latest News) -->
            <div class="lg:col-span-8">
                <div class="flex items-center justify-between mb-8 border-b-2 border-gray-100 pb-2">
                    <h2 class="text-2xl font-serif font-bold text-gray-900 relative">
                        <span class="border-b-4 border-news-red pb-2 absolute -bottom-[10px] left-0">Berita
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

                <div class="space-y-8">
                    @foreach ($latestPosts as $post)
                        <x-posts.post-card :post="$post" />
                    @endforeach
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 space-y-10">
                <!-- Popular Posts Widget -->
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                    <h3 class="text-lg font-bold font-serif text-gray-900 mb-6 border-l-4 border-news-red pl-3">
                        Terpopuler</h3>
                    <div class="space-y-5">
                        <!-- Mock Popular Posts (Replace with real data later) -->
                        @foreach($latestPosts->take(4) as $index => $post)
                            <div class="flex items-start group">
                                <span
                                    class="text-3xl font-black text-gray-200 mr-4 -mt-2 group-hover:text-news-red/20 transition">{{ $index + 1 }}</span>
                                <div>
                                    <span
                                        class="text-xs text-news-red font-bold uppercase mb-1 block">{{ $post->categories->first()?->title ?? 'News' }}</span>
                                    <a href="{{ route('posts.show', $post->slug) }}"
                                        class="font-serif font-bold text-gray-900 hover:text-news-red transition line-clamp-2 leading-snug">
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
                <div class="bg-news-blue p-8 rounded-xl text-center">
                    <h3 class="text-xl font-bold text-white font-serif mb-2">Newsletter</h3>
                    <p class="text-blue-100 text-sm mb-6">Dapatkan update berita pilihan setiap pagi.</p>
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