@props(['post'])

<article {{ $attributes->merge(['class' => 'flex flex-col md:flex-row gap-3 sm:gap-4 md:gap-6 group border-b border-gray-100 pb-4 sm:pb-6 lg:pb-8 last:border-0']) }}>
    <!-- Thumbnail -->
    <div class="w-full md:w-1/3 shrink-0">
        <a href="{{ route('posts.show', $post->slug) }}"
            class="block relative aspect-video rounded-md sm:rounded-lg overflow-hidden">
            <img src="{{ $post->getThumbnailUrl() }}" alt="{{ $post->title }}"
                class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
        </a>
    </div>

    <!-- Content -->
    <div class="flex-1 flex flex-col justify-center">
        <div class="flex items-center flex-wrap gap-x-2 gap-y-1 mb-1.5 sm:mb-2">
            <span class="text-news-red text-[10px] sm:text-xs font-bold uppercase tracking-wider">
                {{ $post->categories->first()?->title ?? 'News' }}
            </span>
            <span class="text-gray-300 text-xs hidden sm:inline">&bull;</span>
            <span
                class="text-gray-400 text-[10px] sm:text-xs font-medium">{{ $post->published_at->format('d M Y') }}</span>
        </div>

        <h3
            class="text-base sm:text-lg md:text-xl lg:text-2xl font-serif font-bold text-gray-900 mb-1.5 sm:mb-2 leading-tight group-hover:text-news-red transition line-clamp-2 md:line-clamp-none">
            <a href="{{ route('posts.show', $post->slug) }}">
                {{ $post->title }}
            </a>
        </h3>

        <p
            class="text-gray-600 text-xs sm:text-sm md:text-base line-clamp-2 md:line-clamp-3 mb-2 sm:mb-3 md:mb-4 leading-relaxed">
            {{ $post->getExcerpt() }}
        </p>

        <div class="flex items-center justify-between mt-auto gap-2">
            <div class="flex items-center min-w-0">
                <img src="{{ $post->author->profile_photo_url }}" alt="{{ $post->author->name }}"
                    class="h-5 w-5 sm:h-6 sm:w-6 rounded-full mr-1.5 sm:mr-2 flex-shrink-0">
                <span class="text-[10px] sm:text-xs font-bold text-gray-700 truncate">{{ $post->author->name }}</span>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('posts.show', $post->slug) }}"
                    class="text-[10px] sm:text-xs font-bold text-news-blue uppercase tracking-wider hover:underline whitespace-nowrap">
                    Baca Selengkapnya
                </a>
            </div>
        </div>
    </div>
</article>