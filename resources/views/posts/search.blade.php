<x-app-layout title="{{ $query }}">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <!-- Judul Halaman -->
        <h2 class="text-3xl font-extrabold text-gray-800 mb-4 text-center">Hasil Pencarian</h2>

        <!-- Menampilkan Query -->
        @if(isset($query))
            <p class="mb-6 text-gray-700 text-center text-lg">
                Menampilkan hasil untuk: <strong class="text-blue-600">"{{ $query }}"</strong>
            </p>
        @endif

        <!-- Jika Hasil Ditemukan -->
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <div class="bg-white p-4 shadow-lg rounded-lg transform transition duration-300 hover:scale-105">
                        <!-- Thumbnail -->
                        <a href="{{ route('posts.show', $post->slug) }}">
                            <img src="{{ $post->getThumbnailUrl() }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-48 object-cover rounded-lg shadow-md">
                        </a>

                        <!-- Konten -->
                        <div class="mt-4">
                            <h3 class="text-xl font-semibold">
                                <a href="{{ route('posts.show', $post->slug) }}" 
                                   class="text-blue-600 hover:underline hover:text-blue-800 transition duration-200">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="text-gray-600 text-sm mt-2">{{ $post->getExcerpt() }}</p>

                            <!-- Meta Info -->
                            <div class="flex items-center justify-between text-gray-500 text-xs mt-3">
                                <span>{{ $post->published_at->format('d M Y') }}</span>
                                <span>{{ $post->getReadingTime() }} min read</span>
                            </div>

                            <a href="{{ route('posts.show', $post->slug) }}" 
                               class="block text-blue-500 mt-3 font-medium hover:text-blue-700 transition">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10 flex justify-center">
                {{ $posts->links() }}
            </div>
        @else
            <!-- Jika Tidak Ada Hasil -->
            <div class="text-center">
                <p class="text-gray-500 text-lg">Tidak ada hasil yang ditemukan untuk <strong>"{{ $query }}"</strong>.</p>
                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" alt="No results found" class="mx-auto mt-4 w-64">
            </div>
        @endif
    </div>
</x-app-layout>
