<x-app-layout :title="$category->title . ' - Kategori'">
    <div class="container mx-auto px-3 sm:px-4 md:px-6 lg:px-8 py-6 sm:py-8 lg:py-12">
        <div class="flex flex-col gap-8 lg:gap-12">
            <!-- Sidebar (Search & Categories) -->
            <div class="w-full space-y-4 sm:space-y-6 lg:space-y-8">
                <!-- Search Widget -->
                @include('posts.partials.search-box')

                <!-- Categories Widget -->
                <div class="bg-white p-4 sm:p-5 lg:p-6 rounded-lg sm:rounded-xl border border-gray-100 shadow-sm">
                    <h3 class="text-base sm:text-lg font-bold font-serif text-gray-900 mb-3 sm:mb-4">Kategori Lainnya
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(\App\Models\Category::all() as $cat)
                            <a href="{{ route('posts.category', $cat->slug) }}"
                                class="px-2.5 sm:px-3 py-0.5 sm:py-1 {{ $category->id === $cat->id ? 'bg-news-red text-white' : 'bg-gray-100 text-gray-600 hover:bg-news-red hover:text-white' }} text-[10px] sm:text-xs font-bold uppercase rounded-full transition">
                                {{ $cat->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="w-full">
                <div class="mb-6 sm:mb-8 border-b border-gray-200 pb-4">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-gray-900">
                        {{ $category->title }}
                    </h1>
                    <p class="text-gray-500 text-sm sm:text-base mt-2">
                        Menampilkan berita terkini seputar {{ strtolower($category->title) }}.
                    </p>
                </div>

                @if($posts->count() > 0)
                    <div class="space-y-6 sm:space-y-8">
                        @foreach($posts as $post)
                            <x-posts.post-item :post="$post" />
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-8 sm:mt-12">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="text-center py-12 sm:py-16 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-12 w-12 sm:h-16 sm:w-16 mx-auto text-gray-300 mb-3 sm:mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="text-gray-500 text-base sm:text-lg font-medium">Belum ada berita di kategori ini.</p>
                        <a href="{{ route('posts.index') }}"
                            class="inline-block mt-4 text-news-red hover:underline text-sm sm:text-base">
                            &larr; Kembali ke Berita Utama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>