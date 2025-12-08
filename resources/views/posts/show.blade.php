<x-app-layout :title="$post->title">
    <article class="font-serif">
        <!-- Article Header -->
        <header class="bg-gray-50 py-12 border-b border-gray-200">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl text-center">
                <div class="flex items-center justify-center space-x-2 mb-6">
                    <span
                        class="bg-news-red text-white text-xs font-bold px-3 py-1 uppercase tracking-wider rounded-full">
                        {{ $post->categories->first()?->title ?? 'News' }}
                    </span>
                    <span class="text-gray-400 text-sm">&bull;</span>
                    <span
                        class="text-gray-500 text-sm font-sans font-medium">{{ $post->published_at->format('d F Y, H:i') }}
                        WIB</span>
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6 px-4">
                    {{ $post->title }}
                </h1>

                <div class="flex items-center justify-center space-x-4">
                    <img src="{{ $post->author->profile_photo_url }}" alt="{{ $post->author->name }}"
                        class="h-12 w-12 rounded-full border-2 border-white shadow-sm">
                    <div class="text-left">
                        <div class="text-sm font-bold text-gray-900 font-sans">{{ $post->author->name }}</div>
                        <div class="text-xs text-gray-500 font-sans">Editor Kabar Rakyat</div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl mb-12">
            <div class="relative aspect-video rounded-2xl overflow-hidden shadow-2xl">
                <img src="{{ $post->getThumbnailUrl() }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            </div>
            <figcaption class="text-center text-gray-500 text-sm mt-4 font-sans italic">
                Ilustrasi: {{ $post->title }}
            </figcaption>
        </div>

        <!-- Article Content -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
            <!-- Share Buttons (Mobile Top) -->
            <div class="flex justify-center space-x-4 mb-8 md:hidden">
                <button class="bg-blue-600 text-white p-2 rounded-full"><svg class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                    </svg></button>
                <button class="bg-blue-800 text-white p-2 rounded-full"><svg class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                    </svg></button>
                <button class="bg-green-500 text-white p-2 rounded-full"><svg class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.463 1.065 2.876 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                    </svg></button>
            </div>

            <div class="prose prose-lg max-w-none font-sans text-gray-800">
                <div
                    class="text-lg leading-relaxed
                    first-letter:text-7xl first-letter:font-bold first-letter:text-news-red first-letter:mr-3 first-letter:float-left first-letter:font-serif first-letter:leading-none">
                    {!! $post->body !!}
                </div>
            </div>

            <!-- Tags -->
            <div class="mt-16 pt-8 border-t-2 border-gray-200">
                <h4 class="text-base font-bold text-gray-900 uppercase tracking-wider mb-5 font-sans">Topik Terkait</h4>
                <div class="flex flex-wrap gap-3">
                    @foreach($post->categories as $category)
                        <a href="{{ route('posts.category', $category->slug) }}"
                            class="inline-flex items-center px-5 py-2.5 bg-gray-100 text-gray-700 rounded-full text-sm font-medium hover:bg-news-red hover:text-white transition-all duration-200 font-sans">
                            <span class="mr-1">#</span>{{ $category->title }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Author Bio -->
            <div
                class="mt-12 bg-gradient-to-br from-gray-50 to-gray-100 p-8 rounded-2xl flex items-start space-x-6 border border-gray-200">
                <img src="{{ $post->author->profile_photo_url }}" alt="{{ $post->author->name }}"
                    class="h-20 w-20 rounded-full object-cover border-4 border-white shadow-lg flex-shrink-0">
                <div>
                    <h4 class="text-xl font-bold text-gray-900 font-sans mb-3">{{ $post->author->name }}</h4>
                    <p class="text-gray-600 text-sm font-sans leading-relaxed">Jurnalis senior di Kabar Rakyat yang
                        fokus pada isu-isu
                        sosial dan politik terkini. Berpengalaman lebih dari 10 tahun di dunia jurnalistik.</p>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="mt-20 font-sans">
                <h3 class="text-3xl font-bold text-gray-900 mb-10 pb-4 border-b-2 border-gray-200">Komentar Pembaca</h3>
                <livewire:post-comments :key="'comments' . $post->id" :$post />
            </div>
        </div>
    </article>
</x-app-layout>