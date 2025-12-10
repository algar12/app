@props(['post'])
<article {{ $attributes->merge(['class' => '[&:not(:last-child)]:border-b border-gray-100 pb-6 sm:pb-8 lg:pb-10']) }}>
    <div class="flex flex-col md:grid md:items-start md:grid-cols-12 gap-3 md:gap-5 mt-3 md:mt-5 article-body">
        <div class="w-full md:col-span-4 article-thumbnail">
            <a wire:navigate href="{{ route('posts.show', $post->slug) }}" class="block">
                <img class="w-full rounded-lg md:rounded-xl aspect-video object-cover"
                    src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
            </a>
        </div>
        <div class="md:col-span-8">
            <div class="flex items-center py-0.5 md:py-1 text-xs md:text-sm article-meta gap-1">
                <x-posts.author :author="$post->author" size="xs" />
                <span class="text-[10px] md:text-xs text-gray-500">. {{ $post->published_at->diffForHumans() }}</span>
            </div>
            <h2 class="text-base md:text-xl font-bold text-gray-900 line-clamp-2 md:line-clamp-none">
                <a wire:navigate href="{{ route('posts.show', $post->slug) }}" class="hover:text-news-red transition">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="mt-1.5 md:mt-2 text-xs md:text-base font-light text-gray-700 line-clamp-2 md:line-clamp-3">
                {{ $post->getExcerpt() }}
            </p>
            <div
                class="flex flex-col md:flex-row items-start md:items-center justify-between mt-3 md:mt-6 gap-2 md:gap-0 article-actions-bar">
                <div class="flex flex-wrap gap-1.5 md:gap-x-2 items-center">
                    @foreach ($post->categories as $category)
                        <x-posts.category-badge :category="$category" />
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <span class="text-[10px] md:text-sm text-gray-500">{{ $post->getReadingTime() }}
                            {{ __('blog.min_read') }}</span>
                    </div>
                </div>
                <div>
                    <livewire:like-button :key="'like-' . $post->id" :$post />
                </div>
            </div>
        </div>
    </div>
</article>