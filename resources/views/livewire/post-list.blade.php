<div class="px-0 md:px-3 py-4 md:py-6 lg:px-7">
    <div
        class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-100 pb-3 md:pb-0 gap-3 md:gap-0">
        <div class="text-gray-600 text-xs md:text-sm">
            @if ($this->activeCategory || $search)
                <button class="mr-2 md:mr-3 text-xs text-gray-500 hover:text-gray-700"
                    wire:click="clearFilters()">✕</button>
            @endif
            @if ($this->activeCategory)
                <x-badge wire:navigate href="{{ route('posts.index', ['category' => $this->activeCategory->slug]) }}"
                    :textColor="$this->activeCategory->text_color" :bgColor="$this->activeCategory->bg_color">
                    {{ $this->activeCategory->title }}
                </x-badge>
            @endif
            @if ($search)
                <span class="ml-2">
                    {{ __('blog.containing') }} : <strong>{{ $search }}</strong>
                </span>
            @endif
        </div>
        <div class="flex items-center space-x-2 md:space-x-4 font-light text-xs md:text-sm">
            <div class="flex items-center gap-1">
                <x-checkbox wire:model.live="popular" />
                <x-label class="text-xs md:text-sm"> {{ __('blog.popular') }} </x-label>
            </div>
            <button
                class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-3 md:py-4 text-xs md:text-sm"
                wire:click="setSort('desc')"> {{ __('blog.latest') }}</button>
            <button
                class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-3 md:py-4 text-xs md:text-sm"
                wire:click="setSort('asc')"> {{ __('blog.oldest') }}</button>
        </div>
    </div>
    <div class="py-3 md:py-4 space-y-4 md:space-y-6 lg:space-y-8">
        @foreach ($this->posts as $post)
            <x-posts.post-item wire:key="{{ $post->id }}" :post="$post" />
        @endforeach
    </div>

    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>