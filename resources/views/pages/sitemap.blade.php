<x-app-layout title="Sitemap">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold text-gray-900 mb-8 font-serif border-b pb-4">Sitemap</h1>

            <div class="grid md:grid-cols-2 gap-12">
                <!-- Main Pages -->
                <div>
                    <h2 class="text-2xl font-bold text-news-red mb-6">Halaman Utama</h2>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('home') }}"
                                class="flex items-center text-gray-700 hover:text-news-red transition group">
                                <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-news-red" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('posts.index') }}"
                                class="flex items-center text-gray-700 hover:text-news-red transition group">
                                <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-news-red" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                    </path>
                                </svg>
                                Berita Terkini
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.about') }}"
                                class="flex items-center text-gray-700 hover:text-news-red transition group">
                                <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-news-red" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.editorial') }}"
                                class="flex items-center text-gray-700 hover:text-news-red transition group">
                                <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-news-red" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                                Redaksi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.contact') }}"
                                class="flex items-center text-gray-700 hover:text-news-red transition group">
                                <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-news-red" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Kontak
                            </a>
                        </li>
                    </ul>

                    <h2 class="text-2xl font-bold text-news-red mb-6 mt-10">Kategori Berita</h2>
                    <ul class="grid grid-cols-2 gap-3">
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('posts.category', $category->slug) }}"
                                    class="flex items-center text-gray-700 hover:text-news-red transition group">
                                    <span
                                        class="w-2 h-2 bg-gray-300 rounded-full mr-3 group-hover:bg-news-red transition"></span>
                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Latest Posts -->
                <div>
                    <h2 class="text-2xl font-bold text-news-red mb-6">Berita Terbaru</h2>
                    <div class="space-y-6">
                        @foreach($posts as $post)
                            <article class="flex group">
                                <div class="flex-1">
                                    <div class="flex items-center text-xs text-gray-500 mb-1">
                                        <span
                                            class="text-news-red font-bold uppercase">{{ $post->categories->first()->title ?? 'Berita' }}</span>
                                        <span class="mx-2">•</span>
                                        <span>{{ $post->published_at->format('d M Y') }}</span>
                                    </div>
                                    <h3 class="font-bold text-gray-900 group-hover:text-news-red transition leading-snug">
                                        <a href="{{ route('posts.show', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('posts.index') }}"
                            class="inline-flex items-center text-news-red font-bold hover:underline">
                            Lihat Semua Berita
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Legal -->
            <div class="mt-16 pt-8 border-t border-gray-200">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Legal</h2>
                <div class="flex space-x-6 text-sm">
                    <a href="{{ route('pages.privacy') }}" class="text-gray-600 hover:text-news-red">Privacy Policy</a>
                    <a href="{{ route('pages.terms') }}" class="text-gray-600 hover:text-news-red">Terms of Service</a>
                    <a href="{{ route('sitemap') }}" class="text-gray-600 hover:text-news-red">XML Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>