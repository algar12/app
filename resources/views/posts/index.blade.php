<x-app-layout title="Berita Terkini">
    <!-- <div class="bg-gray-50 py-4 sm:py-6 lg:py-8 border-b border-gray-200">
        <div class="container mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-gray-900">Berita Terkini</h1>
            <p class="text-gray-500 text-sm sm:text-base mt-1 sm:mt-2">Indeks berita terbaru dan terpopuler hari ini.
            </p>
        </div>
    </div> -->

    <div class="container mx-auto px-3 sm:px-4 md:px-6 lg:px-8 py-6 sm:py-8 lg:py-12">
        <div class="flex flex-col gap-8 lg:gap-12">
            <!-- Sidebar (Now on Top) -->
            <div class="w-full space-y-4 sm:space-y-6 lg:space-y-8">
                <!-- Search Widget -->
                @include('posts.partials.search-box')

                <!-- Categories Widget -->
                <div class="bg-white p-4 sm:p-5 lg:p-6 rounded-lg sm:rounded-xl border border-gray-100 shadow-sm">
                    <h3 class="text-base sm:text-lg font-bold font-serif text-gray-900 mb-3 sm:mb-4">Kategori</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(\App\Models\Category::all() as $category)
                            <a href="{{ route('posts.category', $category->slug) }}"
                                class="px-2.5 sm:px-3 py-0.5 sm:py-1 bg-gray-100 text-gray-600 text-[10px] sm:text-xs font-bold uppercase rounded-full hover:bg-news-red hover:text-white transition">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="w-full">
                <livewire:post-list />
            </div>
        </div>
    </div>
</x-app-layout>