<x-app-layout title="Berita Terkini">
    <div class="bg-gray-50 py-8 border-b border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-serif font-bold text-gray-900">Berita Terkini</h1>
            <p class="text-gray-500 mt-2">Indeks berita terbaru dan terpopuler hari ini.</p>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-8">
                <livewire:post-list />
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 space-y-8">
                <!-- Search Widget -->
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                    <h3 class="text-lg font-bold font-serif text-gray-900 mb-4">Pencarian</h3>
                    <form action="{{ route('posts.search') }}" method="GET" class="relative">
                        <input type="text" name="query" placeholder="Cari berita..."
                            class="w-full pl-4 pr-10 py-2 rounded-lg border border-gray-300 focus:border-news-blue focus:ring focus:ring-news-blue/20 text-sm">
                        <button type="submit" class="absolute right-3 top-2.5 text-gray-400 hover:text-news-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Categories Widget -->
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                    <h3 class="text-lg font-bold font-serif text-gray-900 mb-4">Kategori</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(\App\Models\Category::all() as $category)
                            <a href="{{ route('posts.category', $category->slug) }}"
                                class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-bold uppercase rounded-full hover:bg-news-red hover:text-white transition">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>