@props(['post'])

<article {{ $attributes->merge(['class' => 'flex flex-col md:flex-row gap-6 group border-b border-gray-100 pb-8 last:border-0']) }}>
    <!-- Thumbnail -->
    <div class="w-full md:w-1/3 shrink-0">
        <a href="{{ route('posts.show', $post->slug) }}" class="block relative aspect-video rounded-lg overflow-hidden">
            <img src="{{ $post->getThumbnailUrl() }}" alt="{{ $post->title }}"
                class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
        </a>
    </div>

    <!-- Content -->
    <div class="flex-1 flex flex-col justify-center">
        <div class="flex items-center space-x-2 mb-2">
            <span class="text-news-red text-xs font-bold uppercase tracking-wider">
                {{ $post->categories->first()?->title ?? 'News' }}
            </span>
            <span class="text-gray-300 text-xs">&bull;</span>
            <span class="text-gray-400 text-xs font-medium">{{ $post->published_at->format('d M Y') }}</span>
        </div>

        <h3
            class="text-xl md:text-2xl font-serif font-bold text-gray-900 mb-2 leading-tight group-hover:text-news-red transition">
            <a href="{{ route('posts.show', $post->slug) }}">
                {{ $post->title }}
            </a>
        </h3>

        <p class="text-gray-600 text-sm md:text-base line-clamp-2 md:line-clamp-3 mb-4 leading-relaxed">
            {{ $post->getExcerpt() }}
        </p>

        <div class="flex items-center mt-auto">
            <div class="flex items-center">
                <img src="{{ $post->author->profile_photo_url }}" alt="{{ $post->author->name }}"
                    class="h-6 w-6 rounded-full mr-2">
                <span class="text-xs font-bold text-gray-700">{{ $post->author->name }}</span>
            </div>
            <div class="ml-auto">
                <a href="{{ route('posts.show', $post->slug) }}"
                    class="text-xs font-bold text-news-blue uppercase tracking-wider hover:underline">
                    Baca Selengkapnya
                </a>
            </div>
        </div>
    </div>
</article>